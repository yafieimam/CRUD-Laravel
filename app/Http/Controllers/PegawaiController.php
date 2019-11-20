<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Yajra\Datatables\Datatables;
use Redirect,Response;

class PegawaiController extends Controller
{
    //
	public function index()
    {
    	if(request()->ajax()) {
			return datatables()->of(Pegawai::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
		}
		return view('pegawai/pegawai');
		
		
    }
	
	public function json(){
        return Datatables::of(Pegawai::all())->make(true);
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
	
	//public function edit($id)
	//{
	//   $pegawai = Pegawai::find($id);
	//   return view('pegawai/pegawai_edit', ['pegawai' => $pegawai]);
	//}
	
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
	
	public function dataPegawai()
	{
		return Datatables::of(Pegawai::query())->make(true);
	}
	
	public function store(Request $request)
	{  
		$pegawaiId = $request->pegawai_id;
		$pegawai   = Pegawai::updateOrCreate(['id_pegawai' => $pegawaiId],
					['nama_pegawai' => $request->nama, 'email_pegawai' => $request->email,
					'alamat_pegawai' => $request->alamat, 'no_telp_pegawai' => $request->no_telp]);        
		return Response::json($pegawai);
	}
	
	public function edit($id)
	{   
		$where = array('id_pegawai' => $id);
		$pegawai  = Pegawai::where($where)->first();
	 
		return Response::json($pegawai);
	}
	
	public function destroy($id)
	{
		$pegawai = Pegawai::where('id_pegawai',$id)->delete();
	 
		return Response::json($pegawai);
	}
}
