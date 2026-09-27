<?php

namespace App\Http\Controllers;

use App\Mail\EnquiryReceived;
use App\Models\Enquiry;
use App\Support\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function add(Request $request, Quote $quote, string $slug): RedirectResponse
    {
        $product = Quote::findProduct($slug) ?? abort(404);

        $quote->add($slug);

        return back()->with('toast', [
            'title' => 'Added to quote',
            'message' => "{$product['name']} added to your request.",
        ]);
    }

    public function remove(Quote $quote, string $slug): RedirectResponse
    {
        $quote->remove($slug);

        return back()->with('open_quote', true);
    }

    public function submit(Request $request, Quote $quote): RedirectResponse
    {
        if ($quote->count() === 0) {
            return back()->with('open_quote', true);
        }

        $data = $request->validateWithBag('quote', [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'company' => ['nullable', 'string', 'max:150'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        $enquiry = Enquiry::create([
            ...$data,
            'type' => Enquiry::TYPE_QUOTE,
            'items' => $quote->products()->pluck('name')->all(),
        ]);

        if ($to = config('rashee.notify_email')) {
            Mail::to($to)->send(new EnquiryReceived($enquiry));
        }

        $quote->clear();

        return back()->with('toast', [
            'title' => 'Quote sent',
            'message' => "We'll respond within one business day.",
        ]);
    }
}
