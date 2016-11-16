<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = 'orang_tua';
    public $timestamps = false;

    public function insert($data, $idSantri){
    	$ortu = new OrangTua();
    	$ortu->nama_ayah = $data->input('nama_ayah');
    	$ortu->no_ktp_ayah = $data->input('no_ktp_ayah');
    	$ortu->pendidikan_ayah = $data->input('pendidikan_ayah');
    	$ortu->pekerjaan_ayah = $data->input('pekerjaan_ayah');

    	$ortu->nama_ibu = $data->input('nama_ibu');
    	$ortu->no_ktp_ibu = $data->input('no_ktp_ibu');
    	$ortu->pendidikan_ibu = $data->input('pendidikan_ibu');
    	$ortu->pekerjaan_ibu = $data->input('pekerjaan_ibu');

    	$ortu->penghasilan_ortu = $data->input('penghasilan_ortu');
    	$ortu->alamat_ortu = $data->input('alamat_ortu');

		$ortu->id_santri = $idSantri;  	


    	if($ortu->save())
    		return true;
    	else
    		return false;
    }


    public function editOrtu($data,  $idSantri){
        $ortu = OrangTua::where('id_santri',  $idSantri)
                ->update([
                    'nama_ayah' =>  $data->nama_ayah,
                    'no_ktp_ayah' =>  $data->no_ktp_ayah,
                    'pendidikan_ayah' =>  $data->pendidikan_ayah,
                    'pekerjaan_ayah' =>  $data->pekerjaan_ayah,

                    'nama_ibu' =>  $data->nama_ibu,
                    'no_ktp_ibu' =>  $data->no_ktp_ibu,
                    'pendidikan_ibu' =>  $data->pendidikan_ibu,
                    'pekerjaan_ibu' =>  $data->pekerjaan_ibu,

                    'penghasilan_ortu' =>  $data->penghasilan_ortu,
                    'alamat_ortu' =>  $data->alamat_ortu                
                    ]);

    }
}
