<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Santri;
use Auth;

class SuratIzin extends Model
{
	protected $table = 'suratizin';
    public $timestamps = false;

     public function santri(){
        return $this->belongsTo('App\Santri','id_santri', 'id_santri');
    }

    public function allSuratIzin(){
    	$santri = SuratIzin::all();
    	return $santri;
    }

    public function suratizinById($id){
        $suratizinById = SuratIzin::where('id_surat_izin', $id)->get();
        return $suratizinById;
    }

    public function insert($data){
    	$suratizin = new SuratIzin();
    	$suratizin->id_santri = substr($data->input('id_santri'), -9  , -1);
    	$suratizin->tgl_awal = $data->input('tgl_awal');
    	$suratizin->tgl_akhir = $data->input('tgl_akhir');
    	$suratizin->id_admin = Auth::user()->id;
    	$suratizin->keterangan = $data->input('keterangan');;


    	if($suratizin->save())
    		return true;
    	else
    		return false;
    }


}
