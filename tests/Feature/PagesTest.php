<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PagesTest extends TestCase
{
    public static function pages(): array
    {
        return [
            'home' => ['/', 'The right micron for your carton, at a price that fits your order.'],
            'catalog' => ['/packaging-products', 'Every tape and strap we make, with the spec stated up front'],
            'product' => ['/packaging-products/bopp-tan-carton-tape', 'BOPP Self-Adhesive Carton Tape'],
            'custom' => ['/custom-solutions', 'Custom brand printing, from one box'],
            'industries' => ['/industries', 'Different loads fail in different ways'],
            'sustainability' => ['/sustainability', 'Sustainability here is a manufacturing decision, not a label'],
            'about' => ['/about', 'Wherever there are boxes, there is Rashee'],
            'contact' => ['/contact', 'Tell us what you are sealing'],
        ];
    }

    #[DataProvider('pages')]
    public function test_page_renders(string $uri, string $heading): void
    {
        $this->get($uri)
            ->assertOk()
            ->assertSee($heading)
            ->assertSee('Request a Quote')
            ->assertSee('Tell us your spec. We will quote it honestly.')
            ->assertSee('cdn.jsdelivr.net/npm/bootstrap@5.3.3', false)
            ->assertSee('cdn.jsdelivr.net/npm/jquery@3.7.1', false);
    }

    public function test_current_section_is_marked_in_navigation(): void
    {
        $this->get('/about')
            ->assertSee('href="'.route('about').'" aria-current="page"', false);

        $this->get('/packaging-products/paper-masking-tape')
            ->assertOk()
            ->assertSee('href="'.route('products.index').'" class="rs-nav__toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-current="page"', false)
            ->assertDontSee('href="'.route('about').'" aria-current="page"', false);
    }

    public function test_every_catalog_line_has_a_product_page(): void
    {
        foreach (config('rashee.catalog') as $product) {
            $this->get(route('products.show', $product['slug']))
                ->assertOk()
                ->assertSee($product['name'])
                ->assertSee('Technical specification');
        }
    }

    public function test_unknown_product_is_404(): void
    {
        $this->get('/packaging-products/not-a-line')->assertNotFound();
    }

    public function test_catalog_lists_all_nine_lines(): void
    {
        $response = $this->get('/packaging-products')->assertOk();

        foreach (config('rashee.catalog') as $product) {
            $response->assertSee($product['card_name'] ?? $product['name']);
        }
        $response->assertSee('9 of 9 stock lines');
    }

    public function test_product_page_shows_stock_state_for_default_spec(): void
    {
        $this->get('/packaging-products/bopp-tan-carton-tape')
            ->assertSee('In stock — dispatches in 24 hours')
            ->assertSee('From ₹385 per box')
            ->assertSee('RS-BOP-4548-65-TA');

        $this->get('/packaging-products/customized-printed-logo-tape')
            ->assertSee('Available to order — made to your spec')
            ->assertSee('Printed to your artwork, so it is produced per order');
    }
}
