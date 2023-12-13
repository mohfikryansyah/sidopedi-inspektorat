<?php

use App\Models\Dinas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratTugasController;

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
    return view('landing-page', [
        'dinas' => Dinas::where('perjalanan_dinas', true)->get()
    ]);
});

Route::get('/dashboard', function () {
    return view('authentication.admin.dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('/surat-tugas', SuratTugasController::class)->middleware(['auth']);
Route::resource('/laporan', LaporanController::class)->middleware(['auth']);
Route::resource('/perjalanan-dinas', DinasController::class)->middleware(['auth', 'role:ADMIN']);
Route::get('/kirim-email/{id}', [DinasController::class, 'sendEmail'])->middleware(['auth', 'role:ADMIN'])->name('sendEmail');
Route::post('/toggle-perjalanan-dinas/{dinas}', [DinasController::class, 'toggleStatus'])->middleware('auth');


Route::get('/users', [UserController::class, 'index'])->middleware(['auth', 'role:ADMIN'])->name('users');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware(['auth', 'role:ADMIN'])->name('users.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
