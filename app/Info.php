<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = "info";
	protected $primaryKey = "id";
    protected $fillable = ['id_kper','judul','konten'];
}
