<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $table = 'rumah';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'tipe', 'gambar', 'deskripsi','id_kper'];

    public function kpr(){
        return $this->hasMany('App/KPR');
    }
    public function users(){
        return $this->belongsTo('App/User');
    }
}
