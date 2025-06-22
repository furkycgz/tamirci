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
        'yapilan_islem' => 'required|string',
        'fiyat' => 'required|numeric',
    ]);

    Islem::create([
        'musteri_id' => $musteriId,
        'yapilan_islem' => $request->yapilan_islem,
        'fiyat' => $request->fiyat,
    ]);

    return redirect()->route('musteriler.islemler.index', $musteriId)
                     ->with('success', 'İşlem başarıyla eklendi.');
}

       public function sonIslemler()
    {
        $sonIslemler = Islem::with('musteri')
                        ->latest()
                        ->take(5)
                        ->get();

        return view('islemler.son_islemler', compact('sonIslemler'));
    }


}
