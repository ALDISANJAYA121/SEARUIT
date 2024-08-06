<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;

Route::get('/', [PageController::class, 'index']);
Route::post('/search', [PageController::class, 'search'])->name('apps.search');
Route::post('/updatehits', [PageController::class, 'updateHits']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [PageController::class, 'admin']);
    Route::get('/tambah', [PageController::class, 'tambah']);
    Route::post('/tambah', [PageController::class, 'tambahApp']);
    Route::get('/edit/{id}', [PageController::class, 'edit']);
    Route::put('/update/{id}', [PageController::class, 'update']);
    Route::delete('/delete/{id}', [PageController::class, 'delete']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
