<?php

namespace App\Http\Controllers\Teacher\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskFormRequest;
use App\Models\Teacher\Task;
use App\Traits\TaskTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    use TaskTrait;

    public function index()
    {
         $taskList = $this->listTask();
         return view('task.create');
    }
    public function create()
    {
         $taskList = $this->listTask();
         return  view('task.create',compact('taskList'));
    }

    public function store(TaskFormRequest $request)
    {
        $validatedData =  $request->validated();
        $task =  new Task();
        return $this->storeTask($validatedData, $task);
        
    }



    public function test()
    {

       
    }
}
    