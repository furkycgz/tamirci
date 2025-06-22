<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MusteriController;
use App\Http\Controllers\IslemController;
use App\Http\Controllers\AyarController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {
    

    Route::get('/dashboard', [IslemController::class, 'sonIslemler'])->middleware(['auth'])->name('dashboard');

    

    Route::get('/ayar', [AyarController::class, 'edit'])->name('ayar.edit');
    Route::post('/ayar', [AyarController::class, 'update'])->name('ayar.update');

    Route::resource('musteriler', MusteriController::class);

    // İşlemler (müşteriye bağlı)
    Route::get('musteriler/{musteri}/islemler', [IslemController::class, 'index'])->name('musteriler.islemler.index');
    Route::get('musteriler/{musteri}/islemler/create', [IslemController::class, 'create'])->name('musteriler.islemler.create');
    Route::post('musteriler/{musteri}/islemler', [IslemController::class, 'store'])->name('musteriler.islemler.store');
    Route::get('musteriler/{musteri}/islemler/{islem}/edit', [IslemController::class, 'edit'])->name('musteriler.islem.edit');
    Route::put('musteriler/{musteri}/islemler/{islem}', [IslemController::class, 'update'])->name('musteriler.islem.update');
    Route::delete('islemler/{islem}', [IslemController::class, 'destroy'])->name('islemler.destroy');
});
Route::get('/musteriler/{musteri}/islemler', [IslemController::class, 'index'])->name('musteriler.islemler.index');


require __DIR__.'/auth.php';
