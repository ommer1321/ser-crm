<?php

namespace App\Observers\Notifications;

use App\Models\Grup\GrupNotification;
use App\Models\Teacher\TaskComment;
use App\Models\User;
use App\Traits\GrupNotification as TraitsGrupNotification;

class TaskCommentNotificationObserver
{
   
    /**
     * Handle the TaskComment "created" event.
     */

     use TraitsGrupNotification;
    public function created(TaskComment $taskComment): void
    {

     
        if ($taskComment && isset($taskComment->which_task->grup_id)) {
        
           

            if (isset($taskComment->which_task->tagged_users)) {

                $tagged_users_uuıd = json_decode($taskComment->which_task->tagged_users);

                foreach ($tagged_users_uuıd as $tagged_user) {

                    $user =  User::where('user_id', $tagged_user)->first();
                    if ($user) {

                        $Notification = new GrupNotification();
                        $Notification->grup_id =  $taskComment->which_task->grup_id;
                        $Notification->sender_id =  auth()->user()->id;
                        $Notification->user_id =  $user->id;
                        $Notification->model =   $this->modelType(class_basename(get_called_class()));
                        $Notification->message =   $this->modelMessage($Notification->model);
                        
              

                        $Notification->save();
                    }
                }
            }
        }
    }

    /**
     * Handle the TaskComment "updated" event.
     */
    public function updated(TaskComment $taskComment): void
    {
        //
    }

    /**
     * Handle the TaskComment "deleted" event.
     */
    public function deleted(TaskComment $taskComment): void
    {
        //
    }

    /**
     * Handle the TaskComment "restored" event.
     */
    public function restored(TaskComment $taskComment): void
    {
        //
    }

    /**
     * Handle the TaskComment "force deleted" event.
     */
    public function forceDeleted(TaskComment $taskComment): void
    {
        //
    }
}
