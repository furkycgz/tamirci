<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SirketAyar;



class AyarController extends Controller
{
   public function edit()
{
    $user = auth()->user();
    $ayar = SirketAyar::where('user_id', $user->id)->first();

    return view('ayar.edit', compact('ayar'));
}


  public function update(Request $request)
{
    $request->validate([
        'sirket_adi' => 'required|string|max:255',
        'adres' => 'nullable|string|max:500',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = auth()->user();

    $ayar = SirketAyar::firstOrNew(['user_id' => $user->id]);

    $ayar->sirket_adi = $request->sirket_adi;
    $ayar->adres = $request->adres;

    if ($request->hasFile('logo')) {
        $path = $request->file('logo')->store('logos', 'public');
        $ayar->logo = $path;
    }

    $ayar->user_id = $user->id;
    $ayar->save();

    return back()->with('success', 'Ayarlar başarıyla güncellendi.');
}


}

