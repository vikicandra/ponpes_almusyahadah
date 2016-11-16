<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class DetailSantri extends Model
{
	protected $table = 'detail_santri';
	public $timestamps = false;

    public function validPhoto($data){
        if($data->hasFile('img')){
            $file = $data->file('img');
            $fileName = $file->getClientOriginalName();
            $destinationPath = config('app.fileDestinationPath').'/'.$fileName;
            $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

            return $namaFoto = $fileName;
        }else{
             
             return $namaFoto = "";
        }
    }
    

    public function insert($data, $idSantri){
    	$detailSantri = new DetailSantri();

        $namaFoto = $this->validPhoto($data);
        
        $detailSantri->no_telpon = $data->input('no_telp');
    	$detailSantri->golongan_darah = $data->input('gol_darah');
    	$detailSantri->jenjang_pendidikan = $data->input('pendidikan');
    	$detailSantri->nama_tempat_pendidikan = $data->input('tempat_pendidikan');
    	$detailSantri->penyakit = $data->input('penyakit');
    	$detailSantri->id_santri = $idSantri;
        $detailSantri->foto = $namaFoto;

    	if($detailSantri->save())
    		return true;
    	else
    		return false;
    }


    public function editDetailSantri($data, $idSantri){

        $fotoSantri = DetailSantri::where('id_santri',  $idSantri)->first();
        if($data->hasFile('img')){
            unlink(public_path().'/img/'.$fotoSantri->foto);
            $namaFoto = $this->validPhoto($data);
        }else{
            $namaFoto = $fotoSantri->foto;

        }   


        $detailSantri = DetailSantri::where('id_santri',  $idSantri)
                ->update([
                    'no_telpon' =>  $data->no_telp,
                    'golongan_darah' =>  $data->gol_darah,
                    'jenjang_pendidikan' =>  $data->pendidikan,
                    'nama_tempat_pendidikan' =>  $data->tempat_pendidikan,
                    'penyakit' =>  $data->penyakit,
                    'foto' => $namaFoto
                    ]);


    }


}
