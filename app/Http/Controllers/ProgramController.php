<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaProgram;
use App\Model\DipaSatKer;
use App\Model\DipaTahunAnggaran;

class ProgramController extends Controller
{
    //
    public function showPage()
    {   
        $id_satker = Auth::user()->dipa_id_satuan_kerja;
        $data['satker'] = DipaSatker::select('dipa_id_satuan_kerja','dipa_kode_satuan_kerja','dipa_satuan_kerja','dipa_satuan_kerja_status')
            ->where('dipa_id_satuan_kerja',$id_satker)->first();
        $data['tahun'] = DipaTahunAnggaran::where('dipa_status','1')->first();
        return view('pages.satker.dipa_program',$data);
    }

    public function show()
    {
        $id_satker = Auth::user()->dipa_id_satuan_kerja;
        $job = DipaProgram::with('tahun', 'satuanKerja','kegiatan')
            ->whereHas('tahun', function($q){
                return $q->where('dipa_status','1');
            })
            ->where('dipa_id_satuan_kerja',$id_satker);

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::eloquent($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
	        'id_satker'	    => 'required',
            'id_tahun'      => 'required',
            'kode_program' => 'required',
            'nama_program'  => 'required',
    	]);

        DipaProgram::create([
            'dipa_kode_program'      => $request->kode_program,
            'dipa_nama_program'      => $request->nama_program,
            'dipa_id_tahun_anggaran' => $request->id_tahun,
            'dipa_id_satuan_kerja'   => $request->id_satker,
        ]);

        return response()->json(["status"=>"success"],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_program' => 'required',
            'nama_program'  => 'required',
    	]);
        $program = DipaProgram::find($id);
        if($program == null) return abort(503);

        $program->update([
            'dipa_kode_program'      => $request->kode_program,
            'dipa_nama_program'      => $request->nama_program,
        ]);

        return response()->json(["status"=>"success"],200);
    }
    public function getOne($id)
    {
        return DipaProgram::where('dipa_id_program',$id)->first();
    }

    public function delete($id)
    {
        DipaProgram::find($id)->delete();
    }
}
