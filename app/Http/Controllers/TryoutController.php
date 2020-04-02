<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelTryout;
use App\ModelSoal;
use Illuminate\Support\Facades\Validator;

class TryoutController extends Controller
{

    public function index(){
        $data = ModelTryout::all();
        return view('dashboard_admin.daftarTryout', compact('data'));
    }

    public function tambah(){
        return view('dashboard_admin.tambahTryout');
    }

    public function lihatSoal($id){
        $data = ModelSoal::where('id_to', $id)->get();
        $datas = ModelTryout::where('id', $id)->get();
        return view('dashboard_admin.daftarSoal', compact('data', 'datas'));   
    }

    public function tryoutSD(){
        $bind = ModelTryout::where('kategori', 'SD')->where('mata_pelajaran', 'Bahasa Indonesia')->get();
        $ipa = ModelTryout::where('kategori', 'SD')->where('mata_pelajaran', 'IPA')->get();
        $mat = ModelTryout::where('kategori', 'SD')->where('mata_pelajaran', 'Matematika')->get();
        $bing = ModelTryout::where('kategori', 'SD')->where('mata_pelajaran', 'Bahasa Inggris')->get();
        return view('base.sd', compact('bind', 'ipa', 'mat', 'bing'));   
    }

    public function soal($id){
        $data = ModelSoal::where('id_to', $id)->SimplePaginate(1);
        $many_data = ModelSoal::where('id_to', $id)->count();
		return view('base/soal',['data' => $data,'max_number'=>$many_data]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
            'nama' => 'required',
            'jumlah_soal' => 'required',
            'kategori' => 'required',
            ]
        );
        $data = new ModelTryout();
        $data->nama = $request->nama;
        $data->jumlah_soal = $request->jumlah_soal;
        $data->kategori = $request->kategori;
        $data->mata_pelajaran = $request->mata_pelajaran;
        $data->save();
        return redirect()->route('tambahSoal', $data->id);
    }

    public function edit($id)
    {
        $data = ModelTryout::where('id','=',$id)->get();
        return view('dashboard_admin.editTryout', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelTryout::where('id',$id)->first();
        $data->nama = $request->nama;
        $data->jumlah_soal = $request->jumlah_soal;
        $data->kategori = $request->kategori;
        $data->save();
        return redirect('daftarTryout')->withMessage('Berhasil Konfirmasi');    
    }

    public function destroy($id)
    {
        $data = ModelTryout::where('id',$id)->first();
        $data->delete();
        return redirect()->route('daftarTryout')->with('destroy','Yakin ingin menghapus data?'); 
    }


}
