<x-mail::message>
# {{ __('contact.mail.heading') }}

{{ __('contact.mail.intro') }}

**{{ __('contact.mail.from_label') }}:** {{ $contact->name }}

**{{ __('contact.mail.email_label') }}:** {{ $contact->email }}

**{{ __('contact.mail.message_label') }}:**

{{ $contact->message }}

<x-mail::button :url="url('/admin/contacts')">
{{ __('contact.mail.view_in_admin') }}
</x-mail::button>

{{ __('contact.mail.regards') }},<br>
{{ $siteName }}
</x-mail::message>
