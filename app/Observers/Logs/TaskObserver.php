<?php

namespace App\Observers\Logs;

use App\Models\Teacher\Task;
use Illuminate\Support\Facades\Log;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        Log::channel('task')->info("(Created) id : $task->id uuid : $task->task_id  ");
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
      

        $changes = $task->getChanges(); // Değişen alanları alır
        $oldData = [];

        foreach ($changes as $key => $value) {
            $oldData[$key] = $task->getOriginal($key);
        }
        unset($changes['updated_at']);
        unset($oldData['updated_at']);

        // Sadece değişen verilerin eski hallerini kullanarak loglama işlemi yapabilirsiniz
        Log::channel('task')->info("(Updated)  id : $task->id  uuid : $task->task_id " . json_encode([
            'Changes' => $changes,
            'Old' => $oldData,
        ]));
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        Log::channel('task')->info("(Deleted) id : $task->id uuid : $task->task_id");
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
