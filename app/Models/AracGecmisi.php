<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AracGecmisi extends Model
{
   protected $table = 'arac_gecmisis';

    protected $fillable = ['musteri_id', 'model', 'plaka'];

    public function musteri()
    {
        return $this->belongsTo(Musteri::class);
    }
}
