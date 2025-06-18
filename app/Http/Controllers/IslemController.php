<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Islem;
use App\Models\Musteri;

class IslemController extends Controller
{
    public function destroy($id)
    {
        $islem = Islem::findOrFail($id);
        $musteri = $islem->musteri;

        // Toplam fiyatı güncelle
        if ($musteri) {
            $musteri->toplam_fiyat -= $islem->fiyat;
            $musteri->save();
        }

        $islem->delete();

        return redirect()->route('musteriler.index')->with('success', 'İşlem başarıyla silindi.');
    }
}
