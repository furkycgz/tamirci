<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SirketAyar extends Model
{
    protected $table = 'sirket_ayarlar'; // Migration dosyandaki tablo adı bu olmalı
    protected $fillable = ['user_id', 'sirket_adi', 'adres', 'logo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
