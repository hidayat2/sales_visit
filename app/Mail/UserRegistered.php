<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;
    public $qrCode;
    public $path;
    /**
     * Create a new message instance.
     */
    public function __construct($participant, $qrCode = null, $path = null)
    {
        $this->participant = $participant;
        $this->qrCode = $qrCode;
        $this->path = $path;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address("noreply@meetap.com", "User Email"),
            subject: 'User Registered',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.user_registered',
            //view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if ($this->path == null) {
            return [];
        } else {
            return [
                  Attachment::fromPath($this->path),
            ];
        }
    }
}
