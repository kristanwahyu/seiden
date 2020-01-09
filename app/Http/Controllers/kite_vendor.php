<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;
use App\Model\vendor;
use App\Model\negara;

class kite_vendor extends Controller
{
    //menyimpan data
    public function store(Request $request)
    {
        $this->validate($request, [
	        'kode_negara'	    => 'required|min:2|max:2',
	        'nama_negara'		=> 'required|min:3',
        ]);

        $kode   = $request->kode_negara;
        $nama   = $request->nama_negara;

        negara::create([
            'kite_kode_negara'   => $kode,
            'kite_nama_negara'        => $nama,
        ]);

        return response()->json(["status"=>"success"],200);
    }

    //menampilkan data
    public function show()
    {
        $job = vendor::select('*');
        return Datatables::eloquent($job)->addIndexColumn()->make(true);
    }
    //kirim data json
    public function get()
    {
        return negara::all();
    }
    public function getOne($id)
    {
        return negara::find($id);
    }
    public function negara(Request $request)
    {
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = negara::select("kite_id_negara","kite_nama_negara")
            		->where('kite_nama_negara','LIKE',"%$search%")
            		->get();
        }

        return response()->json($data);
   }
    
    //datatables
    public function makeDataTable($data)
    {
        return Datatables::eloquent($data)->addIndexColumn()->make(true);
    }
    //edit
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_negara'	    => 'required',
	        'nama_negara'		=> 'required',
    	]);
        //validasi ID
        $param = negara::find($id);
        if ($param == null) {
            return abort(503);
        }

        negara::find($id)->update([
            'kite_kode_negara'   => $request->kode_negara,
            'kite_nama_negara'        => $request->nama_negara,
        ]);

        return response()->json(['status'=>'success'],200);

        //APABILA KODE DI GENERATE OTOMATIS kode satker dihapus saja
    }

    //delete
    public function delete($id) {
        $output = negara::find($id);
        if($output == null) return abort(503);
        $output->delete();
    }
}
