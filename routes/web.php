<?php

use App\Http\Controllers\Operator\GuestController;
use App\Http\Controllers\Operator\ProgramController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SuperAdmin\AdminController;
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

Route::get('/program/trash', [ProgramController::class, 'trash']);
Route::get('/program/hapus/{id}', [ProgramController::class, 'hapus']);
Route::get('/program/kembalikan/{id}',[ProgramController::class, 'kembalikan']);
Route::get('/program/kembalikan_semua', [ProgramController::class, 'kembalikan_semua']);
Route::get('/program/hapus_permanen/{id}', [ProgramController::class, 'hapus_permanen']);
Route::get('/program/hapus_permanen_semua', [ProgramController::class, 'hapus_permanen_semua']);

// Route Cetak PDF Notes
Route::get('/notes/cetak/{id}', [NoteController::class, 'cetak'])->name('notes.cetak');

// Route Soft Delete Notes
Route::get('/notes/hapus/{id}', [NoteController::class, 'hapus']);
Route::get('/notes/trash', [NoteController::class, 'trash']);
Route::get('/notes/kembalikan/{id}', [NoteController::class, 'kembalikan']);
Route::get('/notes/kembalikan_semua', [NoteController::class, 'kembalikan_semua']);
Route::get('/notes/hapus_permanen/{id}', [NoteController::class, 'hapus_permanen']);
Route::get('/notes/hapus_permanen_semua', [NoteController::class, 'hapus_permanen_semua']);

// Route Controller
Route::resource('/guest', GuestController::class);
Route::resource('/program', ProgramController::class);
Route::resource('/notes', NoteController::class);
Route::resource('/superAdmin', AdminController::class);

// Route Cetak PDF Program
Route::get('/program/cetak/{id}', [ProgramController::class, 'cetak'])->name('program.cetak');

// Route Soft Delete Program

// Route Signature Pad
Route::get('signature-pad',[SignatureController::class, 'index']);
Route::post('signature-pad',[SignatureController::class, 'store']);
Route::get('/guest/signed/{id}', [GuestController::class, 'file'])->name('signed.file');


// Route Relation
Route::get('/guest/tabel/{id}', [GuestController::class, 'tabel'])->name('guest.tabel');
Route::get('/program/notes/{id}', [ProgramController::class, 'notes'])->name('program.notes');

// Route Auth
Auth::routes();

//Route Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Guest Absen
Route::resource('/absensi', App\Http\Controllers\Guest\AbsensiController::class );

