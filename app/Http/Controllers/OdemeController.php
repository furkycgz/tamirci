<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use App\Models\Islem;
use App\Models\ModelGecmisi;
use App\Models\AracGecmisi;
use App\Models\Odeme;

class OdemeController extends Controller
{
   public function store(Request $request, $musteriId)
{
    $request->validate([
        'tutar' => 'required|numeric|min:0.01',
        'aciklama' => 'nullable|string'
    ]);

    $odeme = Odeme::create([
        'musteri_id' => $musteriId,
        'tutar' => $request->tutar,
        'aciklama' => $request->aciklama,
    ]);

    // Musteri modelini bul
    $musteri = Musteri::findOrFail($musteriId);

    // Toplam fiyatı ödenen kadar azalt
    $musteri->toplam_fiyat = max(0, $musteri->toplam_fiyat - $request->tutar);
    $musteri->save();

    return redirect()->back()->with('success', 'Ödeme başarıyla eklendi.');
}
}
