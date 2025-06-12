<?php

use App\Http\Controllers\AdashboardController;
use App\Http\Controllers\EdashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Route::get('/login', function () {
//     return view('login');
// })->name('login');

Route::get('/', [EdashboardController::class, 'showForm'])->name('eventholder.edash');
Route::get('homepage', [EdashboardController::class, 'show'])->name('eventholder.homepage');

// login
// Route::get('/login', [LoginController::class, 'showForm'])->name('views.login'); // GET: show login page
// Route::post('/login', [LoginController::class, 'login'])->name('views.login.submit'); // POST: handle login
Route::get('/eprofile', [EdashboardController::class, 'profile'])->name('eventholder.eprofile');

// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect('/');
// })->name('logout');


Route::get('/regist', [RegisterController::class, 'showForm'])->name('views.register');
Route::post('/regist', [RegisterController::class, 'submitForm'])->name('views.register.submit');

Route::get('adash', [AdashboardController::class, 'showForm'])->name('admin.dashboard');
// Route::get('makun', [AdashboardController::class, 'manajemenAkun'])->name('admin.makun');

Route::prefix('admin')->group(function () {
    Route::get('makun', [UserController::class, 'index'])->name('admin.makun');
    Route::post('makun', [UserController::class, 'store'])->name('admin.makun.store');
    Route::get('makun/{akun}/edit', [UserController::class, 'edit'])->name('admin.makun.edit');
    Route::put('makun/{akun}', [UserController::class, 'update'])->name('admin.makun.update');
    Route::delete('makun/{akun}', [UserController::class, 'destroy'])->name('admin.makun.destroy');
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

// Admin
Route::get('/adashboard', [AdashboardController::class, 'showForm'])->name('admin.adashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('views.dashboard');

// Route::get('/profile', function () {
//     return view('peserta.profile');
// })->name('peserta.profile');

// Route::get('/aprofile', function () {
//     return view('admin.aprofile');
// })->name('admin.aprofile');



// Route::get('/dashboard', function () {
//     return view('peserta.dashboard');
// })->name('peserta.dashboard');



// Route::post('diem', function (Request $request) {
//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         $request->session()->regenerate(); // Penting untuk keamanan

//         $user = Auth::user();
//         if ($user->role === 'admin') {
//             return redirect()->route('admin.adashboard');
//         } elseif ($user->role === 'peserta') {
//             return redirect()->route('peserta.welcome');
//         }
//         return redirect()->route('views.dashboard'); // Fallback
//     }

//     return back()->withErrors(['email' => 'Email atau password salah']);
// })->name('views.log');


// Route::post('/register-submit', function (Request $request) {
//     // proses register di sini
//     return redirect()->route('views.dashboard');
// })->name('views.register.submit');



// Route::post('/register-submit', function (Request $request) {
//     User::create([
//         'name' => $request->nama,
//         'email' => $request->email,
//         'password' => bcrypt($request->password),
//     ]);

//     return redirect()->route('views.dashboard');
// })->name('views.register.submit');