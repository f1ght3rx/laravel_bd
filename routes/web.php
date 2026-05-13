<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/reports', function () { return view('report.index'); })->name('reports.index');
    Route::get('/reports/create', function () { return view('reports.create'); })->name('reports.create');
    Route::get('/reports', [ReportController::class, 'index']) -> name('report.index');
    Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');
    Route::post('/reports', [ReportController::class, 'store']) -> name('reports.store');
    Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');
    Route::put('/reports/{report}', [ReportController::class, 'update'])->name('reports.update');
    Route::middleware([Admin::class])->group(function() {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::patch('/reports/status/{report}/', [ReportController::class, 'statusUpdate'])->name('reports.status.update');
    }); 
});

require __DIR__.'/auth.php';