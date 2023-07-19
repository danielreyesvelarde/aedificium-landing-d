<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private array $contact;

    /**
     * Create a new message instance.
     */
    public function __construct(array $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        Log::info("Nombre: ".$this->contact['name']);
        Log::info("Correo: ".$this->contact['email']);
        Log::info("Message: ".$this->contact['message']);
        return $this->subject("Contactar a ". $this->contact['name'])
            ->view('emails.contact')->with([
                'contact' => $this->contact
            ]);
    }
}
