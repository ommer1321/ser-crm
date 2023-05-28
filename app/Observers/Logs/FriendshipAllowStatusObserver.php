<?php

namespace App\Observers\Logs;

use App\Models\FriendshipAllowStatus;
use Illuminate\Support\Facades\Log;

class FriendshipAllowStatusObserver
{
    /**
     * Handle the FriendshipAllowStatus "created" event.
     */
    public function created(FriendshipAllowStatus $friendshipAllowStatus): void
    {
        Log::channel('friendship_allow_status')->info("(Created) id : $friendshipAllowStatus->id uuid : $friendshipAllowStatus->friendship_uuid  who send : $friendshipAllowStatus->who_send  who get : $friendshipAllowStatus->who_get  status : $friendshipAllowStatus->status");
    }

    /**
     * Handle the FriendshipAllowStatus "updated" event.
     */
    public function updated(FriendshipAllowStatus $friendshipAllowStatus): void
    {
        Log::channel('friendship_allow_status')->info("(Updated) id : $friendshipAllowStatus->id uuid : $friendshipAllowStatus->friendship_uuid  who send : $friendshipAllowStatus->who_send  who get : $friendshipAllowStatus->who_get status : $friendshipAllowStatus->status");
    }

    /**
     * Handle the FriendshipAllowStatus "deleted" event.
     */
    public function deleted(FriendshipAllowStatus $friendshipAllowStatus): void
    {
        // 
    }

    /**
     * Handle the FriendshipAllowStatus "restored" event.
     */
    public function restored(FriendshipAllowStatus $friendshipAllowStatus): void
    {
        //
    }

    /**
     * Handle the FriendshipAllowStatus "force deleted" event.
     */
    public function forceDeleted(FriendshipAllowStatus $friendshipAllowStatus): void
    {
        //
    }
}
