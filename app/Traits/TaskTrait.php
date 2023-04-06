<?php

namespace App\Traits;

use App\Http\Requests\TaskFormRequest;
use App\Models\Teacher\Task;
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
        $tasks = Task::where('teacher_id', Auth::user()->id)->OrderBy('finished_at', 'asc')->get();

        return ($tasks);
    }

    public function getTask($task_id)
    {
        return  $task = Task::where('task_id', $task_id)->first();
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


    public function updateTask($validatedData, $task)
    {

        $task->title = $validatedData['title'];
        $task->note = $validatedData['note'];
        $task->status = $validatedData['status'];
        $task->finished_at = $validatedData['finished_at'];

        $taskResult = $task->update([
            'title' => $validatedData['title'],
            'note' => $validatedData['note'],
            'status' => $validatedData['status'],
            'finished_at' => $validatedData['finished_at'],

        ]);

        return   $this->redirectBackTask($taskResult);
    }


    public function storeTask($validatedData, $task)
    {
        $task->teacher_id = Auth::user()->id;
        $task->title = $validatedData['title'];
        $task->note = $validatedData['note'];
        $task->status = $validatedData['status'];
        $task->finished_at = $validatedData['finished_at'];

        $taskResult = $task->save();

        return   $this->redirectBackTask($taskResult);
    }


    public function deleteTask($task_id)
    {
        $task = Task::where('task_id', $task_id)->first();

        $deletedTask = $task->delete();
        
        return  $this->redirectToTasks($deletedTask);

      
    }


    public function formControlTask(TaskFormRequest $validatedData, $task, $task_id)
    {
        if ($validatedData->has('deleteTaskButton')) {

            return $this->deleteTask($task_id);
        } elseif ($validatedData->has('updateTaskButton')) {

            return $this->updateTask($validatedData, $task);
        }
    }
}
