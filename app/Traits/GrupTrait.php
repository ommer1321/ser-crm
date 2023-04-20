<?php

namespace App\Traits;

use App\Http\Requests\Requests\GrupFormRequest;
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

    public function storeGrupMembers($grup_id,$newMembersArray)
    {
   
        foreach ($newMembersArray  as $member_uuid) {
            $member = new Member();
            $user = User::where('user_id', $member_uuid)->first();
            if ($user) {

                $member->member_id = $user->id;
                $member->grup_id = $grup_id;
                $member->member_uuid = $user->user_id;
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
        // $grup->user =  $validatedData['user'];  

        $grupResult = $grup->save();

        $grup_id = $grup->id;
        $newMembersArray = $validatedData['user'];

     $this->storeGrupMembers($grup_id,  $newMembersArray);

  
        return   $this->redirectToGrups($grupResult);
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
