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
	        'kode_satKer'	    => 'required|min:7|max:8',
	        'nama_satKer'		=> 'required',
            'status'            => 'required',
    	]);

        $kode   = $request->kode_satKer;
        $nama   = $request->nama_satKer;
        $status = $request->status;

        DipaSatker::create([
            'dipa_kodeSK'   => $kode,
            'dipa_namaSK'   => $nama,
            'dipa_statusSK' => $status, 
        ]);

        return response()->json(["status"=>"success"],200);
    }

    public function codeGenerate()
    {
        //cek kode
        $param = DipaSatker::all()->count();
        if ($param == 0) {
            $code = 'ST00001';
        } else {
            $last_code = DipaSatker::select('dipa_kodeSK')->orderBy('dipa_idSK','desc')->first();
            $temp_code = substr($last_code->dipa_kodeSK, 2);
            $number = (int)$temp_code;
            $number++;
            $number = sprintf("%'.05d", $number);
            $code = 'ST'.$number;
        }

        return $code;
    }
    
    public function show()
    {
        $job = DipaSatker::select('dipa_idSK','dipa_kodeSK','dipa_namaSK','dipa_statusSK');
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
	        'nama_satKer'		=> 'required',
            'status'            => 'required',
    	]);
        //validasi ID
        $param = DipaSatker::find($id);
        if ($param == null) {
            return abort(503);
        }

        DipaSatker::find($id)->update([
            'dipa_namaSK'   => $request->nama_satKer,
            'dipa_statusSK' => $request->status 
        ]);

        return response()->json(['status'=>'success'],200);
    }
}
