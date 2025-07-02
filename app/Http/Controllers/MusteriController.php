<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use App\Models\Islem;
use App\Models\ModelGecmisi;
use App\Models\AracGecmisi;
use App\Models\Odeme;
class MusteriController extends Controller
{
    // Müşteri listeleme
    public function index()
    {
        $musteriler = Musteri::where('user_id', auth()->id())->get();
        return view('musteriler.index', compact('musteriler'));
    }

    // Müşteri formu
    public function create()
    {
        return view('musteriler.create');
    }

    // Müşteri kaydetme
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ad_soyad' => 'required|string|max:255',
            'telefon' => 'required|string|max:20',
            'plaka' => 'required|string|max:10',
            'model' => 'required|string|max:50',
        ]);

        $validated['user_id'] = auth()->id();

        Musteri::create($validated);

        return redirect()->route('musteriler.index')->with('success', 'Müşteri başarıyla eklendi.');
    }

    // İşlem ekleme formu
    public function createIslem($musteri_id)
    {
        $musteri = Musteri::findOrFail($musteri_id);
        return view('islemler.create', compact('musteri'));
    }

    // İşlem kaydet
    public function storeIslem(Request $request, $musteri_id)
    {
        $request->validate([
            'yapilan_islem' => 'required|string|max:255',
            'fiyat' => 'required|numeric|min:0',
        ]);

        $musteri = Musteri::findOrFail($musteri_id);

        $musteri->islemler()->create([
            'yapilan_islem' => $request->yapilan_islem,
            'fiyat' => $request->fiyat,
        ]);

        // toplam fiyatı güncelle
        $musteri->toplam_fiyat = $musteri->toplam_fiyat + $request->fiyat;
        $musteri->save();

        return redirect()->route('musteriler.index')->with('success', 'İşlem başarıyla eklendi.');
    }

    // Müşteri düzenleme formu
    public function edit($id)
    {
        $musteri = Musteri::findOrFail($id);
        return view('musteriler.edit', compact('musteri'));
    }

    // Müşteri güncelle
    public function update(Request $request, $id)
    {
        $musteri = Musteri::findOrFail($id);

        if ($request->model !== $musteri->model || $request->plaka !== $musteri->plaka) {
            AracGecmisi::create([
                'musteri_id' => $musteri->id,
                'model' => $musteri->model,
                'plaka' => $musteri->plaka,
            ]);
        }

        $musteri->update([
            'ad_soyad' => $request->ad_soyad,
            'telefon' => $request->telefon,
            'plaka' => $request->plaka,
            'model' => $request->model,
        ]);

        return redirect()->route('musteriler.show', $musteri->id)->with('success', 'Müşteri güncellendi.');
    }

    // Müşteri detay
    public function show($id)
    {
        $musteri = Musteri::findOrFail($id);
        $islemler = $musteri->islemler()->orderBy('created_at', 'desc')->get();

        return view('musteriler.show', compact('musteri', 'islemler'));
    }

    // Müşteri sil
    public function destroy($id)
    {
        $musteri = Musteri::findOrFail($id);
        $musteri->islemler()->delete();
        $musteri->delete();

        return redirect()->route('musteriler.index')->with('success', 'Müşteri ve işlemleri silindi.');
    }
  
   public function hesap()
{
    try {
        $musteriler = Musteri::with('islemler', 'odemeler')
            ->where('user_id', auth()->id())
            ->get();

        // Her müşteri için veri kontrolü (debug amaçlı)
        foreach ($musteriler as $musteri) {
            logger("Müşteri: " . $musteri->ad_soyad);
            logger("İşlem sayısı: " . $musteri->islemler->count());
            logger("Ödeme sayısı: " . $musteri->odemeler->count());
        }

        return view('musteriler.hesap', compact('musteriler'));

    } catch (\Throwable $e) {
        return response()->json([
            'hata' => $e->getMessage(),
            'satir' => $e->getLine(),
            'dosya' => $e->getFile(),
        ], 500);
    }
}

}
