<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ruangan;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['id_ruangan', 'nama_barang', 'total', 'broken', 'foto_bar', 'created_by', 'updated_by'];

    public function ruangan()
    {
    	return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }
       public function user_c(){
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
    public function user_u(){
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }
}
