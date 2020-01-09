<?php

namespace App\Http\Controllers;

use Validator;
use Datatables;
use Response;
use Illuminate\Http\Request;
use App\Model\negara;

class kite_negara extends Controller
{
    //menyimpan data
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_negara'	    => 'required|min:2|max:2|alpha',
	        'nama_negara'		=> 'required|min:3|alpha',
        ]);

        $input = $request->all();
        if ($validator->passes())
        {
            $kode   = $request->kode_negara;
            $nama   = $request->nama_negara;
    
            negara::create([
                'kite_kode_negara'   => $kode,
                'kite_nama_negara'        => $nama,
            ]);
    
            return response()->json(['success'=>'1'],200);
        }

        return response()->json(['errors'=>$validator->errors()]);
    }

    //menampilkan data
    public function show()
    {
        $job = negara::select('kite_id_negara','kite_kode_negara','kite_nama_negara');
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
