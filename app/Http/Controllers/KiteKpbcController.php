<?php

namespace App\Http\Controllers; 

use Validator;
use Datatables;
use Response;
use Illuminate\Http\Request;
use App\Model\kite_kpbc;

class KiteKpbcController extends Controller
{
    //menyimpan data
    public function store(Request $request)
    {
        $this->validate($request, [
	        'kode_kpbc'	    => 'required|min:5|max:5|numeric',
            'nama_kpbc'		=> 'required|alpha',
            'eselon_kpbc'	=> 'required|min:5|numeric',
            'kota_kpbc'		=> 'required',
    	]);

        $input = $request->all();
        if ($validator->passes())
        {
            $kode   = $request->kode_kpbc;
            $nama   = $request->nama_kpbc;
            $eselon = $request->eselon_kpbc;
            $kota = $request->kota_kpbc;
    
            kite_kpbc::create([
                'kite_kode_kpbc'   => $kode,
                'kite_nama_kpbc'   => $nama,
                'kite_eselon_kpbc' => $eselon,
                'kite_kota_kpbc' => $kota,
                ]);
            return response()->json(['success'=>'1'],200);

        }
        return response()->json(['errors'=>$validator->errors()]);
    }

    //edit
    public function update(Request $request, $id)
    {
        $this->validate($request, [
	        'kode_kpbc'	    => 'required',
            'nama_kpbc'		=> 'required',
            'eselon_kpbc'	=> 'required',
            'kota_kpbc'		=> 'required',
    	]);
        //validasi ID
        $param = kite_kpbc::find($id);
        if ($param == null) {
            return abort(503);
        }

        kite_kpbc::find($id)->update([
            'kite_kode_kpbc'   => $request->kode_kpbc,
            'kite_nama_kpbc'   => $request->nama_kpbc,
            'kite_eselon_kpbc' => $request->eselon_kpbc,
            'kite_kota_kpbc' => $request->kota_kpbc,
        ]);

        return response()->json(['status'=>'success'],200);

        //APABILA KODE DI GENERATE OTOMATIS kode satker dihapus saja
    }

    public function getOne($id)
    {
        return kite_kpbc::find($id);
    }

    //menampilkan data
    public function show()
    {
        $job = kite_kpbc::select('kite_id_kpbc','kite_kode_kpbc','kite_nama_kpbc','kite_eselon_kpbc', 'kite_kota_kpbc');
        return $this->makeDataTable($job);
    }
    //kirim data json
    public function get()
    {
        return kite_kpbc::all();
    }
    //datatables
    public function makeDataTable($data)
    {
        return Datatables::eloquent($data)->addIndexColumn()->make(true);
    }

    //delete
    public function delete($id) {
        $output = kite_kpbc::find($id);
        if($output == null) return abort(503);
        $output->delete();
    }
    
}
