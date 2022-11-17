<?php

use App\Http\Controllers\Operator\GuestController;
use App\Http\Controllers\Operator\ProgramController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\SignatureController;
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


//Route::get('signaturepad', [SignaturePadController::class, 'index']);
//Route::post('signaturepad', [SignaturePadController::class, 'upload'])->name('signaturepad.upload');


Route::get('signature-pad',[SignatureController::class, 'index']);
Route::post('signature-pad',[SignatureController::class, 'store']);

//Route::get('signature-pad', [SignatureController::class, 'index']);
//Route::post('signature-pad', [SignatureController::class, 'store']);

Route::get('/guest/cetak', [GuestController::class, 'cetak']);
Route::get('/guest/signed/{id}', [GuestController::class, 'file'])->name('signed.file');
Route::get('/program/cetak/{id}', [ProgramController::class, 'cetak'])->name('program.cetak');
Route::get('/notes/cetak', [NoteController::class, 'cetak']);
Route::get('/guest/tabel/{id}', [GuestController::class, 'tabel'])->name('guest.tabel');
Route::get('/program/hapus/{id}', [ProgramController::class, 'hapus']);
Route::get('/program/trash', [ProgramController::class, 'trash']);
Route::get('/program/kembalikan/{id}',[ProgramController::class, 'kembalikan']);
Route::get('/program/kembalikan_semua', [ProgramController::class, 'kembalikan_semua']);
Route::get('/program/hapus_permanen/{id}', [ProgramController::class, 'hapus_permanen']);
Route::get('/program/hapus_permanen_semua', [ProgramController::class, 'hapus_permanen_semua']);
Route::resource('/guest', GuestController::class);
Route::get('/program/notes/{id}', [ProgramController::class, 'notes'])->name('program.notes');
Route::resource('/program', ProgramController::class);
Route::resource('/notes', NoteController::class);
//Route::resource('/opds', OpdController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// baru
Route::resource('/absensi', App\Http\Controllers\Guest\AbsensiController::class );

