<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class Credential extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $cpf;
    public string $password;

    /**
     * Create a new message instance.
     */
    public function __construct(string $name, string $cpf, string $password)
    {
        $this->name = $name;
        $this->cpf = $cpf;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Credenciais',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.credential',
        )->with([
            'name' => $this->name,
            'cpf' => $this->cpf,
            'password' => $this->password
        ]);
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
