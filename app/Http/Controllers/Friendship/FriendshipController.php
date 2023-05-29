<?php

namespace App\Http\Controllers\Friendship;

use App\Http\Controllers\Controller;
use App\Http\Requests\FriendshipAddFormRequest;
use App\Http\Requests\FriendshipIsOkeyFormRequest;
use App\Http\Requests\FriendshipSearchFormRequest;
use App\Models\FriendshipAllowStatus;
use App\Models\User;
use App\Traits\Friendship;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Log;

class FriendshipController extends Controller
{

    use Friendship;


    public function index(FriendshipSearchFormRequest $request)
    {

        if ($validatedData = $request->validated()) {

            $users =   $this->searchedUsers($validatedData);
        } else {

            $users =  $this->allUserList();
        }

        return view('friendship.index', compact('users'));
    }


    public function myFriends()
    {
        $myFriendships = $this->myFriendships();

        return view('friendship.my-friends', compact('myFriendships'));
    }


    public function add(FriendshipAddFormRequest $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $validatedData  = $request->validated();

        if ($user) {

            $validatedFriend = User::where('user_id', $validatedData)->first();
            if ($validatedFriend) {

                $resFriend = $this->isFriend($validatedFriend->id, $user->id);
            }

            if ($resFriend) {

                $isfriendAllowActive =  $this->isFriendshipAllowActive($validatedFriend);


                if (!$isfriendAllowActive) {

                    $storedToFriendship = $this->storeFriendship($validatedFriend, $user);

                    if ($storedToFriendship) {

                        return redirect()->back()->with('success', 'Artık Arkadaşsınız :)');
                    } else {

                        // Log::channel('friendship_allow_status')->Notice("(Not Created)  who send user id : " . auth()->user()->id . " who get user id : $validatedFriend->id");
                        return redirect()->back()->with('failed', 'Opps! Bir Aksilik Çıktı..');
                    }
                } else {

                    return    $this->storeFriendshipAllow($validatedFriend);
                }
            } else {

                // Log::channel('friendship_allow_status')->info("(Already Friend)  who send user id : " . auth()->user()->id . " who get user id : $validatedFriend->id");
                return redirect()->back()->with('failed', 'Bu Kullanıcı İle Zaten Arkadaşsınız');
            }
        }
    }

    public function delete($user_name)
    {
        return $this->deleteFriendship($user_name);
    }


    public function requestBox()
    {
        $friendship_allowes = $this->checkMyAllows();

        $allRequestes =  $this->allRequestHistory();


        $users =  $this->listMyAllows($friendship_allowes);
        return view('friendship.request-box', compact('users', 'allRequestes'));
    }



    public function requestBoxCheck(FriendshipIsOkeyFormRequest $request)
    {
        $validatedData =  $request->validated();

        return $this->checkIsOkeyOrNo($validatedData);

        return view('friendship.request-box');
    }
}
