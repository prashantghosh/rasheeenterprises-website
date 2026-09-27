<?php

use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/packaging-products', [ProductController::class, 'index'])->name('products.index');
Route::get('/packaging-products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/custom-solutions', [PageController::class, 'custom'])->name('custom');
Route::get('/industries', [PageController::class, 'industries'])->name('industries');
Route::get('/sustainability', [PageController::class, 'sustainability'])->name('sustainability');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/contact', [EnquiryController::class, 'contact'])->name('contact');
Route::post('/enquiries', [EnquiryController::class, 'store'])->middleware('throttle:10,1')->name('enquiries.store');
