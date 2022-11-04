<?php

use App\Http\Controllers\PayPalPaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\WordDictionaryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

/**************************
- Transactions Routes -
 **************************/

Route::get('paypalPayment', function () {
    return view('paypalPayment');
})->name('task.paypalPayment');

/*
GET /transactions, mapped to the method named index().
GET /transactions/create, mapped to create().
GET /transactions/{transactionId}, mapped to show().
GET /transactions/{transactionId}/edit, mapped to edit().
POST /transactions, mapped to store().
PUT /transactions/{transactionId}, mapped to update().
DELETE /transactions/{transactionId}, mapped to destroy().
 */
Route::resource('transactions', TransactionController::class);

Route::get('handle-payment', [PayPalPaymentController::class, 'paymentHandle'])->name('payment.make');
Route::get('cancel-payment', [PayPalPaymentController::class, 'paymentCancel'])->name('payment.cancel');
Route::get('payment-success', [PayPalPaymentController::class, 'paymentSuccess'])->name('payment.success');

/****************************************************
Autocomplete textbox with manager -
 ****************************************************/

Route::get('autocomplete', function () {
    return view('autocomplete');
})->name('task.autocomplete');

Route::get('word-dictionary', [WordDictionaryController::class, 'index'])->name('dictionary.get');

Route::post('word-dictionary/{keyword}', [WordDictionaryController::class, 'search'])->name('dictionary.search');

Route::resource('words', WordController::class);
