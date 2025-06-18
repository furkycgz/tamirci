<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MusteriController;


Route::get('/', function () {
    return redirect()->route('musteriler.index');
});

Route::resource('musteriler', MusteriController::class)->only(['index', 'create', 'store']);

// İşlem ekleme için özel route'lar
Route::get('musteriler/{musteri}/islem/create', [MusteriController::class, 'createIslem'])->name('musteriler.islem.create');
Route::post('musteriler/{musteri}/islem', [MusteriController::class, 'storeIslem'])->name('musteriler.islem.store');




Route::get('/musteriler/{id}/edit', [MusteriController::class, 'edit'])->name('musteriler.edit');
Route::put('/musteriler/{id}', [MusteriController::class, 'update'])->name('musteriler.update');
Route::get('/musteriler/{id}', [MusteriController::class, 'show'])->name('musteriler.show');


Route::delete('/musteriler/{id}', [MusteriController::class, 'destroy'])->name('musteriler.destroy');
Route::delete('/islemler/{id}', [App\Http\Controllers\IslemController::class, 'destroy'])->name('islemler.destroy');

