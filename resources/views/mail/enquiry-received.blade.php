New website enquiry {{ $enquiry->reference() }}.

Name: {{ $enquiry->name ?: '—' }}
Email: {{ $enquiry->email }}
Mobile / WhatsApp: {{ $enquiry->phone ?: '—' }}
Company: {{ $enquiry->company ?: '—' }}
@if ($enquiry->product)
Product: {{ $enquiry->product }}
@endif
@if ($enquiry->spec)
Spec: {{ $enquiry->spec }}
@endif
@if ($enquiry->quantity)
Estimated quantity: {{ $enquiry->quantity }}
@endif
@if ($enquiry->box_weight)
Typical box weight: {{ $enquiry->box_weight }}
@endif
@if ($enquiry->message)

Notes:
{{ $enquiry->message }}
@endif

Sent from {{ $enquiry->source ?: 'the website' }} on {{ $enquiry->created_at->toDayDateTimeString() }}.
