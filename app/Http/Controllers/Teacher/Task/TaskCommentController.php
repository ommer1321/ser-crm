<?php

namespace App\Http\Controllers\Teacher\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCommentDeleteFormRequest;
use App\Http\Requests\TaskCommentFormRequest;
use App\Http\Requests\TaskCommentPimFormRequest;
use App\Models\Teacher\Task;
use App\Models\Teacher\TaskComment;
use App\Traits\TaskCommentTrait;
use Illuminate\Http\Request;

class TaskCommentController extends Controller
{
  use  TaskCommentTrait;

  public function store(TaskCommentFormRequest $request)
  {

     $checkUserTaggedToTask  =  $this->checkUserTaggedToTask($request);

    if(! $checkUserTaggedToTask){

      return redirect()->route('index.home')->with('failed', 'Bu Tasktan Çıkarıldınız Yorum Yapamazsınız');

    }


    $res = $this->storeTaskComment($request);

    if ($res) {

      return redirect()->back()->with('success', 'Yorum Başarıyla Eklendi ');
    } else {

      return redirect()->back()->with('failed', 'Opss! Yorum Başarısız');
    }
  }

  public function delete(TaskCommentDeleteFormRequest $request)
  {

    $res =  $this->deleteTaskComment($request);

    if ($res) {

      return redirect()->back()->with('success', 'Yorum Silindi');
    } else {

      return redirect()->back()->with('failed', 'Opss! Silme İşlemi Başarısız');
    }
     $request->validated();
  }

  
  public function pim(TaskCommentPimFormRequest $request)
  {

    $res =  $this->pimTaskComment($request);

    if ($res) {

      return redirect()->back()->with('success', 'Yorum İşlemi Başarılı ');
    } else {

      return redirect()->back()->with('failed', 'Opss! Yorum İşlemi Başarısız');
    }
    
  }



}
