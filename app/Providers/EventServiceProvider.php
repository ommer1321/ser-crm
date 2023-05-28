<?php

namespace App\Providers;

use App\Models\Friendship;
use App\Models\FriendshipAllowStatus;
use App\Models\Grup\Grup;
use App\Models\Grup\Member;
use App\Models\Teacher\Task;
use App\Models\User;
use App\Observers\Logs\FriendshipAllowStatusObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Observers\Logs\FriendshipObserver;
use App\Observers\Logs\GrupObserver;
use App\Observers\Logs\MemberObserver;
use App\Observers\Logs\TaskObserver;
use App\Observers\Logs\UserObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        // Log Observers
        Friendship::observe(FriendshipObserver::class);
        FriendshipAllowStatus::observe(FriendshipAllowStatusObserver::class);
        User::observe(UserObserver::class);
        Grup::observe(GrupObserver::class);
        Member::observe(MemberObserver::class);
        Task::observe(TaskObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
