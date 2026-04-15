<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


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

Route::get('/reports', function () {
    return view('report.index');
})->name('reports.index');

Route::get('/reports/create', function () {
    return view('reports.create');
})->name('reports.create');

Route::get('/reports', [ReportController::class, 'index']) -> name('report.index');

Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');

Route::post('/reports', [ReportController::class, 'store']) -> name('reports.store');

Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');

Route::put('/reports/{report}', [ReportController::class, 'update'])->name('reports.update');
