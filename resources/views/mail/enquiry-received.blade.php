New {{ $enquiry->type === \App\Models\Enquiry::TYPE_QUOTE ? 'quote request' : 'contact enquiry' }} from the website.

Name: {{ $enquiry->fullName() }}
Email: {{ $enquiry->email }}
Company: {{ $enquiry->company ?: '—' }}
@if ($enquiry->interest)
Interest: {{ $enquiry->interest }}
@endif
@if ($enquiry->items)

Requested items:
@foreach ($enquiry->items as $item)
- {{ $item }}
@endforeach
@endif
@if ($enquiry->message)

Message:
{{ $enquiry->message }}
@endif

Received {{ $enquiry->created_at->toDayDateTimeString() }}
