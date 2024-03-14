<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookIssued extends Mailable
{
    use Queueable, SerializesModels;

    public $card;
    public $book;
    public $cardId;
    public $isReturned;
    public $issuedDate;
    public $returnDate;
    
    

    /**
     * Create a new message instance.
     */
    public function __construct($card, $book, $cardId, $isReturned,$issuedDate, $returnDate)
    {
        $this->card = $card;
        $this->book = $book;
        $this->cardId = $cardId;
        $this->isReturned = $isReturned;
        $this->issuedDate = $issuedDate;
        $this->returnDate= $returnDate;
    }

   
    public function build()
{
    return $this->subject('Welcome to Your App')->view('mail.issued-book');
}


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Book Issued',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.issued-book',
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
