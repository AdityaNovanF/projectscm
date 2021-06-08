<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KritikSaran extends Model
{
    protected $table = "kritikSaran";
	protected $primaryKey = "id";
    protected $fillable = ['nama','isi'];
}
