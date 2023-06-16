<?php

namespace App\Traits;

use App\Http\Requests\GrupFormRequest;
use App\Http\Requests\TaskFormRequest;
use App\Models\Grup\Grup;
use App\Models\Grup\Member;
use App\Models\Teacher\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

trait GrupTrait
{

    use HelperTrait;

    public function listGrupDetails($grup_id)
    {
        $grup = Grup::where('grup_id', $grup_id)->with('members')->withCount('members')->with('teacher')->first();

        return $grup;
    }

    public function listGrupsWithMembers()
    {
        $grups = Grup::where('teacher_id', auth()->user()->id)->where('status', 1)->with('members')->withCount('members')->get();

        return $grups;
    }


    public function listMembers($grup_id)
    {
        $grup = Grup::where('teacher_id', auth()->user()->id)->where('status', 1)->where('grup_id', $grup_id)->first();

        return $grup->members;
        // hata:basic Bu gruba ait olmayan kullanıcı role arken ulaşabiliyor ve hata veriyor  
    }


    public function students()
    {
        $users = User::where('role', 'student')->get();
        return      $users;
    }

    public function storeGrupMembers($grup_id, $newMembersArray)
    {

        foreach ($newMembersArray  as $member_uuid) {
            $member = new Member();
            $user = User::where('user_id', $member_uuid)->first();
            if ($user) {

                $member->user_id = $user->id;
                $member->grup_id = $grup_id;

                $member->save();
            }
        }
    }


    public function storeGrup($request, $grup)
    {
        $validatedData = $request->validated();

        $grup->teacher_id = Auth::user()->id;
        $grup->name = $validatedData['name'];
        $grup->details = $validatedData['details'];
        $grup->branch = $validatedData['branch'];
        $newMembersArray = $validatedData['user'] ?? [];

        $photo =  $this->storeProfilePhoto($request, $grup);

        if ($photo) {
            $grup->logo_path = $photo;
        }

        $grupResult = $grup->save();

        $this->storeGrupMembers($grup->id,  $newMembersArray);

        return   $this->redirectToGrups($grupResult);
    }


    public function updateGrup($validatedData, $grup)
    {

        $grup->name = $validatedData['name'];
        $grup->details = $validatedData['details'];
        $grup->branch = $validatedData['branch'];

        if ($grup->save()) {

            return true;
        } else {

            return false;
        }
    }



    public function updateProfilePhoto($request, $grup)
    {

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $fileName = 'pp' . time() . '.' . $ext;

            if (File::exists($grup->logo_path)) {

                if (File::delete($grup->logo_path)) {
                    if ($filePath = $file->move('uploads/grup/grup-profile/', $fileName)) {
                        $grup->logo_path = $filePath;

                        if ($grup->save()) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            } else {

                if ($filePath = $file->move('uploads/grup/grup-profile/', $fileName)) {
                    $grup->logo_path = $filePath;

                    if ($grup->save()) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
    }
    // 
    public function checkUserAndGrup($validatedUserAndGrup)
    {


        if (!$user = User::where('user_id', $validatedUserAndGrup['user'])->first()) {
            return redirect()->back()->with('failed', 'Böyle Bir Kullanıcı Bulunanamadı');
        }

        if (!$grup = Grup::where('grup_id', $validatedUserAndGrup['grup'])->first()) {
            return redirect()->back()->with('failed', 'Böyle Bir Grup Bulunanamadı');
        }

        return $data = ['user' => $user, 'grup' => $grup];
    }


    public function storeMember($validatedData)
    {

        $data = $this->checkUserAndGrup($validatedData);

        $user =  $data['user'];
        $grup =  $data['grup'];

        if (!Member::where('grup_id', $grup->id)->where('user_id', $user->id)->exists()) {

            $member = new Member();

            $member->user_id = $user->id;
            $member->grup_id = $grup->id;
            $res = $member->save();

            if ($res) {
                return redirect()->back()->with('success', 'Başarılı Bir Şekilde Eklendi');
            } else {
                return redirect()->back()->with('failed', 'Opss! Bir Hata Oluştu');
            }
        } else {

            return redirect()->back()->with('failed', 'Bu Grupta Böyle Bir Kullanıcı Zaten Bulunmakta');
        }
    }

    public function destroyMember($validatedData)
    {

        $data = $this->checkUserAndGrup($validatedData);

        $user =  $data['user'];
        $grup =  $data['grup'];


        if ($member = Member::where('grup_id', $grup->id)->where('user_id', $user->id)->first()) {

            if ($member->delete()) {
                return redirect()->back()->with('success', 'Başarılı Bir Şekilde Gruptan Çıkarıldı');
            } else {
                return redirect()->back()->with('failed', 'Opss! Bir Hata Oluştu');
            }
        } else {

            return redirect()->back()->with('failed', 'Bu Grupta Böyle Bir Kullanıcı Bulunanamadı');
        }
    }

    // 

    public function storeProfilePhoto($request, $grup)
    {

        if ($request->hasFile('photo')) {
            // hata:solved  "Call to a member function hasFile() on array" hatası döndürüyordu validated() func. olmaması lazım  
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $fileName = 'pp' . time() . '.' . $ext;

            if ($filePath = $file->move('uploads/grup/grup-profile/', $fileName)) {


                return $grup->logo_path = $filePath;
            }
        }
    }

    public function redirectBackGrup($grupResult)
    {
        if ($grupResult) {
            return redirect()->back()->with('success', 'Başarılı Bir Şekilde Tamamlandı');
        } else {
            return redirect()->back()->with('failed', 'Maalesef Başarısız');
        }
    }


    public function redirectToGrups($grupResult)
    {
        if ($grupResult) {

            return redirect()->route('list.grup')->with('success', 'Başarılı Bir Şekilde Tamamlandı');
        } else {

            return redirect()->route('list.grup')->with('failed', 'Maalesef Başarısız');
        }
    }



    
}
