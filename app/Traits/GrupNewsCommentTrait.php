<?php

namespace App\Traits;

use App\Http\Requests\TaskFormRequest;
use App\Http\Requests\TaskMemberValidateFormRequest;
use App\Models\Grup\Grup;
use App\Models\Grup\GrupNews;
use App\Models\Grup\GrupNewsComments;
use App\Models\Grup\Member;
use App\Models\Teacher\Task;
use App\Models\Teacher\TaskComment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait GrupNewsCommentTrait
{

    public function checkUserMemberToGrup($request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $grup = Grup::where('grup_id', $request->grup)->first();

        if (auth()->user()->id != $grup->teacher_id) {

            $member = Member::where('user_id', $user->id)->where('grup_id', $grup->id)->first();

            if (!$member) {

                return false;
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





    public function storeGrupNewsComment($request)
    {
        $GrupNewsComments = new GrupNewsComments();
        $Grup = Grup::where('grup_id', $request->grup)->first();
        $GrupNews = GrupNews::where('news_uuid', $request->grup_news)->first();

        $GrupNewsComments->who_commenter_id = auth()->user()->id;
        $GrupNewsComments->news_id = $GrupNews->id;
        $GrupNewsComments->comment = $request->comment;
        $GrupNewsComments->grup_id = $Grup->id;


        if ($GrupNewsComments->save()) {
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
        return  $taskComment = TaskComment::where('comment_uuid', $request->comment)
            ->where('is_deleted', '0')
            ->first();


        if ($taskComment) {

            $task = Task::where('id', $taskComment->task_id)->first();


            if (auth()->user()->id == $task->teacher_id) {

                if ($taskComment->pimmed == 1) {

                    // dd(2);
                    $taskComment->pimmed = '0';
                    $res = $taskComment->save();
                } elseif ($taskComment->pimmed == 0) {
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










    
    // public function getGrupNewsComments($grup_id)
    // {
    //     $Grup = Grup::where('grup_id', $grup_id)->first();
    //     if ($Grup) {

    //         $GrupNewsComments = GrupNewsComments::where('grup_id', $Grup->id)

    //             ->where('is_deleted', '0')
    //             ->orderBy('updated_at', 'asc')
    //             ->with('who_comment_user')
    //             ->get();



    //         if ($GrupNewsComments) {
    //             foreach ($GrupNewsComments as $comment) {
    //                 $comment->auth = false;

    //                 if ($comment->who_commenter_id == auth()->user()->id) {
    //                     $comment->who_comment_user->name = 'Sen';
    //                     $comment->auth = true;
    //                 }
    //             }         
                
    //             return $GrupNewsComments;
    //         }

   

    //     } else {

    //         // hata önlemek için
    //         return $GrupNewsComments = new  GrupNewsComments();
    //     }
    // }

}
