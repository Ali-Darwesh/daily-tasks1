<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Mail;
use App\Mail\PendingTasksEmail; // Assuming you have created a Mailable for this

class SendDailyPendingTasksEmail extends Command
{
    protected $signature = 'tasks:send-daily-emails';
    protected $description = 'Send daily email with pending tasks to each user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get all users
        $users = User::all();

        foreach ($users as $user) {
            // Get the user's pending tasks for today
            $pendingTasks = Task::where('assigned_to', $user->id)
                                ->where('status', 'pending') // Tasks due today
                                ->get();

            if ($pendingTasks->isNotEmpty()) {
                // Send email to the user if they have pending tasks
                Mail::to($user->email)->send(new PendingTasksEmail($user->name,$user->tasks));
            } 
        
        
    }}
}
