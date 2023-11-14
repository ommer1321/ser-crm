<?php

namespace App\Observers\Notifications;

use App\Models\Grup\Grup;
use App\Models\Grup\GrupNews;
use App\Models\Grup\GrupNotification;
use App\Models\Grup\Member;
use App\Models\User;
use App\Traits\GrupNotification as TraitsGrupNotification;

class NewsNotificationObserver
{
    use TraitsGrupNotification;
    /**
     * Handle the GrupNews "created" event.
     */
    public function created(GrupNews $grupNews): void
    {

     
        if ($grupNews && isset($grupNews->grup_id)) {

         $member_users  = Member::where('grup_id',$grupNews->grup_id)->get();


            if (isset($member_users)) {
            
                foreach ($member_users as $member_user) {

                    $user =  User::where('id', $member_user->user_id)->first();
                    if ($user) {

                        $Notification = new GrupNotification();
                        $Notification->grup_id =  $grupNews->grup_id;
                        $Notification->sender_id =  auth()->user()->id;
                        $Notification->user_id =  $user->id;
                        $Notification->model_uuid =  $grupNews->grup_info->grup_id;
                        
                        $Notification->model =   $this->modelType(class_basename(get_called_class()));
                        $Notification->message =   $this->modelMessageCreate( $this->modelType(class_basename(get_called_class())),$grupNews);
                 
                        $Notification->save();
                    }
                }
            }
        }

    }

    /**
     * Handle the GrupNews "updated" event.
     */
    public function updated(GrupNews $grupNews): void
    {
        //
    }

    /**
     * Handle the GrupNews "deleted" event.
     */
    public function deleted(GrupNews $grupNews): void
    {
        //
    }

    /**
     * Handle the GrupNews "restored" event.
     */
    public function restored(GrupNews $grupNews): void
    {
        //
    }

    /**
     * Handle the GrupNews "force deleted" event.
     */
    public function forceDeleted(GrupNews $grupNews): void
    {
        //
    }
}
