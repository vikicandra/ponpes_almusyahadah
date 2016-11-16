<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Santri extends Model
{
    protected $table = 'santri';
    public $timestamps = false;

    public function index(){
    	return Santri::all();
    }

    public function detailSantri(){
        return $this->hasOne('App\DetailSantri','id_santri', 'id_santri');
    }

    public function orangTua(){
        return $this->hasOne('App\OrangTua', 'id_santri', 'id_santri');
    }

    public function daftar(){
        return $this->hasOne('App\Daftar', 'id_santri', 'id_santri');
    }


    public function santriById($id){
        $santri = Santri::where('id_santri', $id)->get();
        return $santri;
    }

    public function insert($data){
    	$santri = new Santri();
    	$id = $this->generateId($data);
    	$santri->id_santri = $id;
        $santri->nama = $data->input('nama');
        $santri->tempat_lahir = $data->input('tempat_lahir');
        $santri->tgl_lahir = $data->input('tgl_lahir');
        $santri->alamat = $data->input('alamat');
        $santri->jenis_kelamin = $data->input('jk');
        

        if($santri->save()){
           return $id;
        }
        else{
            return false;
        }
    }

    public function deleteSantri($id){
        $santri = Santri::where('id_santri', $id);
        if($santri->delete()){
            return true;
        }else{
            return false;
        }
    }


    public function generateId($data){
    	$dateBorn2 = strtotime($data->input('tgl_lahir'));
    	$dateBorn3 = date("Y",$dateBorn2);

    	$dateIn2 = strtotime($data->input('tgl_masuk'));
    	$dateIn3 = substr(date("Y",$dateIn2), 2, 2);
    	$id =  $dateIn3.$dateBorn3;

    	
    	$getLastIdSantri = DB::select( DB::raw("SELECT * FROM `santri` having (substring(id_santri,1,2) = ".$dateIn3.") order by right(id_santri, 6) desc limit 1"));

    	$idSantri = "";
    	foreach ($getLastIdSantri as $key) {
    		$idSantri = $key->id_santri;
    	}
        if($getLastIdSantri == null)
        	return $id.'01';
        else{        

	    	$endId = (int)substr($idSantri,6,2);
	    	$endId = $endId+1;

	    	if(strlen($endId) == 1)
	    		$endId = strval('0'.$endId);
	    	else
	    		$endId = strval($endId);

	    	return $id.$endId;

        }
    }

    public function editSantri($data){

        $santri = Santri::where('id_santri', $data->id)->get();
        $idSantri = $data->id;
        foreach ($santri as $santri) {
            if(($santri->tgl_masuk != $data->tgl_masuk) || ($santri->tgl_lahir != $data->tgl_lahir) ){
                $idSantri = $this->generateId($data);
                Santri::where('id_santri', $data->id)
                    ->update([
                        'id_santri' => $idSantri
                        ]);
            }
        }


        Santri::where('id_santri', $idSantri)
                ->update([
                    'nama' =>  $data->nama,
                    'alamat' =>  $data->alamat,
                    'tempat_lahir' =>  $data->tempat_lahir,
                    'tgl_lahir' =>  $data->tgl_lahir,
                    'jenis_kelamin' =>  $data->jk
                    ]);

        return $idSantri;
    }



}

