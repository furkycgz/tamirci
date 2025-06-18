<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;





use Illuminate\Database\Eloquent\Factories\HasFactory;


class Islem extends Model
{
    use HasFactory;

    protected $table = 'islemler';

    protected $fillable = [
        'musteri_id',
        'yapilan_islem',
        'fiyat',
    ];

    public function musteri()
    {
        return $this->belongsTo(Musteri::class, 'musteri_id');
    }
}
