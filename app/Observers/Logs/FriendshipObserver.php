<?php

namespace App\Observers\Logs;

use App\Models\Friendship;
use Illuminate\Support\Facades\Log;


class FriendshipObserver
{
    /**
     * Handle the Friendship "created" event.
     */
    public function created(Friendship $friendship): void
    {


        Log::channel('friendship')->info("(Created) id : $friendship->id uuid : $friendship->friendship_uuid  first user : $friendship->first_user_id  second user : $friendship->second_user_id who create : ".auth()->user()->id."");
    }

    /**
     * Handle the Friendship "updated" event.
     */
    public function updated(Friendship $friendship): void
    {
        //
    }

    /**
     * Handle the Friendship "deleted" event.
     */
    public function deleted(Friendship $friendship): void
    {
        Log::channel('friendship')->info("(Deleted) id : $friendship->id uuid : $friendship->friendship_uuid  first user : $friendship->first_user_id  second user : $friendship->second_user_id who delete : ".auth()->user()->id."");
    }

    /**
     * Handle the Friendship "restored" event.
     */
    public function restored(Friendship $friendship): void
    {
        //
    }

    /**
     * Handle the Friendship "force deleted" event.
     */
    public function forceDeleted(Friendship $friendship): void
    {
        //
    }
}
