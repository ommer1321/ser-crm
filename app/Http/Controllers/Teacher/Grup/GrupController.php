<?php

namespace App\Http\Controllers\Teacher\Grup;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupAddMemberFormRequest;
use App\Http\Requests\GrupDeleteMemberFormRequest;
use App\Http\Requests\GrupFormRequest;
use App\Http\Requests\GrupUpdateInfoFormRequest;
use App\Models\Grup\Grup;
use App\Models\Grup\Member;
use App\Models\User;
use App\Traits\Friendship;
use App\Traits\GrupTaskTrait;
use App\Traits\GrupTrait;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class GrupController extends Controller
{
    use GrupTrait, Friendship, HelperTrait, GrupTaskTrait;




    public function listGrups()
    {

        $grups = $this->listGrupsWithMembers();

        return view('grup.list-grups', compact('grups'));
    }

    public function create()
    {


        $users =  $this->myFriendships();

        return view('grup.create', compact('users'));
    }

    public function store(GrupFormRequest $request)
    {
        $rol_and_permission_control = $this->teacherRoleControl();

        if ($rol_and_permission_control) {
            return redirect()->back()->with('failed', 'Bu işlem için yetkiniz yok');
        }


        $grup = new Grup();
        return     $this->storeGrup($request, $grup);
    }


    public function updateGroupInfo(GrupUpdateInfoFormRequest $request, $id)
    {
        $rol_and_permission_control = $this->teacherRoleControl();

        if ($rol_and_permission_control) {
            return redirect()->back()->with('failed', 'Bu işlem için yetkiniz yok');
        }


        $grup =  Grup::where('grup_id', $id)->first();
        $validetedData = $request->validated();

        if (isset($grup) && isset($validetedData)) {

            $res =    $this->updateGrup($validetedData, $grup);
            if ($res) {

                return redirect()->back()->with('success', 'Başarılı Bir Şekilde Güncellendi');
            } else {

                return redirect()->back()->with('failed', 'Opss! Bir Hata Oldu Güncellenmedi :(');
            }
        }
    }

    public function updateGroupPhoto(Request $request, $id)
    {
        $rol_and_permission_control = $this->teacherRoleControl();

        if ($rol_and_permission_control) {
            return redirect()->back()->with('failed', 'Bu işlem için yetkiniz yok');
        }

        $grup =  Grup::where('grup_id', $id)->first();

        $res =  $this->updateProfilePhoto($request, $grup);

        if ($res) {

            return redirect()->back()->with('success', 'Başarılı Bir Şekilde Güncellendi');
        } else {

            return redirect()->back()->with('failed', 'Maalesef Güncellenmedi');
        }
    }


    public function settings($grup_id)
    {


        $users = $this->students();
        $grup =    $this->listGrupDetails($grup_id);

        $isGrupTeacher = $this->isGrupTeacher($grup);
        
        if ($isGrupTeacher == false) {
            
            return redirect()->back();

        }
        
        return view('grup.settings', compact(['grup', 'users']));
    }


    public function members($grup_id)
    {
        $users = $this->listMembers($grup_id);
        $myFriends = $this->myFriendshipsWithoutGrupMembers($users);
        $grup =    $this->listGrupDetails($grup_id);

        return view('grup.grup-members', compact(['grup', 'myFriends', 'users']));
    }


    public function deleteMember(GrupDeleteMemberFormRequest $request)
    {
        $rol_and_permission_control = $this->teacherRoleControl();

        if ($rol_and_permission_control) {
            return redirect()->back()->with('failed', 'Bu işlem için yetkiniz yok');
        }


        $validetedData = $request->validated();

        return $this->destroyMember($validetedData);
    }


    public function addMember(GrupAddMemberFormRequest $request)
    {

        $rol_and_permission_control = $this->teacherRoleControl();

        if ($rol_and_permission_control) {
            return redirect()->back()->with('failed', 'Bu işlem için yetkiniz yok');
        }

        $validetedData = $request->validated();

        return $this->storeMember($validetedData);
    }
}
