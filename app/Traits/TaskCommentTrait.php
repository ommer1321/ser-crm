<?php

namespace App\Traits;

use App\Http\Requests\TaskFormRequest;
use App\Http\Requests\TaskMemberValidateFormRequest;
use App\Models\Teacher\Task;
use App\Models\Teacher\TaskComment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait TaskCommentTrait
{

    public function checkUserTaggedToTask($request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $task = Task::where('task_id', $request->task)->first();
        $tagged_users = json_decode($task->tagged_users);

        if ($tagged_users) {

            foreach ($tagged_users as $tagged_user) {

                if ($user->user_id != $tagged_user) {

                    if ($task->teacher_id != auth()->user()->id) {

                        return false;
                    }
                }
            }
        }


        return true;
    }




    public function getActiveTaskComments($task_id)
    {
        $pimmed = [];
        $data = [];

        $comments = collect($this->getTaskComments($task_id));
        // $collection = collect($array);

        foreach ($comments as $key => $comment) {
            if ($comment->pimmed == 1) {
                $pimmed[] = $comment;
                unset($comments[$key]);
            }
        }

        $comments = $comments->values();

        if ($pimmed) {

            foreach ($pimmed as $pim) {

                $data = $comments->prepend($pim);
            }

            return  $data;
        }

        return  $comments;

        
    }


    public function getTaskComments($task_id)
    {
        $taskComments = TaskComment::where('task_id', $task_id)

            ->where('is_deleted', '0')
            ->orderBy('created_at', 'asc')
            ->with('who_comment_user')
            ->get();

        if ($taskComments) {
            foreach ($taskComments as $comment) {
                $comment->auth = false;

                if ($comment->who_commenter_id == auth()->user()->id) {
                    $comment->who_comment_user->name = 'Sen';
                    $comment->auth = true;
                }
            }
        }

        return $taskComments;
    }




    public function storeTaskComment($request)
    {
        $taskComment = new TaskComment();
        $validated = $request->validated();


        $task = Task::where('task_id', $validated['task'])->first();

        $taskComment->comment = $validated['comment'];
        $taskComment->who_commenter_id = auth()->user()->id;
        $taskComment->task_id = $task->id;

        if ($taskComment->save()) {
            return true;
        } else {
            return false;
        }
    }


    public function deleteTaskComment($request)
    {
        $taskComment = TaskComment::where('comment_uuid', $request->comment)
            ->where('is_deleted', '0')

            ->first();


        if ($taskComment) {

            $task = Task::where('id', $taskComment->task_id)->first();

     
            if (auth()->user()->id == $taskComment->who_commenter_id || auth()->user()->id == $task->teacher_id) {

                $taskComment->is_deleted = 1;
                $res = $taskComment->save();
            }


            if ($res) {
                return true;
            } else {
                return false;
            }
        } else {

            return false;
        }
    }


    public function pimTaskComment($request)
    {
        $taskComment = TaskComment::where('comment_uuid', $request->comment)
            ->where('is_deleted', '0')
            ->first();


        if ($taskComment) {

            $task = Task::where('id', $taskComment->task_id)->first();


            if (auth()->user()->id == $task->teacher_id) {

                if ($taskComment->pimmed == 1) {

                    // dd(2);
                    $taskComment->pimmed = '0';
                    $res = $taskComment->save();
                }
                elseif ($taskComment->pimmed == 0) {
                    // dd(1);
                    $taskComment->pimmed = '1';
                    $res = $taskComment->save();
                }
            }


            if ($res) {
                return true;
            } else {
                return false;
            }
        } else {

            return false;
        }
    }

}
