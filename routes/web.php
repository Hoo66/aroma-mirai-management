<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;

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
  return view('home');
});

// Inquiries
Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index')->middleware('auth');
Route::get('/inquiries/filter', [InquiryController::class, 'filter'])->name('inquiries.filter')->middleware('auth');
Route::get('/inquiries/{id}', [InquiryController::class, 'show'])->name('inquiries.show')->middleware('auth');
Route::delete('/inquiries/{id}', [InquiryController::class, 'destroy'])->name('inquiries.destroy')->middleware('auth');
Route::post('/inquiries/{id}', [InquiryController::class, 'update'])->name('inquiries.update')->middleware('auth');


Auth::routes(['register' => false]);
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
