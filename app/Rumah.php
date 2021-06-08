<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $table = 'rumah';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'tipe', 'gambar', 'deskripsi'];

    public function kpr(){
        return $this->hasMany('App/KPR');
    }
}
