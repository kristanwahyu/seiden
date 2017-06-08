<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $job = DB::table('tbl_dipa_program')
                ->leftJoin('tbl_dipa_kegiatan', 'tbl_dipa_program.dipa_id_program', '=', 'tbl_dipa_kegiatan.dipa_id_program')
                ->leftJoin('tbl_dipa_output', 'tbl_dipa_kegiatan.dipa_id_kegiatan', '=', 'tbl_dipa_output.dipa_id_kegiatan')
                ->leftJoin('tbl_dipa_sub_output', 'tbl_dipa_output.dipa_id_output', '=', 'tbl_dipa_sub_output.dipa_id_output')
                ->leftJoin('tbl_dipa_komponen','tbl_dipa_sub_output.dipa_id_sub_output', '=', 'tbl_dipa_komponen.dipa_id_sub_output')
                ->leftJoin('tbl_dipa_sub_komponen','tbl_dipa_komponen.dipa_id_komponen', '=', 'tbl_dipa_sub_komponen.dipa_id_komponen')
                ->leftJoin('tbl_dipa_akun','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->groupBy('tbl_dipa_program.dipa_id_program')
                ->groupBy('tbl_dipa_program.dipa_kode_program')
                ->groupBy('tbl_dipa_program.dipa_nama_program')
                ->get([
                    'tbl_dipa_program.dipa_id_program',
                    'tbl_dipa_program.dipa_kode_program',
                    'tbl_dipa_program.dipa_nama_program',
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total, count(tbl_dipa_kegiatan.dipa_id_kegiatan) as count_kegiatan')]);

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::collection($data)->addIndexColumn()->make(true);
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
