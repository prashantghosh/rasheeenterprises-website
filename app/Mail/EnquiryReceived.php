<?php

namespace App\Mail;

use App\Models\Enquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnquiryReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Enquiry $enquiry)
    {
    }

    public function envelope(): Envelope
    {
        $label = $this->enquiry->type === Enquiry::TYPE_QUOTE ? 'Quote request' : 'Contact enquiry';

        return new Envelope(
            subject: "{$label} from {$this->enquiry->fullName()}",
            replyTo: [new Address($this->enquiry->email, $this->enquiry->fullName())],
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'mail.enquiry-received',
        );
    }
}
