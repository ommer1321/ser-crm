<?php

namespace App\Http\Controllers\Teacher\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskFormRequest;
use App\Models\Teacher\Task;
use App\Traits\Friendship;
use App\Traits\TaskTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
  use TaskTrait, Friendship;

  public function index()
  {
    $myFriends = $this->myFriendships();
    $taskList = $this->listTask();
    return view('task.index', compact('taskList', 'myFriends'));
  }



  public function detail($task_id)
  {

    $data  = $this->getTask($task_id);
    $task = $data['task'];
    $tagged_users = $data['tagged_users'];
    $myFriends = $this->myFriendshipsWithTaggedUsers($task);

    return view('task.details', compact('task', 'tagged_users', 'myFriends'));
  }




  public function update(TaskFormRequest $request, $task_id)
  {

 
    $data =  $this->getTask($task_id);
    $task = $data['task'];

    return $this->updateTask($request, $task );
  }





  public function store(TaskFormRequest $request)
  {
    $request->user ?? '';
    $validatedData =  $request->validated();
    $task =  new Task();
    return $this->storeTask($validatedData, $task, $request->user);
  }


  public function delete($task_id)
  {
    return  $this->deleteTask($task_id);
    //    $this->formControlTask($request,$task,$task_id);
  }


  public function test()
  {
  }
}
