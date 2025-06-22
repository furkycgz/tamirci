<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Islem;

class DashboardController extends Controller
{
    public function index()
    {
        $sonIslemler = Islem::with('musteri')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('sonIslemler'));
    }
}
