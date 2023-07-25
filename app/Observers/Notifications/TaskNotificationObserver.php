<?php

namespace App\Observers\Notifications;

use App\Models\Grup\GrupNotification;
use App\Models\Grup\Member;
use App\Models\Teacher\Task;
use App\Models\User;
use App\Traits\GrupNotification as TraitsGrupNotification;

class TaskNotificationObserver
{
    use TraitsGrupNotification;
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        if ($task && isset($task->grup_id)) {

            if (isset($task->tagged_users)) {
                $tagged_users_uuıd = json_decode($task->tagged_users);

                foreach ($tagged_users_uuıd as $tagged_user) {

                    $user =  User::where('user_id', $tagged_user)->first();
                    if ($user) {

                        $Notification = new GrupNotification();
                        $Notification->grup_id =  $task->grup_id;
                        $Notification->sender_id =  auth()->user()->id;
                        $Notification->user_id =  $user->id;
                        $Notification->model =   $this->modelType(class_basename(get_called_class()));
                        $Notification->message =   $this->modelMessage( $this->modelType(class_basename(get_called_class())));
                        $Notification->save();
                    }
                }
            }
        }


      
        //-----Notifications-----

    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
