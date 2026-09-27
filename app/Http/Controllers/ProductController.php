<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('pages.catalog', ['products' => Catalog::all()]);
    }

    public function show(string $slug): View
    {
        $product = Catalog::find($slug) ?? abort(404);

        return view('pages.product', [
            'product' => $product,
            'related' => Catalog::many($product['related'] ?? []),
        ]);
    }
}
