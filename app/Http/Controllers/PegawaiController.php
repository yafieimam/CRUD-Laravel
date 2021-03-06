<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Yajra\Datatables\Datatables;
use Redirect,Response;

class PegawaiController extends Controller
{
    //
	public function index(Request $request)
    {	
		if ($request->ajax()) {
            $data = Pegawai::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_pegawai.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPegawai">Ubah</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_pegawai.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePegawai">Hapus</a>';
                           return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('pegawai/pegawai',compact('pegawai'));
		//return view('pegawai/pegawai');
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
		Pegawai::updateOrCreate(['id_pegawai' => $request->id_pegawai],
                ['nama_pegawai' => $request->nama, 'email_pegawai' => $request->email, 
				'alamat_pegawai' => $request->alamat, 'no_telp_pegawai' => $request->no_telp]);        
   
        return response()->json(['success'=>'Product saved successfully.']);
	}
	
	public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return response()->json($pegawai);
    }
	
	public function destroy($id)
    {
        Pegawai::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
