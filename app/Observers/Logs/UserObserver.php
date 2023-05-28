<?php

namespace App\Observers\Logs;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        Log::channel('user')->info("(Created) id : $user->id uuid : $user->user_id user name : $user->user_name ");
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {

        $changes = $user->getChanges(); // Değişen alanları alır
        $oldData = $user->getOriginal(); // Eski veri
        $newData = $user->getAttributes(); // Yeni veri

        // Eski ve yeni verileri kullanarak loglama işlemi yapabilirsiniz
        Log::channel('user')->info('Model updated: ' . json_encode([
            'changes' => $changes,
            'old' => $oldData,
            'new' => $newData,
        ]));

        // Log::channel('user')->info("(Updated) id : $user->id uuid : $user->user_id user name : $user->user_name ");
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //Buraya Kullanıcı Silme Özelliği gelince eklenecek
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
