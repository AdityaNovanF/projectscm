<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['name', 'color', 'start_date', 'end_date'];

    public function pemesanan_r()
    {
        return $this->belongsTo('App\Pemesanan', 'pemesanan_id', 'id');
    }
}
