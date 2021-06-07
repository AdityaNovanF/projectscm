<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    protected $table = 'faktur';

    public function pesanan_r()
    {
        return $this->belongsTo('App\Pesanan', 'pesanan_id', 'id');
    }
}
