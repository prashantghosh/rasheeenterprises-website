<?php

namespace App\Http\Controllers;

use App\Support\Quote;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public const SORTS = ['popularity' => 'Popularity', 'price' => 'Price', 'name' => 'Name'];

    public function index(Request $request, Quote $quote): View
    {
        $categories = config('rashee.categories');

        $active = array_values(array_intersect($categories, (array) $request->query('category', [])));
        $search = trim((string) $request->query('q', ''));
        $sort = array_key_exists($request->query('sort'), self::SORTS) ? $request->query('sort') : 'popularity';

        $products = collect(config('rashee.catalog'))
            ->when($active, fn ($c) => $c->whereIn('category', $active))
            ->when($search !== '', fn ($c) => $c->filter(
                fn ($p) => str_contains(mb_strtolower($p['name']), mb_strtolower($search))
            ))
            ->pipe(fn ($c) => match ($sort) {
                'price' => $c->sortBy('price'),
                'name' => $c->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE),
                default => $c->sortByDesc('popularity'),
            })
            ->values();

        return view('pages.products', [
            'products' => $products,
            'categories' => $categories,
            'active' => $active,
            'search' => $search,
            'sort' => $sort,
            'sorts' => self::SORTS,
            'quote' => $quote,
        ]);
    }
}
