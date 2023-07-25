<?php

namespace App\Http\Controllers\Teacher\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskAnswerRequest;
use App\Http\Requests\TaskFormRequest;
use App\Models\Teacher\Task;
use App\Models\User;
use App\Traits\Friendship;
use App\Traits\GrupNotification;
use App\Traits\TaskCommentTrait;
use App\Traits\TaskTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
  use TaskTrait, Friendship, TaskCommentTrait , GrupNotification;

  public function index()
  {
    $myFriends = $this->myFriendships();
    $taskList = $this->listTask();
    return view('task.index', compact('taskList', 'myFriends'));
  }



  function updateAnswer(TaskAnswerRequest $request)
  {

    $updateStudentTaskAnswer_res = $this->updateStudentTaskAnswer($request);


    if ($updateStudentTaskAnswer_res) {

      return redirect()->back()->with('success', 'Durum Güncellendi');
    } else {

      return redirect()->back()->with('failed', 'Opss! Bir Sorun Oluştu Durum Güncellenmedi. ');
    }
  }



  public function detail($task_id)
  {

    $data  = $this->getTask($task_id);


    $task = $data['task'];


    $tagged_users = $data['tagged_users'];

    $isStudentTaggedToTask = $this->isStudentTaggedToTask($task, $tagged_users);

    if ($isStudentTaggedToTask == false) {
      return redirect()->back();
    }

    $activeTaskComments = $this->getActiveTaskComments($task->id);

    $editableTaskComments = $this->getTaskComments($task->id);

    $myFriends = $this->myFriendshipsWithTaggedUsers($task);


    // Services Area

    $service_task_data  = $this->SERVICE_FUNC_detail_task($task);
    $task->user_answers = $service_task_data['task_answer'];
    $task->my_answer =  $service_task_data['my_answer'];

    return view('task.details', compact('task', 'tagged_users', 'myFriends', 'activeTaskComments', 'editableTaskComments'));
  }




  public function update(TaskFormRequest $request, $task_id)
  {


    $data =  $this->getTask($task_id);
    $task = $data['task'];

    return $this->updateTask($request, $task);
  }





  public function store(TaskFormRequest $request)
  {
 

    $request->user ?? '';
    $validatedData =  $request->validated();

    $task =  new Task();

    if ($request->grup) {
      return $this->storeTaskWithGrup($request, $task, $request->user);
    } else {
      return $this->storeTask($request, $task, $request->user);
    }
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
