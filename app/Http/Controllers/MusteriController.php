<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use App\Models\Islem;

class MusteriController extends Controller
{
    // Müşteri listeleme sayfası
    public function index()
    {
        $musteriler = Musteri::with('islemler')->get();
        return view('musteriler.index', compact('musteriler'));
    }

    // Yeni müşteri formu göster
    public function create()
    {
        return view('musteriler.create');
    }

    // Yeni müşteri kaydet
    public function store(Request $request)
    {
        $request->validate([
            'ad_soyad' => 'required|string|max:255',
            'telefon' => 'required|string|max:20',
            'plaka' => 'required|string|max:10',
            'model' => 'required|string|max:50',
        ]);

        Musteri::create($request->all());

        return redirect()->route('musteriler.index')->with('success', 'Müşteri başarıyla eklendi!');
    }

    // Müşteriye işlem eklemek için form göster
    public function createIslem($musteri_id)
    {
        $musteri = Musteri::findOrFail($musteri_id);
        return view('islemler.create', compact('musteri'));
    }





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

    // TOPLAM FİYATI GÜNCELLE
    $musteri->toplam_fiyat += $request->fiyat;
    $musteri->save();

    return redirect()->route('musteriler.index')->with('success', 'İşlem başarıyla eklendi!');
    }

    public function edit($id)
{
    $musteri = Musteri::findOrFail($id);
    return view('musteriler.edit', compact('musteri'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'ad_soyad' => 'required|string|max:255',
        'telefon' => 'required|string|max:20',
        'plaka' => 'required|string|max:20',
        'model' => 'required|string|max:255',
    ]);

    $musteri = Musteri::findOrFail($id);
    $musteri->update($request->only(['ad_soyad', 'telefon', 'plaka', 'model']));

    return redirect()->route('musteriler.index')->with('success', 'Müşteri bilgileri güncellendi.');
}


public function show($id)
{
    $musteri = Musteri::findOrFail($id);
    return view('musteriler.show', compact('musteri'));
}


public function destroy($id)
{
    $musteri = Musteri::findOrFail($id);

    // Önce ilişkili işlemleri sil
    $musteri->islemler()->delete();

    // Sonra müşteriyi sil
    $musteri->delete();

    return redirect()->route('musteriler.index')->with('success', 'Müşteri ve işlemleri silindi.');
}

    

}
