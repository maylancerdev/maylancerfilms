<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mail\ContactAutoReply;
use App\Mail\ContactNotification;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        $faqs = Faq::query()
            ->active()
            ->ordered()
            ->get();

        return view('contact.show', compact('faqs'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Honeypot check — bots fill hidden fields
        if ($request->filled('website')) {
            return back()->with('success', true);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $contact = Contact::create($validated);

        // Send notification to admin
        $adminEmail = SiteSetting::get('email', config('mail.from.address'));
        Mail::to($adminEmail)->send(new ContactNotification($contact));

        // Send auto-reply to user
        Mail::to($contact->email)->send(new ContactAutoReply($contact));

        return back()->with('success', true);
    }
}
