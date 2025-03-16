<?php

use App\Livewire\CartPage;
use App\Livewire\HomePage;
use App\Livewire\ProductPage;
use App\Livewire\CheckoutPage;
use App\Livewire\CategoriesPage;
use App\Livewire\ProductDetailPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductPage::class);
Route::get('/cart', CartPage::class);
Route::get('/products/{product}', ProductDetailPage::class);

Route::get('/checkout', CheckoutPage::class);
// Route::prefix('categories')->group(function () {
  
//     Route::get('/categories-page', CategoriesPage::class);
//     Route::get('/products-page', ProductsPage::class);
// });