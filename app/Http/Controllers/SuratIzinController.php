<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use PDF;

class SuratIzinController extends Controller
{
    protected $table = 'santri';

    public function allSantri(){
    	$suratizin = app('App\SuratIzin')->allSuratIzin();
    	return view('suratizin', compact("suratizin"));
    }

    public function addNew(){
    	$santri = app('App\Santri')->index();

        if(count($santri) != 0){
            return view('newSuratIzin', compact("santri"));
        }else{
            echo "<script>alert('Maaf, data santri belum ada')</script>";
            return $this->allSantri();
        }
    	
    }

    public function insert(Request $data){
    	$addSuratizin = app('App\SuratIzin')->insert($data);
    	if($addSuratizin){
    		return redirect()->to('/admin/suratizin');
    	}
    }

    public function printSuratIzin($id){
        $suratizinById = app('App\SuratIzin')->suratizinById($id);
    	$suratizin = PDF::loadView('suratizinframe', compact('suratizinById'));
    	return $suratizin->download('suratizin.pdf');
    }


}
