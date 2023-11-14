<?php

namespace App\Traits;

use App\Models\Grup\GrupNotification as ModelNotification;
use App\Models\Grup\Member;

trait GrupNotification
{



    public function modelAttributeTransform($data)
    {

        if (count($data) > 0) {
            // if (count($data) > 0)


            $notifications = $data['notifications'];
            $newNotifications =  $data['newNotifications'];
            if (count($notifications) > 0) {




                foreach ($notifications as $notification) {
                    switch ($notification->model) {
                        case 'task':
                            $notification->model  =  'tasks';
                            break;

                        case 'task_comment':
                            $notification->model  =  'tasks';
                            break;


                        case 'news':
                            $notification->model  =  'grup';
                            break;

                        case 'news_comment':
                            $notification->model  =  'grup';
                            break;



                        case 'friendship_request':
                            // $message_of_model = 'friendship_request mesajı';
                            break;


                        default:
                            $this->attributes['model']  =  'details.task';
                            break;
                    }
                }
            }


            if (count($newNotifications) > 0) {
                foreach ($newNotifications as $newNotification) {



                    switch ($newNotification->model) {
                        case 'task':
                            $newNotification->model  =  'tasks';
                            break;

                        case 'task_comment':
                            $newNotification->model  =  'tasks';
                            break;


                        case 'news':
                            // $message_of_model = 'news  mesajı';
                            break;

                        case 'friendship_request':
                            // $message_of_model = 'friendship_request mesajı';
                            break;


                        default:
                            $this->attributes['model']  =  'details.task';
                            break;
                    }
                }
            }
            $data['notifications'] = $notifications;
            $data['newNotifications'] = $newNotifications;
            return $data;
        } else {

            return  $data;
        }
    }



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


            case 'NewsNotificationObserver':
                $name_of_model = 'news';
                return $name_of_model;
                break;

            case 'NewsCommentNotificationObserver':
                $name_of_model = 'news_comment';
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



    public function modelMessageCreate($modelType, $model_data)
    {

        switch ($modelType) {
            case 'task':
                $message_of_model = auth()->user()->name . ' ' . auth()->user()->surname . ' adlı kullanıcı ' .  $model_data->grupInfo->name . ' görevine sizi ekledi';
                return $message_of_model;
                break;

            case 'task_comment':
                $message_of_model =  $model_data->who_comment_user->name . ' ' . $model_data->who_comment_user->surname . ' kişisi ' . $model_data->which_task->title . ' taskına yorum yaptı. ';
                return $message_of_model;
                break;


            case 'news':
                $message_of_model = auth()->user()->name . ' ' . auth()->user()->surname . ' adlı kullanıcı ' . $model_data->grup_info->name . ' grubunda bir gönderi paylaştı.';
                return $message_of_model;
                break;



            case 'news_comment':
                $message_of_model = auth()->user()->name . ' ' . auth()->user()->surname . ' adlı kullanıcı ' . $model_data->which_grup->name . ' grubundaki bir gönderiye yorum yaptı.';
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


    public function modelMessageUpdate($modelType, $model_data)
    {

        switch ($modelType) {
            case 'task':
                $message_of_model = auth()->user()->name . ' ' . auth()->user()->surname . ' adlı kullanıcı ' .  $model_data->grupInfo->name . ' grubundaki ' . $model_data->title . ' görevinde bir güncelleme yaptı';


                return $message_of_model;
                break;

            case 'task_comment':
                $message_of_model =  $model_data->who_comment_user->name . ' ' . $model_data->who_comment_user->surname . ' kişisi (' . $model_data->which_task->title . ') taskına yorum yaptı. ';
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
    public function modelMessageDelete($modelType, $model_data)
    {

        switch ($modelType) {
            case 'task':
                $message_of_model = auth()->user()->name . ' ' . auth()->user()->surname . ' adlı kullanıcı ' .  $model_data->grupInfo->name . ' grubundaki ' . $model_data->title . ' görevini kaldırdı.';


                return $message_of_model;
                break;

            case 'task_comment':
                $message_of_model =  $model_data->who_comment_user->name . ' ' . $model_data->who_comment_user->surname . ' kişisi (' . $model_data->which_task->title . ') taskına yorum yaptı. ';
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
        $newNotifications = [];

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
