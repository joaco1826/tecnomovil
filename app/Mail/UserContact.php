<?php

namespace App\Mail;

use App\Models\InfoContact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(InfoContact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mensaje de ' . $this->contact->type)
            ->view('mail.contact', ['contact' => $this->contact])
            ->text('mail.contact_text', ['contact' => $this->contact]);
    }
}