<?php

namespace App\Observers\Logs;

use App\Models\Grup\Grup;
use Illuminate\Support\Facades\Log;

class GrupObserver
{
    /**
     * Handle the Grup "created" event.
     */
    public function created(Grup $grup): void
    {
        Log::channel('grup')->info("(Created) id : $grup->id uuid : $grup->grup_id");
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(Grup $grup): void
    {

        // $oldData = $grup->getOriginal(); // Eski veri
        // $newData = $grup->getAttributes(); // Yeni veri

        $changes = $grup->getChanges(); // Değişen alanları alır
        $oldData = [];

        foreach ($changes as $key => $value) {
            $oldData[$key] = $grup->getOriginal($key);
        }
        unset($changes['updated_at']);
        unset($oldData['updated_at']);

        // Sadece değişen verilerin eski hallerini kullanarak loglama işlemi yapabilirsiniz
        Log::channel('grup')->info("(Updated)  id : $grup->id  uuid : $grup->grup_id " . json_encode([
            'Changes' => $changes,
            'Old' => $oldData,
        ]));
    }

    /**
     * Handle the Grup "deleted" event.
     */
    public function deleted(Grup $grup): void
    {
        //
    }

    /**
     * Handle the Grup "restored" event.
     */
    public function restored(Grup $grup): void
    {
        //
    }

    /**
     * Handle the Grup "force deleted" event.
     */
    public function forceDeleted(Grup $grup): void
    {
        //
    }
}
