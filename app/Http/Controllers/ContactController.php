<?php

namespace App\Http\Controllers;

use App\Mail\EnquiryReceived;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('pages.contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'interest' => ['nullable', Rule::in(config('rashee.interests'))],
            'company' => ['nullable', 'string', 'max:150'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        $enquiry = Enquiry::create([...$data, 'type' => Enquiry::TYPE_CONTACT]);

        if ($to = config('rashee.notify_email')) {
            Mail::to($to)->send(new EnquiryReceived($enquiry));
        }

        return redirect()->route('contact')->with('sent', true);
    }
}
