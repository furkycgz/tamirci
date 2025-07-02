<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Islem;

class DashboardController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

  public function index()
{
    $userId = auth()->id();

    $sonIslemler = Islem::where('user_id', $userId)
        ->whereHas('musteri', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->with('musteri')
        ->latest()
        ->take(5)
        ->get();

    return view('dashboard', compact('sonIslemler'));
}



}
