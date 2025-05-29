<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Livewire\Ruang\ListRuang;
use App\Livewire\Ruang\CreateRuang;
use App\Livewire\Ruang\EditRuang;
use App\Livewire\UnitKerja\ListUnitKerja;
use App\Livewire\UnitKerja\CreateUnitKerja;
use App\Livewire\UnitKerja\EditUnitKerja;
use App\Livewire\Pegawai\ListPegawai;
use App\Livewire\Pegawai\CreatePegawai;
use App\Livewire\Pegawai\EditPegawai;
use App\Livewire\Peminjaman\ListPeminjaman;  // sesuaikan namespace Livewire kamu
use App\Livewire\Peminjaman\CreatePeminjaman;
use App\Livewire\Peminjaman\EditPeminjaman;






Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('/counter', Counter::class);
    Route::get('/ruang', ListRuang::class)->name('ruang.index');
    Route::get('/ruang/create', CreateRuang::class)->name('ruang.create');
    Route::get('/ruang/edit/{ruang}', EditRuang::class)->name('ruang.edit');
    Route::get('/', ListUnitKerja::class)->name('unit-kerja.index');
    Route::get('/create', CreateUnitKerja::class)->name('unit-kerja.create');
    Route::get('/{id}/edit', EditUnitKerja::class)->name('unit-kerja.edit');
    Route::get('/pegawai', ListPegawai::class)->name('pegawai.index');
    Route::get('/pegawai/create', CreatePegawai::class)->name('pegawai.create');
    Route::get('/pegawai/{id}/edit', EditPegawai::class)->name('pegawai.edit');
    Route::get('/peminjaman', ListPeminjaman::class)->name('peminjaman.index');
    Route::get('/peminjaman/tambah', CreatePeminjaman::class); // form tambah
    Route::get('/peminjaman/edit/{id}', EditPeminjaman::class);




    


    Route::delete('/ruang/{id}', function ($id) {
        $ruang = \App\Models\Ruang::find($id);
        if (!$ruang) {
            return response()->json(['message' => 'Ruang tidak ditemukan!'], 404);
        }
        $ruang->delete();
        return response()->json(['message' => 'Ruang berhasil dihapus!'], 200);
    });

   
    


});

require __DIR__.'/auth.php';
