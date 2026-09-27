<?php

namespace App\Http\Controllers;

use App\Mail\EnquiryReceived;
use App\Models\Enquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    public function contact(): View
    {
        return view('pages.contact');
    }

    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $type = $request->input('type') === Enquiry::TYPE_CONTACT ? Enquiry::TYPE_CONTACT : Enquiry::TYPE_SPEC;

        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'company' => ['nullable', 'string', 'max:150'],
            'quantity' => [Rule::requiredIf($type === Enquiry::TYPE_SPEC), 'nullable', 'string', 'max:120'],
            'box_weight' => ['nullable', 'string', 'max:60'],
            'product' => ['nullable', 'string', 'max:150'],
            'spec' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:3000'],
            'source' => ['nullable', 'string', 'max:255'],
        ], [
            'quantity.required' => 'Add an estimated quantity so we can price the right slab.',
            'email.email' => 'This email looks incomplete.',
        ]);

        $enquiry = Enquiry::create([...$data, 'type' => $type]);

        if ($to = config('rashee.notify_email')) {
            Mail::to($to)->send(new EnquiryReceived($enquiry));
        }

        if ($request->expectsJson()) {
            return response()->json([
                'reference' => $enquiry->reference(),
                'summary' => collect([$enquiry->product, $enquiry->spec, $enquiry->quantity])->filter()->implode(' · '),
            ], 201);
        }

        return back()->with('enquiry_sent', $enquiry->reference());
    }
}
