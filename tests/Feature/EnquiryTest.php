<?php

namespace Tests\Feature;

use App\Mail\EnquiryReceived;
use App\Models\Enquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EnquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_spec_enquiry_is_stored_and_returns_a_reference(): void
    {
        Mail::fake();
        config(['rashee.notify_email' => 'sales@example.com']);

        $this->postJson('/enquiries', [
            'type' => 'spec',
            'product' => 'BOPP Self-Adhesive Carton Tape',
            'spec' => 'BOPP 45µ · 48mm · 65m · Tan · Pack of 6',
            'quantity' => '40 boxes',
            'box_weight' => '12 kg',
            'email' => 'n.iyer@vitalpharma.in',
            'phone' => '+91 98200 41125',
        ])
            ->assertCreated()
            ->assertJsonPath('reference', 'RQ-0001')
            ->assertJsonPath('summary', 'BOPP Self-Adhesive Carton Tape · BOPP 45µ · 48mm · 65m · Tan · Pack of 6 · 40 boxes');

        $this->assertDatabaseHas('enquiries', ['type' => Enquiry::TYPE_SPEC, 'quantity' => '40 boxes', 'box_weight' => '12 kg']);
        Mail::assertSent(EnquiryReceived::class, fn ($m) => $m->hasTo('sales@example.com'));
    }

    public function test_spec_enquiry_requires_quantity_and_a_valid_email(): void
    {
        $this->postJson('/enquiries', ['type' => 'spec', 'email' => 'procurement@'])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'quantity' => 'Add an estimated quantity so we can price the right slab.',
                'email' => 'This email looks incomplete.',
            ]);

        $this->assertDatabaseCount('enquiries', 0);
    }

    public function test_contact_enquiry_only_needs_an_email(): void
    {
        Mail::fake();
        config(['rashee.notify_email' => null]);

        $this->postJson('/enquiries', ['type' => 'contact', 'email' => 'buyer@example.com', 'product' => 'Samples'])
            ->assertCreated();

        $this->assertDatabaseHas('enquiries', ['type' => Enquiry::TYPE_CONTACT, 'product' => 'Samples']);
        Mail::assertNothingSent();
    }

    public function test_contact_form_works_without_javascript(): void
    {
        $this->from('/contact')
            ->post('/enquiries', ['type' => 'contact', 'email' => 'buyer@example.com'])
            ->assertRedirect('/contact')
            ->assertSessionHas('enquiry_sent', 'RQ-0001');

        $this->get('/contact')->assertSee('data-state="success"', false)->assertSee('RQ-0001');
    }

    public function test_contact_form_shows_validation_errors_without_javascript(): void
    {
        $this->from('/contact')->post('/enquiries', ['type' => 'contact', 'email' => 'nope']);

        $this->get('/contact')->assertSee('This email looks incomplete.');
    }
}
