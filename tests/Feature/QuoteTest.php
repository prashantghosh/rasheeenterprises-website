<?php

namespace Tests\Feature;

use App\Mail\EnquiryReceived;
use App\Models\Enquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class QuoteTest extends TestCase
{
    use RefreshDatabase;

    public function test_adding_a_product_updates_the_quote(): void
    {
        $this->from('/products')
            ->post('/quote/items/hex-bolts-m8')
            ->assertRedirect('/products')
            ->assertSessionHas('toast.title', 'Added to quote');

        $this->get('/products')->assertSee('My quote (1)');
    }

    public function test_adding_an_unknown_product_404s(): void
    {
        $this->post('/quote/items/not-a-product')->assertNotFound();
    }

    public function test_removing_a_product(): void
    {
        $this->post('/quote/items/hex-bolts-m8');
        $this->from('/products')->delete('/quote/items/hex-bolts-m8')->assertRedirect('/products');

        $this->get('/products')->assertSee('My quote (0)');
    }

    public function test_submitting_a_quote_stores_it_notifies_sales_and_clears_the_basket(): void
    {
        Mail::fake();
        config(['rashee.notify_email' => 'sales@example.com']);

        $this->post('/quote/items/hex-bolts-m8');
        $this->post('/quote/items/copper-wire-2-5mm');

        $this->from('/products')->post('/quote', [
            'first_name' => 'Jordan',
            'email' => 'jordan@acme.test',
            'company' => 'Acme Industrial',
        ])->assertRedirect('/products')->assertSessionHas('toast.title', 'Quote sent');

        $enquiry = Enquiry::sole();
        $this->assertSame(Enquiry::TYPE_QUOTE, $enquiry->type);
        $this->assertSame(['Hex Bolts M8', 'Copper Wire 2.5mm'], $enquiry->items);

        Mail::assertSent(EnquiryReceived::class, fn ($mail) => $mail->hasTo('sales@example.com'));

        $this->get('/products')->assertSee('My quote (0)');
    }

    public function test_quote_submission_is_validated(): void
    {
        $this->post('/quote/items/hex-bolts-m8');

        $this->from('/products')->post('/quote', ['email' => 'not-an-email'])
            ->assertRedirect('/products')
            ->assertSessionHasErrors(['first_name', 'email'], null, 'quote');

        $this->assertDatabaseCount('enquiries', 0);
    }

    public function test_empty_quote_cannot_be_submitted(): void
    {
        $this->from('/products')->post('/quote', ['first_name' => 'Jordan', 'email' => 'j@acme.test'])
            ->assertRedirect('/products');

        $this->assertDatabaseCount('enquiries', 0);
    }
}
