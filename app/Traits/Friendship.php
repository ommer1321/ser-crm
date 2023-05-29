<?php

namespace App\Traits;

use App\Models\Friendship as ModelFriendship;
use App\Models\FriendshipAllowStatus;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

trait Friendship
{
    public function allUserList()
    {
        $users = User::all();
        $myFriendships =  $this->myFriendships();

        if ($users) {


            foreach ($users as $key => $user) {

                foreach ($myFriendships as $myFriend) {

                    if ($user->id == $myFriend->id) {

                        unset($users[$key]);
                    }
                }

                // will delete auth id from users array
                if ($user->id == auth()->user()->id) {
                    unset($users[$key]);
                }
            }
        } else {

            return false;
        }

        return $users;
    }

    public function searchedUsers($validatedData)
    {


        $users =    User::where('user_name', 'LIKE', '%' . $validatedData['search'] . '%')
            ->orWhere('name', 'LIKE', '%' . $validatedData['search'] . '%')
            ->orWhere('surname', 'LIKE', '%' . $validatedData['search'] . '%')
            ->get();


        foreach ($users as $key => $user) {

            if ($user->id == auth()->user()->id) {
                unset($users[$key]);
            }
        }
        return $users;
    }

    public function myFriendshipsWithTaggedUsers($task)
    {
        $myFriends = $this->myFriendships();
        $tagged_users_uuıd = json_decode($task->tagged_users);

        if ($tagged_users_uuıd) {
            foreach ($myFriends as $friend) {
                $friend->is_task_taged = false;

                foreach ($tagged_users_uuıd as $tagged_user_uuıd) {

                    if ($friend->user_id == $tagged_user_uuıd) {
                        $friend->is_task_taged = true;
                    }
                }
            }

            return $myFriends;
        
        } else {

            return $myFriends;
        }
        
    }

    public function myFriendships()
    {
        $myFriendships = ModelFriendship::where('first_user_id', auth()->user()->id)->orWhere('second_user_id', auth()->user()->id)->get();
        $FriendList = [];
        foreach ($myFriendships as $myFriend) {

            if ($myFriend->first_user_id != auth()->user()->id) {
                $FriendList[] = User::where('id', $myFriend->first_user_id)->first();
            }

            if ($myFriend->second_user_id != auth()->user()->id) {
                $FriendList[] = User::where('id', $myFriend->second_user_id)->first();
            }
        }
        return $FriendList;
    }


    public function myFriendshipsWithoutGrupMembers($grup_members)
    {
        $myFriendships = ModelFriendship::where('first_user_id', auth()->user()->id)->orWhere('second_user_id', auth()->user()->id)->get();
        $friendship_list = [];
        $data = [];
        foreach ($myFriendships as $myFriend) {

            if ($myFriend->first_user_id != auth()->user()->id) {
                $friendship_list[] = $myFriend->first_user_id;
            }

            if ($myFriend->second_user_id != auth()->user()->id) {
                $friendship_list[] = $myFriend->second_user_id;
            }
        }

        foreach ($grup_members as $member) {

            foreach ($friendship_list as $key => $friendship) {

                if ($friendship == $member->user_id) {
                    unset($friendship_list[$key]);
                }
            }
        }
        foreach ($friendship_list as $item) {

            $data[] = User::where('id', $item)->first();
        }

        return $data;
    }

    public function isFriend($validatedUserId, $userId)
    {

        $friendships =  ModelFriendship::all();

        foreach ($friendships as $friendship) {

            if (
                $friendship->first_user_id == $validatedUserId && $friendship->second_user_id == $userId ||
                $friendship->first_user_id == $userId && $friendship->second_user_id ==  $validatedUserId
            ) {
                return false;
            }
        }
        return true;
    }

    public function storeFriendship($validatedFriend, $user)
    {
        $friendship = new ModelFriendship();

        $friendship->friendship_uuid  = Str::uuid();
        $friendship->first_user_id = $validatedFriend->id;
        $friendship->second_user_id =  $user->id;

        $res = $friendship->save();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteFriendship($user_name)
    {
        $user =  User::where('user_name', $user_name)->first();

        if ($user) {
            $friendship = ModelFriendship::where('first_user_id', $user->id)->where('second_user_id', auth()->user()->id)->orWhere('second_user_id', $user->id)->where('first_user_id', auth()->user()->id)->first();
            if ($friendship->delete()) {

                return  redirect()->back()->with('warning', $user_name . ' Adlı Kullanıcı Listenizden Çıkarıldı');
            } else {
                return  redirect()->back()->with('failed', 'Opss.. ' . $user_name . ' Adlı Kullanıcı Listenizden Çıkarılırken Bir Sorun Oluştu');
            }
        } else {
            return redirect()->back()->with('failed', $user_name . ' Adlı Kullanıcı Listenizden Çıkarılamadı');
        }
    }




    // Friendship Allow Functions 



    public function isFriendshipAllowActive($uservalidatedData)
    {
        if ($uservalidatedData->friend_allow == 1) {
            return 1;
        } else {
            return 0;
        }
    }



    public function storeFriendshipAllow($uservalidatedData)
    {
        # gönderirken kontrol kodu 
        $checkRequest = $this->isFriendshipAllowAlreadySended($uservalidatedData);

        if (!$checkRequest) {

            $friendshipAllowModel = new FriendshipAllowStatus();
            $friendshipAllowModel->who_send = auth()->user()->id;
            $friendshipAllowModel->who_get = $uservalidatedData->id;
            $friendshipAllowModel->status = 'pending';

            if ($friendshipAllowModel->save()) {

                return redirect()->back()->with('success', 'İstek Gönderildi');
            } else {

                return redirect()->back()->with('failed', 'Opps. Bir Sorun Oluştu İstek Başarısız');
            }
        } elseif ($checkRequest == 'you_already_sended') {
            // Log::channel('friendship_allow_status')->Notice("(Not Created)  who send user id : ".auth()->user()->id." who get user id : $uservalidatedData->id");
            return redirect()->back()->with('failed', 'Zaten Bu Kullanıcıya İstek Gönderildi');
        } elseif ($checkRequest == 'other_user_sended_you') {

            return redirect()->back()->with('warning', 'Zaten Bekleyen Bir İsteğiniz Bulunmaktadır');
        }
    }

    public function isFriendshipAllowAlreadySended($uservalidatedData)
    {
        $checkStatus = FriendshipAllowStatus::where('status', 'pending')
            ->where('who_send', auth()->user()->id)
            ->where('who_get', $uservalidatedData->id)
            ->exists();

        $checkStatusForOther = FriendshipAllowStatus::where('status', 'pending')
            ->where('who_send', $uservalidatedData->id)
            ->where('who_get', auth()->user()->id)
            ->exists();


        if ($checkStatus) {

            return 'you_already_sended';
        } elseif ($checkStatusForOther) {


            return 'other_user_sended_you';
        }

        return false;
    }


    public function checkMyAllows()
    {
        // return auth()->user()->id;
        return $listFriendshipAllowStatus =  FriendshipAllowStatus::where('who_get', auth()->user()->id)->where('status', 'pending')->where('is_deleted', '0')->get();
    }



    public function listMyAllows($checkedMyAllows)
    {

        $checkedMyAllowsArray = [];

        if ($checkedMyAllows) {
            foreach ($checkedMyAllows as $checkedMyAllow) {

                $checkedMyAllowsArray[] = User::where('id', $checkedMyAllow->who_send)->first();
            }
        }


        return $checkedMyAllowsArray;
    }



    public function allRequestHistory()
    {
        return $allRequestes =   FriendshipAllowStatus::where('who_get', auth()->user()->id)
            ->whereNot('status', 'pending')
            ->where('is_deleted', '1')
            ->with('takenRequestHistory')
            ->orderBy('updated_at', 'desc')
            ->get();
    }





    public function checkIsOkeyOrNo($FriendshipIsOkeyOrNo)
    {

        $user = User::where('user_name', $FriendshipIsOkeyOrNo['user'])->first();
        $allowStatus = FriendshipAllowStatus::where('who_send', $user->id)->where('who_get', auth()->user()->id)->where('status', 'pending')->where('is_deleted', '0')->first();



        //  if($user && $allowStatus){   }

        if ($FriendshipIsOkeyOrNo['friend_status'] == 'ok') {


            $isFriend = $this->isFriend($user->id, auth()->user()->id);

            if ($isFriend) {

                $allowStatus->status = 'approved';
                $allowStatus->is_deleted  = '1';
                $allowStatus->save();
                $this->storeFriendshipFromAllowed($user);
                return redirect()->back()->with('success', 'Artık Arkadaşsınız :)');
            } else {

                return redirect()->back()->with('failed', 'Bu Kullanıcı İle Zaten Arkadaşsınız');
            }
        }

        if ($FriendshipIsOkeyOrNo['friend_status'] == 'no') {

            $allowStatus->status = 'rejected';
            $allowStatus->is_deleted  = '1';
            $allowStatus->save();
            return redirect()->back()->with('warning', 'Bu Kullanıcının İsteğini Reddettiniz ');
        }
    }




    public function storeFriendshipFromAllowed($user)
    {
        $friendship = new ModelFriendship();
        $friendship->friendship_uuid  = Str::uuid();
        $friendship->first_user_id = $user->id;
        $friendship->second_user_id =  auth()->user()->id;

        $res = $friendship->save();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}
