<?php

namespace App\Traits;

use App\Http\Requests\TaskFormRequest;
use App\Models\Teacher\Task;
use Illuminate\Support\Facades\Auth;

trait TaskTrait
{


    public function listTask()
    {
        $task = Task::where('teacher_id', Auth::user()->id)->OrderBy('finished_at','asc')->get();

        return ($task);
    }

public function differenceTaskDate()
{
  
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




    public function storeTask($validatedData, $task)
    {
        $task->teacher_id = Auth::user()->id;
        $task->title = $validatedData['title'];
        $task->note = $validatedData['note'];
        $task->status = $validatedData['status'];
        $task->finished_at = $validatedData['finished_at'];

        $taskResult = $task->save();
        
        return   $this->routeTask($taskResult);
    }

    public function routeTask($taskResult)
    {
        if ($taskResult) {
            return redirect()->back()->with('success', 'Başarılı Bir Şekilde Oluşturuldu');
        } else {
            return redirect()->back()->with('failed', 'Maalesef Başarısız');
        }
    }

    

}
