<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = ['id', 'jumlah', 'total', 'stock'];

    public function barang_r()
    {
        return $this->belongsTo('App\Barang', 'barang_id', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
