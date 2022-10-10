<?php

use App\Http\Controllers\Operator\GuestController;
use App\Http\Controllers\Operator\ProgramController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\SignaturePadController;
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
    return view('landing.index');
});


Route::get('signaturepad', [SignaturePadController::class, 'index']);
Route::post('signaturepad', [SignaturePadController::class, 'upload'])->name('signaturepad.upload');

Route::get('/guest/cetak', [GuestController::class, 'cetak']);
Route::get('/program/cetak', [ProgramController::class, 'cetak']);
Route::resource('/guest', GuestController::class);
Route::resource('/program', ProgramController::class);
Route::resource('/notes', NoteController::class);
Route::resource('/opds', OpdController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
