<?php

declare(strict_types=1);

namespace App\Mail;

use App\Models\Contact;
use App\Models\SiteSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Contact $contact,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('contact.mail.subject', ['name' => $this->contact->name]),
            replyTo: [$this->contact->email],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact-notification',
            with: [
                'contact' => $this->contact,
                'siteName' => SiteSetting::get('site_name', 'Maylancer Films'),
            ],
        );
    }
}
