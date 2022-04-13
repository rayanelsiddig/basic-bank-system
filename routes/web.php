<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransferMoneyController;

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

Route::view('/','welcome');
Route::get('/customers-list', [CustomerController::class,'index'])->name('customers-list');
Route::get('transfer/{id}',[CustomerController::class,'view']);
Route::get('customer-detail/{id}',[CustomerController::class,'customerDetail'])->name('customer-detail');
Route::get('transfer-store',[TransferMoneyController::class,'store'])->name('transfer.store');
Route::get('/all-transcations',[TransferMoneyController::class,'transcationDetails'])->name('all-transcations');
