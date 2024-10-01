<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
});
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/transaction-history', function () {
    return view('transaction_history');
})->middleware(['auth', 'verified'])->name('transaction.history');
Route::get('/credit-history', function () {
    return view('credit_history');
})->middleware(['auth', 'verified'])->name('credit.history');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::post('/checkout-package', 'App\Http\Controllers\StripeController@checkoutPackage')->name('checkout.package');
});

Route::post('/search-vin', 'App\Http\Controllers\MainController@searchVin')->name('search.vin');

Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');

require __DIR__.'/auth.php';
