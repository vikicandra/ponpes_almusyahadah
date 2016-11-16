<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    protected $table = 'daftar';
	public $timestamps = false;

    public function insert($data, $idSantri){
    	$daftar = new Daftar();
        

        $daftar->tgl_masuk = $data->input('tgl_masuk');
    	$daftar->id_santri = $idSantri;

    	if($daftar->save())
    		return true;
    	else
    		return false;
    }

    public function editDaftar($data,  $idSantri){

        $daftar = Daftar::where('id_santri',  $idSantri)
                ->update(['tgl_masuk' =>  $data->tgl_masuk]);

    }
}
