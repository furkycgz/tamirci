<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusteriController;
use App\Http\Controllers\IslemController;
use App\Http\Controllers\AyarController;

Route::get('/', function () {
    return redirect()->route('musteriler.index');
});

// Müşteri işlemleri
Route::resource('musteriler', MusteriController::class)->only(['index', 'create', 'store', 'edit', 'update', 'show', 'destroy']);

// İşlem ekleme
Route::get('musteriler/{musteri}/islem/create', [MusteriController::class, 'createIslem'])->name('musteriler.islem.create');
Route::post('musteriler/{musteri}/islem', [MusteriController::class, 'storeIslem'])->name('musteriler.islem.store');

// İşlem listeleme ve silme
Route::get('musteriler/{musteri}/islemler', [IslemController::class, 'index'])->name('musteriler.islemler.index');
Route::delete('islemler/{id}', [IslemController::class, 'destroy'])->name('islemler.destroy');




Route::get('/ayarlar', [AyarController::class, 'edit'])->name('ayar.edit');
Route::post('/ayarlar', [AyarController::class, 'update'])->name('ayar.update');
