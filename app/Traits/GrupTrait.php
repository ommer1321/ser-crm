<?php

namespace App\Traits;

use App\Http\Requests\GrupFormRequest;
use App\Http\Requests\TaskFormRequest;
use App\Models\Grup\Grup;
use App\Models\Grup\Member;
use App\Models\Teacher\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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


    public function storeGrup($validatedData, $grup)
    {

        $grup->teacher_id = Auth::user()->id;
        $grup->name = $validatedData['name'];
        $grup->details = $validatedData['details'];
        $grup->branch = $validatedData['branch'];


        // hata:basic burası açılacak
        // $photo =  $this->storeProfilePhoto($validatedData, $grup);

        // if ($photo) {
        //     $grup->logo_path = $photo;
        // }


        $grupResult = $grup->save();

        $grup_id = $grup->id;
        $newMembersArray = $validatedData['user'];

        $this->storeGrupMembers($grup_id,  $newMembersArray);


        return   $this->redirectToGrups($grupResult);
    }


    public function updateGrup($validatedData, $grup)
    {


        
        $grup->name = $validatedData['name'];
        $grup->details = $validatedData['details'];
        $grup->branch = $validatedData['branch'];


    }

    public function storeProfilePhoto($validatedData, $grup)
    {

        if ($validatedData->hasFile('photo')) {
            // hata:orta "Call to a member function hasFile() on array" ahtası döndürüyor
            $file = $validatedData->file('photo');
            $ext = $file->getClientOriginalExtension();
            $fileName = 'pp' . time() . '.' . $ext;

            if ($file->move('uploads/grup/', $fileName)) {

                return $fileName;
                // $grup->logo_path = $fileName;
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

            return redirect()->route('index.grup')->with('success', 'Başarılı Bir Şekilde Tamamlandı');
        } else {

            return redirect()->route('index.grup')->with('failed', 'Maalesef Başarısız');
        }
    }
}
