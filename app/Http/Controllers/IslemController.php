<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Islem;
use App\Models\Musteri;

class IslemController extends Controller
{
    public function index($musteri_id)
    {
        $musteri = Musteri::findOrFail($musteri_id);
        $islemler = $musteri->islemler;

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
  
}
