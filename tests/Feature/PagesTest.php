<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PagesTest extends TestCase
{
    public static function pages(): array
    {
        return [
            'home' => ['/', 'Empowering your business, one solution at a time'],
            'products' => ['/products', 'Products &amp; Materials'],
            'solutions' => ['/solutions', 'Superior solutions, end to end'],
            'about' => ['/about', 'At the forefront of manufacturing and trading'],
            'contact' => ['/contact', 'build a solution together'],
        ];
    }

    #[DataProvider('pages')]
    public function test_page_renders(string $uri, string $heading): void
    {
        $this->get($uri)
            ->assertOk()
            ->assertSee($heading, false)
            ->assertSee('Request a quote');
    }

    public function test_current_page_is_marked_in_navigation(): void
    {
        $this->get('/solutions')
            ->assertOk()
            ->assertSee('href="'.route('solutions').'" aria-current="page"', false)
            ->assertDontSee('href="'.route('home').'" aria-current="page"', false);
    }
}
