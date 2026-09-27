<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/solutions', [PageController::class, 'solutions'])->name('solutions');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::post('/quote/items/{slug}', [QuoteController::class, 'add'])->name('quote.add');
Route::delete('/quote/items/{slug}', [QuoteController::class, 'remove'])->name('quote.remove');
Route::post('/quote', [QuoteController::class, 'submit'])->middleware('throttle:10,1')->name('quote.submit');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:10,1')->name('contact.store');
