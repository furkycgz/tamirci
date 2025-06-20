<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelGecmisi extends Model
{
    protected $table = 'model_gecmisleri';
    protected $fillable = ['musteri_id', 'model'];

    public function musteri()
    {
        return $this->belongsTo(Musteri::class);
    }
}
