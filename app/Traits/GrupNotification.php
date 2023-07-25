<?php

namespace App\Traits;

use App\Models\Grup\GrupNotification as ModelNotification;
use App\Models\Grup\Member;

trait GrupNotification
{
    // public function newNotification($grup_id, $shared_item_id)
    // {
    //     $user_id = auth()->user()->id;
    //     $message = $this->modelMessage();
    // }




    public function modelType()
    {

        $model = class_basename(get_called_class());
        switch ($model) {
            case 'TaskNotificationObserver':
                $name_of_model = 'task';
                return $name_of_model;
                break;

            case 'TaskCommentNotificationObserver':
                $name_of_model = 'task_comment';
                return $name_of_model;
                break;


            case 'asd':
                $name_of_model = 'news';
                return $name_of_model;
                break;



            case 'a':
                $name_of_model = 'friendship_request';
                return $name_of_model;
                break;

            default:
                return null;
                break;
        }
    }



    public function modelMessage($modelType)
    {
        // $Notification->message =   auth()->user()->name . ' ' . auth()->user()->surname . 'adlı kullanıcı ' . $task->grup_id . 'grubuna sizin için bir görev ekledi';


        switch ($modelType) {
            case 'task':
                $message_of_model = 'task mesajı';
                return $message_of_model;
                break;

            case 'task_comment':
                $message_of_model = 'task_comment  mesajı';
                return $message_of_model;
                break;


            case 'news':
                $message_of_model = 'news  mesajı';
                return $message_of_model;
                break;

            case 'friendship_request':
                $message_of_model = 'friendship_request mesajı';
                return $message_of_model;
                break;


            default:
                return 'boş mesaj';
                break;
        }
    }


    function notification_mutltiple_array_to_single_array($notifications_collettions)
    {
        $notifications = [];
        //  multiple array to single array
        return    $notifications[] = $notifications_collettions->flatten();
    }



    function notification_is_sended($notifications)
    {
        foreach ($notifications as $key => $notification) {
            if ($notification->is_sended == 1) {
                $newNotifications[] = $notification;
                $notifications->forget($key);
            }
        }
        $newNotifications = collect($newNotifications);


        $notifications = $notifications->sortByDesc('created_at');
        $newNotifications = $newNotifications->sortByDesc('created_at');

        return $data = ['notifications' => $notifications, 'newNotifications' => $newNotifications];
    }



    function listNotifications()
    {


        $notifications_collettions = collect([]);
        $newNotifications = [];
        $notifications = [];
        $grups = Member::where('user_id', auth()->user()->id)->get();



        if (isset($grups)) {

            foreach ($grups as $grup) {

                $notifications_collettions[] = ModelNotification::where('grup_id', $grup->grup_id)->where('user_id', auth()->user()->id)->get();
            }

            if (count($notifications_collettions) > 0) {

                $notifications  = $this->notification_mutltiple_array_to_single_array($notifications_collettions);



                return    $data =    $this->notification_is_sended($notifications);
                // $newNotifications = $data['newNotifications'];
                // $notifications = $data['notifications'];
            } else {

                $notification = [];
                $newNotifications = [];
                return $data = ['notifications' => $notification, 'newNotifications' => $newNotifications];
            }
        }
    }


    function markAllNotifications($notifications)
    {


        if (count($notifications) > 0) {

            foreach ($notifications as $notification) {
                $notification->is_sended = '1';
                $notification->save();
            }

            return true;
        } else {
            false;
        }
    }




    function markOneNotification($notification)
    {

        $notification->is_sended = '1';
        if ($notification->save()) {
            return true;
        } else {

            return false;
        }
    }
}
