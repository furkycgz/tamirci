<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musteri extends Model
{
    use HasFactory;

    protected $table = 'musteriler';

    protected $fillable = [
        'ad_soyad',
        'telefon',
        'plaka',
        'model',
        'user_id',
    ];

    public function islemler()
    {
        return $this->hasMany(Islem::class, 'musteri_id');
    }

    public function odemeler()
    {
        return $this->hasMany(Odeme::class, 'musteri_id');
    }

    public function toplamBorc()
    {
        return $this->islemler->sum('fiyat');
    }

    public function toplamOdeme()
    {
        return $this->odemeler->sum('tutar');
    }

    public function kalanBorc()
    {
        return $this->toplamBorc() - $this->toplamOdeme();
    }
    public function aracGecmisleri()
{
    return $this->hasMany(\App\Models\AracGecmisi::class);
}

}
