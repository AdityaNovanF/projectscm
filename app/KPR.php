<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KPR extends Model
{
    protected $table = "kpr";
	protected $primaryKey = "id";
    protected $fillable = ['name','alamat','fotoKK','fotoKTP','gaji','id_rumah'];

    public function rumah(){
        return $this->belongsTo('App/Rumah');
    }
}
