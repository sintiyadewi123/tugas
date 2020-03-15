<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SoalbindosmaController extends Controller
{
public function index()
	{
    	        // mengambil data dari table 
		$soalbindosma = DB::table('soalbindosma')->SimplePaginate(1);
 		$many_data = DB::table('soalbindosma')->count('*');
    	        // mengirim data pegawai ke view index
		return view('base/soalbindosma',['soalbindosma' => $soalbindosma,'max_number'=>$many_data]);
 
	}
}
