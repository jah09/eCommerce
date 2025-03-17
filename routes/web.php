<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\CartPage;
use App\Livewire\HomePage;
use App\Livewire\MyOrderPage;
use App\Livewire\ProductPage;
use App\Livewire\CheckoutPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\CategoriesPage;
use App\Livewire\OrderDetailPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\CancelPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\SuccessPage;
use Filament\Pages\Auth\PasswordReset\ResetPassword;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductPage::class);
Route::get('/cart', CartPage::class);
Route::get('/products/{product}', ProductDetailPage::class);

Route::get('/checkout', CheckoutPage::class);
Route::get('/my-orders', MyOrderPage::class);
Route::get('/my-orders/{order}', OrderDetailPage::class);

//Auth
Route::get('/login', LoginPage::class);
Route::get('/register', RegisterPage::class);
Route::get('/forgot-password', ForgotPassword::class);
Route::get('/reset-password', ResetPassword::class);

Route::get('/success',SuccessPage::class);
Route::get('/cancel', CancelPage::class);

// Route::prefix('categories')->group(function () {
  
//     Route::get('/categories-page', CategoriesPage::class);
//     Route::get('/products-page', ProductsPage::class);
// });