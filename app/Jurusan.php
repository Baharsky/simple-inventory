<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = [
    	'fakultas_id',
    	'nama_jurusan',
		];

	public function fakultas(){
		return $this->belongsTo('App\Fakultas','fakultas_id');
	} 
}
