<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationExistRequest;
use App\Models\Grup\GrupNotification;
use App\Models\Grup\Member;
use App\Traits\GrupNotification as TraitsGrupNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use TraitsGrupNotification;

    public function index()
    {
         $data =   $this->listNotifications();
            $data =    $this->modelAttributeTransform($data);

            $notifications = $data['notifications'];
         $newNotifications = $data['newNotifications'];



        return  view('notification.all-notifications', compact('notifications', 'newNotifications')); {
            // $notifications_collettions = collect([]);
            // $newNotifications = [];
            // $grups = Member::where('user_id', auth()->user()->id)->get();



            // if (isset($grups)) {

            //     foreach ($grups as $grup) {

            //         $notifications_collettions[] = GrupNotification::where('grup_id', $grup->grup_id)->get();
            //     }

            //     //  multiple array to single array
            //     $notifications = $notifications_collettions->flatten();

            //     foreach ($notifications as $key => $notification) {
            //         if ($notification->is_sended == 1) {
            //             $notifications->forget($key);
            //             $newNotifications[] = $notification;
            //         }
            //     }

            // }
        }
    }



    public  function mark()
    {
        $notifications = GrupNotification::where('user_id', auth()->user()->id)->where('is_sended', '0')->get();

        $res = $this->markAllNotifications($notifications);

        if ($res) {

            return redirect()->back()->with('success', 'Tüm Bilirimler Okundu İşaretlendi');
        } else {

            return redirect()->back()->with('warning', ' Zaten Bilirimler Okundu');
        }
    }


    public function markOne(NotificationExistRequest $request)
    {

        $notification =     GrupNotification::where('notification_uuid', $request->notification)->first();
        $res = $this->markOneNotification($notification);

        if ($res) {

            return redirect()->back()->with('success', ' Bilirim Okundu İşaretlendi');
        } else {

            return redirect()->back()->with('warning', ' Zaten Bilirim Okunmuş');
        }
    }





    // function is_sender()  {

    // }



}
