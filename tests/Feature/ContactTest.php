<?php

namespace Tests\Feature;

use App\Mail\EnquiryReceived;
use App\Models\Enquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_stores_enquiry_and_shows_confirmation(): void
    {
        Mail::fake();
        config(['rashee.notify_email' => 'sales@example.com']);

        $this->post('/contact', [
            'first_name' => 'Jordan',
            'last_name' => 'Rivera',
            'email' => 'jordan@acme.test',
            'interest' => 'Bulk order',
            'company' => 'Acme Industrial',
        ])->assertRedirect('/contact');

        $this->get('/contact')->assertSee('Message sent');

        $this->assertDatabaseHas('enquiries', [
            'type' => Enquiry::TYPE_CONTACT,
            'email' => 'jordan@acme.test',
            'interest' => 'Bulk order',
        ]);

        Mail::assertSent(EnquiryReceived::class);
    }

    public function test_no_mail_is_sent_without_a_notify_address(): void
    {
        Mail::fake();
        config(['rashee.notify_email' => null]);

        $this->post('/contact', ['first_name' => 'Jordan', 'email' => 'jordan@acme.test'])
            ->assertRedirect('/contact');

        Mail::assertNothingSent();
        $this->assertDatabaseCount('enquiries', 1);
    }

    public function test_contact_form_is_validated(): void
    {
        $this->from('/contact')->post('/contact', ['email' => 'nope', 'interest' => 'Hacking'])
            ->assertRedirect('/contact')
            ->assertSessionHasErrors(['first_name', 'email', 'interest']);

        $this->assertDatabaseCount('enquiries', 0);
    }

    public function test_validation_errors_are_rendered(): void
    {
        $this->from('/contact')->post('/contact', []);

        $this->get('/contact')->assertSee('The first name field is required.');
    }
}
