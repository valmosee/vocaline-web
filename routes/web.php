<?php

use App\Http\Controllers\AdashboardController; // Untuk Admin
use App\Http\Controllers\EdashboardController; // Untuk Event Holder
use App\Http\Controllers\DashboardController;  // Untuk Peserta (Default User)
use App\Http\Controllers\UserController;      // Untuk Manajemen Akun Admin
use App\Http\Controllers\EventController;     // Untuk Manajemen Event Admin
use App\Http\Controllers\ProfileController;   // Untuk Profil User Breeze
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Digunakan jika ada logika Auth langsung di route file


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

// --- Route Utama (Root URL) ---
// Ini akan selalu mengarahkan ke halaman landing Event Holder
Route::get('/', [EdashboardController::class, 'showForm'])->name('eventholder.landing'); // URL root
Route::get('eventholder-homepage', [EdashboardController::class, 'show'])->name('eventholder.homepage'); // Route lain jika diperlukan


// Route otentikasi yang disediakan oleh Laravel Breeze
require __DIR__.'/auth.php';

// --- Authenticated Routes (Memerlukan login) ---
Route::middleware('auth')->group(function () {
    // Route umum untuk semua role yang sudah login
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Contoh route profil untuk eventholder, jika berbeda dari profil umum Breeze
    Route::get('/eprofile', [EdashboardController::class, 'profile'])->name('eventholder.eprofile');
    // Contoh route profil untuk admin, jika berbeda dari profil umum Breeze
    Route::get('/aprofile', [AdashboardController::class, 'profile'])->name('admin.aprofile');
    // Contoh route profil untuk peserta, jika berbeda dari profil umum Breeze
    Route::get('/ppassword', [DashboardController::class, 'profile'])->name('peserta.profile');
    Route::get('/event-peserta', [DashboardController::class, 'event'])->name('peserta.event');
    Route::get('/kuisioner-peserta', [DashboardController::class, 'kuisioner'])->name('peserta.kuisioner');


    // --- DASHBOARD BERDASARKAN ROLE ---
    // Dashboard untuk Admin
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdashboardController::class, 'showForm'])->name('dashboard');
        // Route untuk manajemen akun oleh Admin
        Route::get('makun', [UserController::class, 'index'])->name('makun');
        Route::post('makun', [UserController::class, 'store'])->name('makun.store');
        Route::get('makun/{user}/edit', [UserController::class, 'edit'])->name('makun.edit');
        Route::put('makun/{user}', [UserController::class, 'update'])->name('makun.update');
        Route::delete('makun/{user}', [UserController::class, 'destroy'])->name('makun.destroy');

        Route::get('danggota', [AdashboardController::class, 'dataAnggota'])->name('dataAnggota');
        // Route untuk manajemen event oleh Admin
        Route::get('event', [EventController::class, 'index'])->name('event');
        Route::post('event', [EventController::class, 'store'])->name('event.store');
        Route::get('event/edit/{event}', [EventController::class, 'edit'])->name('event.edit');
        Route::put('event/{event}', [EventController::class, 'update'])->name('event.update');
        Route::delete('event/{event}', [EventController::class, 'destroy'])->name('event.destroy');
    });

    // Dashboard untuk Event Holder
    Route::middleware('role:eventholder')->prefix('eventholder')->name('eventholder.')->group(function () {
        Route::get('/dashboard', [EdashboardController::class, 'eventholderDashboard'])->name('dashboard');
        // Tambahkan route khusus Event Holder lainnya di sini (misal: halaman untuk mengajukan event)
        Route::get('/ajukan-event', [EdashboardController::class, 'ajukanEventForm'])->name('ajukan-event.form');
        Route::post('/ajukan-event', [EdashboardController::class, 'storeAjuanEvent'])->name('ajukan-event.store');
    });

    Route::get('adash', [AdashboardController::class, 'showForm'])->name('admin.dashboard');

    // admin
    Route::prefix('admin')->group(function () {
        Route::get('makun', [UserController::class, 'index'])->name('admin.makun');
        Route::post('makun', [UserController::class, 'store'])->name('admin.makun.store');
        Route::get('makun/{akun}/edit', [UserController::class, 'edit'])->name('admin.makun.edit');
        Route::put('makun/{akun}', [UserController::class, 'update'])->name('admin.makun.update');
        Route::delete('makun/{akun}', [UserController::class, 'destroy'])->name('admin.makun.destroy');
        Route::get('/adashboard', [AdashboardController::class, 'index'])->name('admin.adashboard');
    });

    Route::get('danggota', [AdashboardController::class, 'dataAnggota'])->name('admin.dataAnggota');

    Route::get('event', [EventController::class, 'index'])->name('admin.event');
    Route::post('event', [EventController::class, 'store'])->name('admin.event.store');
    Route::get('event/edit/{id}', [EventController::class, 'edit'])->name('admin.event.edit');
    Route::put('event/{id}', [EventController::class, 'update'])->name('admin.event.update');
    Route::delete('event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');

    // Peserta
    Route::get('/dashboard', [DashboardController::class, 'showForm'])->name('peserta.dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('peserta.profile');
    Route::get('/event-peserta', [DashboardController::class, 'event'])->name('peserta.event');
    Route::get('/kuisioner-peserta', [DashboardController::class, 'kuisioner'])->name('peserta.kuisioner');
});