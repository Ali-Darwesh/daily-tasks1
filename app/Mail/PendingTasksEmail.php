<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class PendingTasksEmail extends Mailable
{
    protected $tasks;
    protected $userName;

    /**
     * Create a new message instance.
     */
    public function __construct($user_name,$tasks)
    {
        $this->userName=$user_name;
        $this->tasks=$tasks;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pending Tasks Mail For You',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.pending_tasks',
            with: ['name'=>$this->userName,'tasks'=>$this->tasks]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}