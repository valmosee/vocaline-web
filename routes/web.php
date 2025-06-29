<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    AdashboardController,
    EdashboardController,
    DashboardController,
    EventController,
    KuesionerController,
    UserController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Landing Page ---
Route::get('/', [EdashboardController::class, 'showForm'])->name('eventholder.landing');
Route::get('eventholder-homepage', [EdashboardController::class, 'show'])->name('eventholder.homepage');

// --- Auth (Breeze) ---
require __DIR__ . '/auth.php';

// --- ROUTES UNTUK USER YANG LOGIN ---
Route::middleware('auth')->group(function () {

    // === PROFILE (umum via Breeze) ===
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // === ADMIN ===
    Route::get('/aprofile', [AdashboardController::class, 'profile'])->name('admin.aprofile');
    Route::put('/aprofile', [AdashboardController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('adash', [AdashboardController::class, 'showForm'])->name('admin.dashboard');
  #  Route::get('/admin/approval/{id_event}', [AdashboardController::class, 'approvalList'])->name('admin.approval.list');
    Route::post('/admin/approval/{id_join}/approve', [AdashboardController::class, 'approve'])->name('admin.approval.approve');
    Route::post('/admin/approval/{id_join}/reject', [AdashboardController::class, 'reject'])->name('admin.approval.reject');
    Route::get('/admin/approval/{id_event}', [AdashboardController::class, 'approvalList'])->name('admin.approval');


    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/makun', [UserController::class, 'index'])->name('makun');
        Route::post('/makun', [UserController::class, 'store'])->name('makun.store');
        Route::get('/makun/{akun}/edit', [UserController::class, 'edit'])->name('makun.edit');
        Route::put('/makun/{akun}', [UserController::class, 'update'])->name('makun.update');
        Route::delete('/makun/{akun}', [UserController::class, 'destroy'])->name('makun.destroy');

        Route::get('/adashboard', [AdashboardController::class, 'showForm'])->name('adashboard');
        Route::get('/event', [AdashboardController::class, 'event'])->name('event');
    });


    Route::get('/danggota', [AdashboardController::class, 'dataAnggota'])->name('admin.dataAnggota');
    // === EVENT ===
    Route::get('event', [EventController::class, 'index'])->name('admin.event');
    Route::post('event', [EventController::class, 'store'])->name('admin.event.store');
    Route::get('event/edit/{id}', [EventController::class, 'edit'])->name('admin.event.edit');
    Route::put('event/{event}', [EventController::class, 'update'])->name('admin.event.update');
    Route::delete('event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');

    //KUESIONER
    Route::get('kuesioner/{id_event}', [KuesionerController::class,'index'])->name('admin.kuesioner');
    Route::post('kuesioner/{id_event}', [KuesionerController::class, 'store'])->name('admin.kuesioner.store');
    Route::delete('kuesioner/delete/{id}', [KuesionerController::class, 'destroy'])->name('admin.kuesioner.destroy');
    // === EVENT HOLDER ===
    Route::middleware('role:eventholder')->group(function () {
        Route::get('/eprofile', [EdashboardController::class, 'profile'])->name('eventholder.eprofile');
        Route::get('/dashboard', [EdashboardController::class, 'eventholderDashboard'])->name('eventholder.dashboard');
        Route::get('/ajukan-event', [EdashboardController::class, 'ajukanEventForm'])->name('eventholder.ajukan-event.form');
        Route::post('/ajukan-event', [EdashboardController::class, 'storeAjuanEvent'])->name('eventholder.ajukan-event.store');
    });

    // === PESERTA ===
    Route::get('/ppassword', [DashboardController::class, 'profile'])->name('peserta.profile');
    Route::get('/dashboard', [DashboardController::class, 'showForm'])->name('peserta.dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('peserta.profile');
    Route::get('/event-peserta', [DashboardController::class, 'event'])->name('peserta.event');
    Route::get('/event/{id}', [DashboardController::class, 'show'])->name('peserta.detailevent');
    // Route::get('/kuesioner-peserta', [DashboardController::class, 'kuesioner'])->name('peserta.kuesioner');
    Route::post('/kuesioner-peserta/{id_event}', [DashboardController::class,'storeJawaban'])->name('peserta.kuesioner.store');
    Route::get('/kuesioner-peserta/{id_event}', [DashboardController::class, 'kuesioner'])->name('peserta.kuesioner');
    Route::get('/ajukan-diri/{id_event}', [DashboardController::class, 'ajukanDiri'])->name('peserta.ajukan');

    // === LAPORAN ===
    Route::get('/admin/event/report', [EventController::class, 'report'])->name('admin.event.report');

   
//HISTORY
Route::get('/history', [DashboardController::class, 'history'])->name('peserta.history');

});
