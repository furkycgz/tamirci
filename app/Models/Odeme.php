<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odeme extends Model
{
    use HasFactory;

    protected $table = 'odemeler';

    protected $fillable = [
        'musteri_id',
        'tutar',
        'aciklama',
    ];

    public function musteri()
    {
        return $this->belongsTo(Musteri::class, 'musteri_id');
    }
}
