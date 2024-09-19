<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitSatuanKerjaController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\ProfileSuperController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\PDFController;

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
    return view('auth.login');
})->name('login');

// Route::get('/dashboard', function () {
//     return view('pages.home');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Routing untuk Super Admin
// Route::middleware(['auth', 'role:superadmin'])->group(function () {
//     Route::get('/dashboard', [HomeController::class, 'super'])->name('super.dashboard');
// });

// // Routing untuk Admin
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/dashboard/admin', [HomeController::class, 'admin'])->name('admin.dashboard');
// });

// // Routing untuk Pegawai
// Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('/dashboard', [BarangController::class, 'index'])->name('user.dashboard');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'redirectBasedOnRole'])->name('dashboard');
});


Route::resource('units', UnitController::class);
Route::resource('admins', AdminController::class);
Route::resource('unit_satuan_kerjas', UnitSatuanKerjaController::class);
Route::resource('ruangans', AdminController::class);
Route::resource('data_pegawais', PegawaiController::class);
Route::resource('barangs', BarangController::class);
// Route::resource('profile_admin', ProfileAdminController::class);

// Rute untuk mengedit profil admin
Route::middleware(['auth'])->group(function () {
    Route::get('/profile-admin', [ProfileAdminController::class, 'index'])->name('profile_admin.index');
    Route::get('/profile-admin/edit', [ProfileAdminController::class, 'edit'])->name('profile_admin.edit');
    Route::patch('/profile-admin/edit', [ProfileAdminController::class, 'update'])->name('profile_admin.update');
});

// Rute untuk mengedit profil super admin
Route::middleware(['auth'])->group(function () {
    Route::get('/profile-super-admin', [ProfileSuperController::class, 'index'])->name('super_admin.index');
    Route::get('/profile-super-admin/edit', [ProfileSuperController::class, 'edit'])->name('super_admin.edit');
    Route::patch('profile-super-admin/{id}', [ProfileSuperController::class, 'update'])->name('super_admin.update');
});

Route::get('input-tandatangan', function () {
    return view('super_admin.input_tandatangan');
})->name('inputSignature');

Route::post('save-signature-data', 'App\Http\Controllers\SignatureController@saveSignatureData')->name('saveSignatureData');

Route::middleware(['auth'])->group(function () {
    Route::get('/laporan-super-admin', [LaporanController::class, 'superAdmin'])->name('laporan.super');
    Route::get('/laporan/print/super', [LaporanController::class, 'print'])->name('print.super');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/laporan-admin', [LaporanController::class, 'laporanBarang'])->name('laporan.barang');
    Route::get('/laporan/print/barang', [LaporanController::class, 'printBarang'])->name('print.barang');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/barang/{id}/label', [LabelController::class, 'index'])->name('barangs.label');
    Route::get('/barangs/{id}/print', [LabelController::class, 'printLabel'])->name('barangs.print');
    Route::get('/barang/{id}/cetak-pdf', [PDFController::class, 'cetakLabelBarang'])->name('cetak.label.pdf');
});
require __DIR__ . '/auth.php';
