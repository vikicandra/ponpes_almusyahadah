<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;
use Validator;
use App\OrangTua;
use Auth;

class SantriController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){

    	$santri = app('App\Santri')->index();

    	return view('admin/santri', compact("santri"));
    }

    public function cekLogin(){
        if(Auth::user()){
            return redirect()->to('/admin');
        }else{
            return view('welcome');
        }
    }

    public function addNew(){
    	return view('admin/newSantri');
    }

    public function insert(Request $data){       

        $id_santri = app('App\Santri')->insert($data);

        if($id_santri != false){
            $detailSantri = app('App\DetailSantri')->insert($data, $id_santri);
            if($detailSantri){
                $ortu = app('App\OrangTua')->insert($data, $id_santri);
                if($ortu){
                    $daftar = app('App\Daftar')->insert($data, $id_santri);
                    if($daftar){
                        return redirect()->to('/admin');
                    }                    
                }
            }
           
        }else
            echo "gagal";

       
    }

    public function delete($id){
        if(app('App\Santri')->deleteSantri($id)){
            return redirect()->to('/admin');
        }else{
            echo "<script>alert('data santri gagal dihapus')</script>";
            return redirect()->to('/admin');
        }
    }

    public function edit($id){
        $santri = app('App\Santri')->santriById($id);
        $pendidikan = [
            'SD' => 'SD',
            'SMP' => 'SMP',
            'SMA' => 'SMA',
            'Universitas' => 'Universitas',
            'Lainnya' => 'Lainnya'
        ];
        $pendidikanOrtu = [
            'SD' => 'SD',
            'SMP' => 'SMP',
            'SMA' => 'SMA',
            'S1' => 'S1',
            'S2' => 'S2',
            'S3' => 'S3',
            'Lainnya' => 'Lainnya'
        ];

        return view('admin/editSantri', compact("santri", "pendidikan", "pendidikanOrtu"));
    }

    public function editData(Request $data){

        $id_santri = app('App\Santri')->editSantri($data);
        app('App\DetailSantri')->editDetailSantri($data, $id_santri);
        app('App\OrangTua')->editOrtu($data, $id_santri);
        app('App\Daftar')->editDaftar($data, $id_santri);

        return redirect()->to('/admin');
               
    }

    
}

