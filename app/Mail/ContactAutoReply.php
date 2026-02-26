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

class ContactAutoReply extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Contact $contact,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('contact.mail.auto_reply_subject', ['site_name' => SiteSetting::get('site_name', 'Maylancer Films')]),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact-auto-reply',
            with: [
                'contact' => $this->contact,
                'siteName' => SiteSetting::get('site_name', 'Maylancer Films'),
                'phone' => SiteSetting::get('phone', ''),
                'email' => SiteSetting::get('email', ''),
            ],
        );
    }
}
