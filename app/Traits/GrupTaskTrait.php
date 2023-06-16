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

trait GrupTaskTrait
{

    use HelperTrait;


    // Grup Functions

    public function grupOfTasks($grup_id)
    {
        $grup = Grup::where('grup_id', $grup_id)->first();
        $tasks = Task::where('grup_id', $grup->id)
            ->OrderBy('updated_at', 'desc')
            ->get();

        $auth_tasks = [];

        // transformation to array from json
        foreach ($tasks as $task) {
            $tagged_users = $task->tagged_users;
            if ($tagged_users) {
                $task->tagged_users = json_decode($task->tagged_users);

                if (in_array(Auth::user()->user_id, $task->tagged_users)) {


                    $auth_tasks[] = $task;
                }
            }
        }




        return $auth_tasks;
    }

    public function grupOfMembers($grup_id)
    {
        $grup = Grup::where('grup_id', $grup_id)->first();

        $members =  $grup->members;
        $data = [];
        if ($members) {

            foreach ($members as $member) {


                $data[] = User::where('id', $member->user_id)->first();
            }
        }
        return $data;
        // hata:basic Bu gruba ait olmayan kullanıcı role arken ulaşabiliyor ve hata veriyor  
    }
}
