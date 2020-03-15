<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SoalsosiologisbmController extends Controller
{
	public function index()
{
    	        // mengambil data dari table 
		$soalsosiologisbm = DB::table('soalsosiologisbm')->SimplePaginate(1);
 		$many_data = DB::table('soalsosiologisbm')->count('*');
    	        // mengirim data pegawai ke view index
		return view('base/soalsosiologisbm',['soalsosiologisbm' => $soalsosiologisbm,'max_number'=>$many_data]);
 
	}
}
