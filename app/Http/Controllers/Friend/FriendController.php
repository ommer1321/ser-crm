<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FriendController extends Controller
{

    public function friend()
    {

        
        return view('friend.index');
    }


    public function edit()
    {
        return view('friend.edit');
    }

}
