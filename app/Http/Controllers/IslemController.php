<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Islem;
use App\Models\Musteri;

class IslemController extends Controller
{
    public function create($musteriId)
{
    // Eğer işlem ekleme formu için müşteri bilgisi gerekiyorsa
    $musteri = Musteri::findOrFail($musteriId);

    return view('islemler.create', compact('musteri'));
}

public function index($musteriId)
{
    $musteri = Musteri::findOrFail($musteriId);

    // Son 5 işlemi alıyoruz:
    $islemler = $musteri->islemler()->latest()->take(5)->get();

    return view('islemler.index', compact('musteri', 'islemler'));
}


    public function destroy($id)
    {
        $islem = Islem::findOrFail($id);
        $musteri = $islem->musteri;

        if ($musteri) {
            $musteri->toplam_fiyat -= $islem->fiyat;
            $musteri->save();
        }

        $islem->delete();

        return redirect()->route('musteriler.islemler.index', ['musteri' => $musteri->id])
            ->with('success', 'İşlem başarıyla silindi.');
    }

    public function store(Request $request, $musteriId)
{
    $request->validate([
        'islemler' => 'required|array|min:1',
        'islemler.*.yapilan_islem' => 'required|string|max:255',
        'islemler.*.fiyat' => 'required|numeric|min:0',
    ]);

    $userId = auth()->id();
    $musteri = Musteri::findOrFail($musteriId);
    $sonNo = Islem::where('user_id', $userId)->max('kullanici_islem_no') ?? 0;

    $toplamEkle = 0;

    foreach ($request->islemler as $index => $islemData) {
        $sonNo++;

        Islem::create([
            'musteri_id' => $musteriId,
            'yapilan_islem' => $islemData['yapilan_islem'],
            'fiyat' => $islemData['fiyat'],
            'user_id' => $userId,
            'kullanici_islem_no' => $sonNo,
        ]);

        $toplamEkle += $islemData['fiyat'];
    }

    // Müşterinin toplam fiyatını güncelle
    $musteri->toplam_fiyat += $toplamEkle;
    $musteri->save();

    return redirect()->route('musteriler.islemler.index', $musteriId)
                     ->with('success', 'Tüm işlemler başarıyla eklendi.');
}



      public function sonIslemler()
{
    $sonIslemler = Islem::where('user_id', auth()->id())
                    ->with('musteri')
                    ->latest()
                    ->take(5)
                    ->get();

    return view('islemler.son_islemler', compact('sonIslemler'));
}


}
