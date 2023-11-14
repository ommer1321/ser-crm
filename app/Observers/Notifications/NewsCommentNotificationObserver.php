<?php

namespace App\Observers\Notifications;

use App\Models\Grup\GrupNewsComments;
use App\Models\Grup\GrupNotification;
use App\Models\Grup\Member;
use App\Models\User;
use App\Traits\GrupNotification as TraitsGrupNotification;
class NewsCommentNotificationObserver
{
    use TraitsGrupNotification;
    /**
     * Handle the GrupNewsComments "created" event.
     */
    public function created(GrupNewsComments $grupNewsComments): void
    {
 

        if ($grupNewsComments && isset($grupNewsComments->grup_id)) {

            $member_users  = Member::where('grup_id',$grupNewsComments->grup_id)->get();
   
   
               if (isset($member_users)) {
             
                   foreach ($member_users as $member_user) {
   
                       $user =  User::where('id', $member_user->user_id)->first();
                       if ($user) {
   
                           $Notification = new GrupNotification();
                           $Notification->grup_id =  $grupNewsComments->grup_id;
                           $Notification->sender_id =  auth()->user()->id;
                           $Notification->user_id =  $user->id;
                           $Notification->model_uuid =  $grupNewsComments->which_grup->grup_id;
                           
                           $Notification->model =   $this->modelType(class_basename(get_called_class()));
                           $Notification->message =   $this->modelMessageCreate( $this->modelType(class_basename(get_called_class())),$grupNewsComments);
                           $Notification->save();
                       }
                   }
               }
           }
    }

    /**
     * Handle the GrupNewsComments "updated" event.
     */
    public function updated(GrupNewsComments $grupNewsComments): void
    {
        //
    }

    /**
     * Handle the GrupNewsComments "deleted" event.
     */
    public function deleted(GrupNewsComments $grupNewsComments): void
    {
        //
    }

    /**
     * Handle the GrupNewsComments "restored" event.
     */
    public function restored(GrupNewsComments $grupNewsComments): void
    {
        //
    }

    /**
     * Handle the GrupNewsComments "force deleted" event.
     */
    public function forceDeleted(GrupNewsComments $grupNewsComments): void
    {
        //
    }
}
