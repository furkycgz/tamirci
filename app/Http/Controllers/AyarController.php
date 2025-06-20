<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ayar;



class AyarController extends Controller
{
    public function edit()
    {
        $ayar = Ayar::first(); // İlk ayar kaydını al (tek bir tane olacak zaten)
        return view('ayar.edit', compact('ayar'));
    }

   public function update(Request $request)
{
    $request->validate([
        'sirket_adi' => 'required',
        'adres' => 'required',
        'logo' => 'nullable|image|max:2048',
    ]);

    $ayar = Ayar::first();

    // Eğer hiç ayar kaydı yoksa oluştur
    if (!$ayar) {
        $ayar = new Ayar();
    }

    // Logo varsa yükle
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('logos', 'public');
        $ayar->logo = 'storage/' . $logoPath;
    }

    $ayar->sirket_adi = $request->sirket_adi;
    $ayar->adres = $request->adres;
    $ayar->save();

    return redirect()->route('ayar.edit')->with('success', 'Ayarlar güncellendi.');
}

}

