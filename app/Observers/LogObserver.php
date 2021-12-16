<?php

namespace App\Observers;

use App\Models\Logs;
use App\Models\Task;
use App\Models\User;
use App\Mail\NewLogMailable;
use Illuminate\Support\Facades\Mail;
class LogObserver
{
    /**
     * Handle the Logs "created" event.
     *
     * @param  \App\Models\Logs  $logs
     * @return void
     */
    public function created(Logs $logs)
    {
        $task = Task::find($logs->task_id);
        $user = User::find($task->assigned_user);

        $email = new NewLogMailable;
        Mail::to($user->email)->send($email);
    }

    /**
     * Handle the Logs "updated" event.
     *
     * @param  \App\Models\Logs  $logs
     * @return void
     */
    public function updated(Logs $logs)
    {
        //
    }

    /**
     * Handle the Logs "deleted" event.
     *
     * @param  \App\Models\Logs  $logs
     * @return void
     */
    public function deleted(Logs $logs)
    {
        //
    }

    /**
     * Handle the Logs "restored" event.
     *
     * @param  \App\Models\Logs  $logs
     * @return void
     */
    public function restored(Logs $logs)
    {
        //
    }

    /**
     * Handle the Logs "force deleted" event.
     *
     * @param  \App\Models\Logs  $logs
     * @return void
     */
    public function forceDeleted(Logs $logs)
    {
        //
    }
}
