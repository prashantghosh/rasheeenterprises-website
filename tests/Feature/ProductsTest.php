<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductsTest extends TestCase
{
    public function test_lists_the_full_catalog_by_default(): void
    {
        $this->get('/products')
            ->assertOk()
            ->assertSee('9 products')
            ->assertSee('Hex Bolts M8')
            ->assertSee('Copper Wire 2.5mm');
    }

    public function test_filters_by_category(): void
    {
        $this->get('/products?category[]=Packaging')
            ->assertOk()
            ->assertSee('2 products')
            ->assertSee('Corrugated Box L')
            ->assertDontSee('Hex Bolts M8');
    }

    public function test_ignores_unknown_categories(): void
    {
        $this->get('/products?category[]=Nope')
            ->assertOk()
            ->assertSee('9 products');
    }

    public function test_searches_by_name(): void
    {
        $this->get('/products?q=wire')
            ->assertOk()
            ->assertSee('1 product')
            ->assertSee('Copper Wire 2.5mm');
    }

    public function test_sorts_by_price(): void
    {
        $this->get('/products?sort=price')
            ->assertOk()
            ->assertSeeInOrder(['Nylon Washers', 'Hex Bolts M8', 'Corrugated Box L', 'Copper Wire 2.5mm']);
    }

    public function test_sorts_by_name(): void
    {
        $this->get('/products?sort=name')
            ->assertOk()
            ->assertSeeInOrder(['Aluminium Sheet', 'CNC Bracket A2', 'Copper Wire 2.5mm', 'Stainless Rods']);
    }
}
