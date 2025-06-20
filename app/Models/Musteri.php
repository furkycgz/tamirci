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
    ];

    public function islemler()
    {
        return $this->hasMany(Islem::class, 'musteri_id');
    }

    public function modelGecmisi()
{
    return $this->hasMany(ModelGecmisi::class);
}
  

  public function aracGecmisleri()
{
    return $this->hasMany(AracGecmisi::class);
}
}
