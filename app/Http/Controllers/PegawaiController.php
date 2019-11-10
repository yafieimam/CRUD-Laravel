<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pegawai;

class PegawaiController extends Controller
{
    //
	public function index()
    {
    	$pegawai = Pegawai::all();
    	return view('pegawai/pegawai', ['pegawai' => $pegawai]);
    }
	
	public function tambah()
    {
    	return view('pegawai/pegawai_tambah');
    }
	
	public function proses_simpan(Request $request)
    {
    	$this->validate($request,[
    		'nama' => 'required',
			'email' => 'required',
    		'alamat' => 'required',
			'no_telp' => 'required'
    	]);
 
        Pegawai::create([
    		'nama_pegawai' => $request->nama,
			'email_pegawai' => $request->email,
    		'alamat_pegawai' => $request->alamat,
			'no_telp_pegawai' => $request->no_telp,
    	]);
		
    	return redirect('/pegawai')->with('success','Data berhasil Ditambahkan!');
    }
	
	public function edit($id)
	{
	   $pegawai = Pegawai::find($id);
	   return view('pegawai/pegawai_edit', ['pegawai' => $pegawai]);
	}
	
	public function update($id, Request $request)
	{
		$this->validate($request,[
			'nama' => 'required',
			'email' => 'required',
    		'alamat' => 'required',
			'no_telp' => 'required'
		]);
	 
		$pegawai = Pegawai::find($id);
		$pegawai->nama_pegawai = $request->nama;
		$pegawai->email_pegawai = $request->email;
		$pegawai->alamat_pegawai = $request->alamat;
		$pegawai->no_telp_pegawai = $request->no_telp;
		$pegawai->save();
		
		return redirect('/pegawai')->with('success','Data berhasil Diubah!');
	}
	
	public function delete($id)
	{
		$pegawai = Pegawai::find($id);
		$pegawai->delete();
		return redirect('/pegawai')->with('success','Data berhasil Dihapus!');
	}
}
