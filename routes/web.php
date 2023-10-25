<?php

use App\Http\Controllers\AsesmenController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('homepage');
// Route::get('/profile', [HomeController::class, 'profile'])->name('homepage.profile');

Route::prefix('dashboard')->group(function () {
    Route::middleware(['auth'])->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        //> Kelas 
        Route::resource("kelas", KelasController::class);
        Route::get('kelas-action/setActive/{id}', [KelasController::class, 'setActive'])->name('kelas.setActive');
        //> asesor 
        Route::resource("asesor", AsesorController::class);
        Route::get('asesor-action/setActive/{id}', [AsesorController::class, 'setActive'])->name('asesor.setActive');
        //> jadwal 
        Route::resource("jadwal", JadwalController::class);
        Route::get('jadwal-action/setActive/{id}', [JadwalController::class, 'setActive'])->name('jadwal.setActive');
        //> siswa 
        Route::resource("siswa", SiswaController::class);
        Route::get('siswa-action/setActive/{id}', [SiswaController::class, 'setActive'])->name('siswa.setActive');
        //> asesmen 
        Route::resource("asesmen", AsesmenController::class)->except("create");

        //> Laporan 
        Route::get('laporan/kelulusan', [LaporanController::class, 'index'])->name('laporan.asesmen');
        Route::get('laporan/kelulusan/export', [LaporanController::class, 'export'])->name('laporan.asesmen.export');

        //> user
        Route::resource('users', UserController::class);
        Route::get('users-action/setActive/{id}', [UserController::class, 'setActive'])->name('users.setActive');
        Route::post('users-action/import', [UserController::class, 'import'])->name('users.import');
        Route::get('users-action/export', [UserController::class, 'export'])->name('users.export');
        Route::get('users-action/download', [UserController::class, 'download'])->name('users.download');

        //> Update password
        Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
        Route::get('/update-password', [DashboardController::class, 'changePassword'])->name('update-password');
        Route::post('/update-password', [DashboardController::class, 'updatePassword'])->name('update-password');
    });


    //> auth admin
    Route::get('login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('logout', [LoginController::class, 'logoutPegawai'])->name('logout');
    // Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgotpassword');
    // Route::post('forgot-password', [ForgotPasswordController::class, 'sendEmail'])->name('forgetpassword.send');
    // Route::get('reset-password/{token}', [ForgotPasswordController::class, 'editPassword'])->name('edit.password');
    // Route::put('reset-password', [ForgotPasswordController::class, 'updatePassword'])->name('update.password');



    Route::get('logout', function () {
        Auth()->logout();
        request()->session()->invalidate();
        request()->session()->flush();;
        request()->session()->regenerateToken();
        return redirect()->route('admin.login');
    });
});

//> auth siswa
Route::get('siswa/login', [LoginController::class, 'indexSiswa'])->name('siswa.login');
Route::post('siswa/login', [LoginController::class, 'loginSiswa'])->name('siswa.login');
Route::get('siswa/register', [LoginController::class, 'indexRegisterSiswa'])->name('siswa.register');
Route::post('siswa/register', [LoginController::class, 'registerSiswa'])->name('siswa.register');

Route::prefix('siswa/dashboard')->group(function () {
    Route::middleware(['auth:siswa'])->group(function () {

        Route::get('/', [DashboardSiswaController::class, 'index'])->name('siswa.dashboard');

        Route::get('/jadwal-saya', [DashboardSiswaController::class, 'jadwal'])->name('siswa.jadwal-saya');
        Route::get('/hasil-kelulusan', [DashboardSiswaController::class, 'asesmen'])->name('siswa.asesmen');

        Route::get('/update-profile', [DashboardSiswaController::class, 'profile'])->name('siswa.profile');
        Route::post('/update-profile', [DashboardSiswaController::class, 'profileUpdate'])->name('siswa.profile');
    });


    Route::get('siswa/logout', function () {
        Auth()->logout();
        request()->session()->invalidate();
        request()->session()->flush();;
        request()->session()->regenerateToken();
        return redirect()->route('siswa.login');
    })->name('siswa.logout');
});

//> auth asesor
Route::get('asesor/login', [LoginController::class, 'indexAsesor'])->name('asesor.login');
Route::post('asesor/login', [LoginController::class, 'loginAsesor'])->name('asesor.login');
Route::prefix('asesor/dashboard')->group(function () {
    Route::middleware(['auth:asesor'])->group(function () {

        Route::get('/', [DashboardController::class, 'indexAsesor'])->name('asesor.dashboard');

        //> jadwal 
        Route::resource("asesor-jadwal", JadwalController::class);
        Route::get('jadwal-action/setActive/{id}', [JadwalController::class, 'setActive'])->name('asesor-jadwal.setActive');
        //> siswa 
        Route::resource("asesor-siswa", SiswaController::class);
        Route::get('siswa-action/setActive/{id}', [SiswaController::class, 'setActive'])->name('asesor-siswa.setActive');
        //> asesmen 
        Route::resource("asesor-asesmen", AsesmenController::class)->except("create");
        Route::get('asesor/laporan/kelulusan', [LaporanController::class, 'index'])->name('asesor.laporan.asesmen');
        Route::get('asesor/laporan/kelulusan/export', [LaporanController::class, 'export'])->name('asesor.laporan.asesmen.export');
    });


    Route::get('asesor/logout', function () {
        Auth()->logout();
        request()->session()->invalidate();
        request()->session()->flush();;
        request()->session()->regenerateToken();
        return redirect()->route('asesor.login');
    })->name('asesor.logout');
});
