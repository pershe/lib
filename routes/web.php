<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\peminjam\PeminjamController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\petugas\PetugasController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KategoribookController;
use App\Http\Controllers\PeminjamanbookController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LisDendaController;
use App\Providers\RouteServiceProfider;

Route::get('/', function () {
    return view('landingpage');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/peminjam/dashboard', [PeminjamController::class, 'index'])->name('peminjam.dashboard');

Route::middleware('admin:admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/books', [AdminController::class, 'showBooks'])->name('admin.books');
    Route::get('/admin/histori-peminjaman', [AdminController::class, 'showHistoriPeminjaman'])->name('admin.histori.peminjaman');
    Route::get('/admin/peminjam', [AdminController::class, 'showPeminjam'])->name('admin.peminjam');
    Route::get('/admin/petugas', [AdminController::class, 'showPetugas'])->name('admin.petugas');
    Route::put('/admin/update-role/{id}', [AdminController::class, 'updateRole'])->name('admin.updateRole');

});

Route::middleware("petugas")->group(function(){
    Route::get('/petugas/dashboard', [PetugasController::class, 'index'])->name('petugas.dashboard');

    Route::get('petugas/peminjam',[PetugasController::class, 'DataPeminjam'])->name('peminjam.data');
        Route::get('/petugas/peminjam/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/petugas/peminjam/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/petugas/peminjam/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/petugas/createusr', [UserController::class, 'create'])->name('user.create');

    // Route untuk menyimpan data peminjam baru
    Route::post('/petugas/peminjam', [UserController::class, 'store'])->name('users.store');

    // Route Buku
    Route::get('/petugas/books', [BookController::class, 'index'])->name('book.data');
    Route::get('/petugas/books/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/petugas/books/{id}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/petugas/books/{id}', [BookController::class, 'destroy'])->name(name: 'book.destroy');
    Route::get('/petugas/createbk', [BookController::class, 'create'])->name('book.create');
    Route::post('/petugas/books', [BookController::class, 'store'])->name('book.store');

    Route::get('/petugas/kategori', [KategoribookController::class, 'index'])->name('kategori.index');
    Route::get('/petugas/kategori/create', [KategoribookController::class, 'create'])->name('kategori.create');
    Route::post('/petugas/kategori', [KategoribookController::class, 'store'])->name('kategori.store');
    Route::get('/petugas/kategori/{id}/edit', [KategoribookController::class, 'edit'])->name('kategori.edit');
    Route::put('/petugas/kategori/{id}', [KategoribookController::class, 'update'])->name('kategori.update');
    Route::delete('/petugas/kategori/{id}', [KategoribookController::class, 'destroy'])->name('kategori.destroy');



    // Route untuk peminjaman
    Route::resource('/petugas/peminjaman', PeminjamanbookController::class);
    Route::get('/petugas/peminjaman', [PeminjamanbookController::class, 'index'])->name('peminjaman.index');
    Route::get('/petugas/peminjaman/create', [PeminjamanbookController::class, 'create'])->name('peminjaman.create');
    Route::post('/petugas/peminjaman', [PeminjamanbookController::class, 'store'])->name('peminjaman.store');
    Route::get('/petugas/peminjaman/{id}/edit', [PeminjamanbookController::class, 'edit'])->name('peminjaman.edit');
    Route::put('/petugas/peminjaman/{id}', [PeminjamanbookController::class, 'update'])->name('peminjaman.update');
    Route::delete('/petugas/peminjaman/{id}', [PeminjamanbookController::class, 'destroy'])->name('peminjaman.destroy');

    Route::get('/petugas/histori-peminjaman', [PeminjamanbookController::class, 'histori'])->name('peminjaman.histori');

    Route::get('petugas/denda', [LisDendaController::class, 'index'])->name('denda.index');
    Route::put('/denda/bayar/{id}', [LisDendaController::class, 'bayarDenda'])->name('denda.bayar');


});

Route::get('/generate-laporan', [LaporanController::class, 'generatePDF'])->name('generate.pdf');

Route::get('/peminjam/books', [BookController::class, 'indexPeminjam'])->name('peminjam.books');
Route::post('/peminjam/book/{id}/booking', [PeminjamanbookController::class, 'booking'])->name('peminjaman.booking');
Route::get('/peminjam/book/{id}/booking', [PeminjamanbookController::class, 'showBooking'])->name('peminjaman.showBooking');



require __DIR__.'/auth.php';
