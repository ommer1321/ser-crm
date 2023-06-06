<?php

namespace App\Traits;

use App\Http\Requests\TaskFormRequest;
use App\Models\Teacher\Task;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

trait HelperTrait
{
    use HasRoles;

    public function redirectResultBack($Result)
    {
        if ($Result) {
            return redirect()->back()->with('success', 'Başarılı Bir Şekilde Tamamlandı');
        } else {
            return redirect()->back()->with('failed', 'Maalesef Başarısız');
        }
    }

    public function resultCheck($Result)
    {


        return $Result;
    }


    // Role And Permission Functions


    public function adminRoleControl()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return 0;
        }
        return 1;
    }


    public function teacherRoleControl()
    {
        $user = Auth::user();
        if ($user->hasRole('teacher')) {
            return 0;
        }
        return 1;
    }


    public function studentRoleControl()
    {
        $user = Auth::user();
        if (!$user->hasRole('student')) {
            return redirect()->route('index.home')->with('failed', 'Bu işlem için yetkiniz yok');
        }
    }


    public function teacherAndAdminRoleControl()
    {
        $user = Auth::user();
        if (($user->hasRole('teacher')) || ($user->hasRole('admin'))) {
            return 0;
        }

        return 1;
    }
}
