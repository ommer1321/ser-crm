<?php

namespace App\Observers\Logs;

use App\Models\Grup\Member;
use Illuminate\Support\Facades\Log;

class MemberObserver
{
    /**
     * Handle the Member "created" event.
     */
    public function created(Member $member): void
    {
        Log::channel('member')->info("(Created) id : $member->id uuid : $member->member_uuid  user : $member->user_id  grup : $member->grup_id ");
    }

    /**
     * Handle the Member "updated" event.
     */
    public function updated(Member $member): void
    {
        //
    }

    /**
     * Handle the Member "deleted" event.
     */
    public function deleted(Member $member): void
    {
        Log::channel('member')->info("(Deleted) id : $member->id uuid : $member->member_uuid  user : $member->user_id  grup : $member->grup_id ");
    }

    /**
     * Handle the Member "restored" event.
     */
    public function restored(Member $member): void
    {
        //
    }

    /**
     * Handle the Member "force deleted" event.
     */
    public function forceDeleted(Member $member): void
    {
        //
    }
}
