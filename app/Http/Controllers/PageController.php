<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function custom(): View
    {
        return view('pages.custom', [
            'printable' => Catalog::many(['customized-printed-logo-tape', 'bopp-tan-carton-tape', 'pp-strapping-patty-manual']),
        ]);
    }

    public function industries(): View
    {
        return view('pages.industries');
    }

    public function sustainability(): View
    {
        return view('pages.sustainability', [
            'lines' => Catalog::all()->where('eco', true)->take(3)->values(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }
}
