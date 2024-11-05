<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PendingTasksEmail extends Mailable
{
    use SerializesModels;

    public $tasks;

    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    public function build()
    {
        return $this->subject('Your Pending Tasks for Today')
                    ->view('emails.pending_tasks'); // Use your Blade view here
    }
}
