<x-mail::message>
# {{ __('contact.mail.auto_reply_greeting', ['name' => $contact->name]) }}

{{ __('contact.mail.auto_reply_body', ['site_name' => $siteName]) }}

{{ __('contact.mail.auto_reply_confirmation') }}

---

**{{ __('contact.mail.auto_reply_your_message') }}:**

{{ $contact->message }}

---

{{ __('contact.mail.auto_reply_meanwhile') }}

@if($phone)
**{{ __('contact.mail.auto_reply_phone') }}:** {{ $phone }}
@endif
@if($email)
**{{ __('contact.mail.auto_reply_email') }}:** {{ $email }}
@endif

{{ __('contact.mail.auto_reply_warm_regards') }},<br>
{{ __('contact.mail.auto_reply_team', ['site_name' => $siteName]) }}
</x-mail::message>
