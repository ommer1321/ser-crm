<?php

namespace App\Traits;

use App\Http\Requests\TaskFormRequest;
use App\Http\Requests\TaskMemberValidateFormRequest;
use App\Models\Grup\Grup;
use App\Models\Teacher\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait TaskTrait
{


    public function redirectBackTask($taskResult)
    {
        if ($taskResult) {
            return redirect()->back()->with('success', 'Başarılı Bir Şekilde Tamamlandı');
        } else {
            return redirect()->back()->with('failed', 'Maalesef Başarısız');
        }
    }


    public function redirectToTasks($taskResult)
    {
        if ($taskResult) {

            return redirect()->route('index.task')->with('success', 'Başarılı Bir Şekilde Tamamlandı');
        } else {

            return redirect()->route('index.task')->with('failed', 'Maalesef Başarısız');
        }
    }


    public function listTask()
    {
        $tasks = Task::where('teacher_id', Auth::user()->id)
        ->where('grup_id',null)
        ->OrderBy('updated_at', 'desc')
        ->get();

        return ($tasks);
    }

    public function getTask($task_id)
    {
        // hata:basic 404 hatası dönüyor kontrolsüz first atıldığı için
        $task = Task::where('task_id', $task_id)->first() ?? abort('404');

        $tagged_users =  $this->getTaggedUsers($task->tagged_users);

        return $data = ['task' => $task, 'tagged_users' => $tagged_users];
    }


    public function getTaggedUsers($tagged_users)
    {
        $usersId = json_decode($tagged_users);
        $data = [];
        if (!$tagged_users == null) {
            foreach ($usersId as $userId) {
                $data[] = User::where('user_id', $userId)->first();
            }
        }

        return $data;
    }


    public function resultCheck($functionResult)
    {

        // if ($functionResult == null) {

        //     return $functionResult;

        // } else {
        //     $type = gettype($functionResult);

        //     switch ($type) {
        //         case 'integer':
        //             return null;
        //         case 'double':
        //             return floatval(null);
        //         case 'string':
        //             return strval(null);
        //         case 'boolean':
        //             return boolval(null);
        //         case 'array':
        //             return ['2'];
        //         case 'object':
        //             return [null];
        //         default:
        //             return null;
        //     }

        // }



        return $functionResult;
    }


    public function updateTask($request, $task)
    {
        $validatedData =  $request->validated();

        $requestUsers =    $request->user;
        $task->title = $validatedData['title'];
        $task->note = $validatedData['note'];
        $task->status = $validatedData['status'];
        $task->finished_at = $validatedData['finished_at'];

           $res_member =  $this->memberValidate($requestUsers);

        if ($res_member == 'failed') {
            return redirect()->back()->with('failed', 'Geçersiz Kullanıcı Mevcut');
        }

        $task->tagged_users = $res_member;

        $taskResult = $task->update([
            'title' => $validatedData['title'],
            'note' => $validatedData['note'],
            'status' => $validatedData['status'],
            'finished_at' => $validatedData['finished_at'],

        ]);

        return   $this->redirectBackTask($taskResult);
    }


    public function storeTask($request, $task, $requestUsers)
    {
    
        $validatedData =  $request->validated();

        
        $task->teacher_id = Auth::user()->id;
        $task->title = $validatedData['title'];
        $task->note = $validatedData['note'];
        $task->status = $validatedData['status'];
        $task->finished_at = $validatedData['finished_at'];

        $res_member =  $this->memberValidate($requestUsers);

        if ($res_member == 'failed') {
            return redirect()->back()->with('failed', 'Geçersiz Kullanıcı Mevcut');
        }

        $task->tagged_users = $res_member ?? null;       

        

        
        $taskResult = $task->save();

        return   $this->redirectBackTask($taskResult);
    }

    public function storeTaskWithGrup($request, $task, $requestUsers)
    {
    
        $validatedData =  $request->validated();

        if($request->grup){
            $grup = Grup::where('grup_id',$request->grup)->first();
        }
        
        $task->teacher_id = Auth::user()->id;
        $task->title = $validatedData['title'];
        $task->note = $validatedData['note'];
        $task->status = $validatedData['status'];
        $task->finished_at = $validatedData['finished_at'];

        $res_member =  $this->memberValidate($requestUsers);

        if ($res_member == 'failed') {
            return redirect()->back()->with('failed', 'Geçersiz Kullanıcı Mevcut');
        }

        $task->tagged_users = $res_member ?? null;       

        $grup ? $task->grup_id = $grup->id : $task->grup_id =  null ;
        


        $taskResult = $task->save();

        return   $this->redirectBackTask($taskResult);
    }

    public function deleteTask($task_id)
    {
        $task = Task::where('task_id', $task_id)->first();

        $deletedTask = $task->delete();

        return  $this->redirectToTasks($deletedTask);
    }


    // public function formControlTask(TaskFormRequest $request, $task, $task_id)
    // {
    //     if ($request->has('deleteTaskButton')) {

    //         return $this->deleteTask($task_id);
    //     } elseif ($request->has('updateTaskButton')) {

    //         return $this->updateTask($request, $task);
    //     }
    // }

    public function memberValidate($users)
    {
        $data = [];

        if ($users) {

            foreach ($users as $userId) {
                $user = User::where('user_id', $userId)->exists();

                if (!$user) {
                    return 'failed';
                }
                $data[] = $userId;
            }
            return json_encode($data);
        } else {
        }
    }
}
