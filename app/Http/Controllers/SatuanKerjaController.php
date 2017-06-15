<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;
use App\Model\DipaSatKer;

class SatuanKerjaController extends Controller
{
    //
    public function store(Request $request)
    {
        $this->validate($request, [
	        'kode_satKer'	    => 'required|min:5|max:15',
	        'nama_satKer'		=> 'required',
            'status'            => 'required',
    	]);

        $kode   = $request->kode_satKer;
        $nama   = $request->nama_satKer;
        $status = $request->status;

        DipaSatker::create([
            'dipa_kode_satuan_kerja'   => $kode,
            'dipa_satuan_kerja'        => $nama,
            'dipa_satuan_kerja_status' => $status, 
        ]);

        return response()->json(["status"=>"success"],200);
    }

    // public function codeGenerate()
    // {
    //     //cek kode
    //     $param = DipaSatker::all()->count();
    //     if ($param == 0) {
    //         $code = 'ST00001';
    //     } else {
    //         $last_code = DipaSatker::select('dipa_kode_satuan_kerja')->orderBy('dipa_id_satuan_kerja','desc')->first();
    //         $temp_code = substr($last_code->dipa_kode_satuan_kerja, 2);
    //         $number = (int)$temp_code;
    //         $number++;
    //         $number = sprintf("%'.05d", $number);
    //         $code = 'ST'.$number;
    //     }

    //     return $code;
    // }
    
    public function show()
    {
        $job = DipaSatker::select('dipa_id_satuan_kerja','dipa_kode_satuan_kerja','dipa_satuan_kerja','dipa_satuan_kerja_status');
        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::eloquent($data)->addIndexColumn()->make(true);
    }

    public function getOne($id)
    {
        return DipaSatker::find($id);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_satKer'	    => 'required|min:5|max:15',
	        'nama_satKer'		=> 'required',
            'status'            => 'required',
    	]);
        //validasi ID
        $param = DipaSatker::find($id);
        if ($param == null) {
            return abort(503);
        }

        DipaSatker::find($id)->update([
            'dipa_kode_satuan_kerja'   => $request->kode_satKer,
            'dipa_satuan_kerja'        => $request->nama_satKer,
            'dipa_satuan_kerja_status' => $request->status 
        ]);

        return response()->json(['status'=>'success'],200);

        //APABILA KODE DI GENERATE OTOMATIS kode satker dihapus saja
    }

    public function getAll()
    {
        return DipaSatker::select('dipa_id_satuan_kerja', 'dipa_kode_satuan_kerja','dipa_satuan_kerja')
            ->where('dipa_satuan_kerja_status','1')
            ->orderBy('dipa_kode_satuan_kerja','asc')
            ->get();
    }
    public function get()
    {
        return DipaSatker::all();
    }
}
