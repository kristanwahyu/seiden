<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaProgram;
use App\Model\DipaKegiatan;

class KegiatanController extends Controller
{
    public function showPage($id)
    {   
        $data = DipaProgram::with('tahun','satuanKerja')
            ->where('dipa_id_program',$id)->first();
        $data['total'] = DB::table('tbl_dipa_program')
                ->leftJoin('tbl_dipa_kegiatan', 'tbl_dipa_program.dipa_id_program', '=', 'tbl_dipa_kegiatan.dipa_id_program')
                ->leftJoin('tbl_dipa_output', 'tbl_dipa_kegiatan.dipa_id_kegiatan', '=', 'tbl_dipa_output.dipa_id_kegiatan')
                ->leftJoin('tbl_dipa_sub_output', 'tbl_dipa_output.dipa_id_output', '=', 'tbl_dipa_sub_output.dipa_id_output')
                ->leftJoin('tbl_dipa_komponen','tbl_dipa_sub_output.dipa_id_sub_output', '=', 'tbl_dipa_komponen.dipa_id_sub_output')
                ->leftJoin('tbl_dipa_sub_komponen','tbl_dipa_komponen.dipa_id_komponen', '=', 'tbl_dipa_sub_komponen.dipa_id_komponen')
                ->leftJoin('tbl_dipa_akun','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->where('tbl_dipa_program.dipa_id_program',$id)
                ->first([
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total')
                    ]);
        return view('pages.satker.dipa_kegiatan',$data);
    }

    public function show($id_program)
    {
         $job = DB::table('tbl_dipa_program')
                ->leftJoin('tbl_dipa_kegiatan', 'tbl_dipa_program.dipa_id_program', '=', 'tbl_dipa_kegiatan.dipa_id_program')
                ->leftJoin('tbl_dipa_output', 'tbl_dipa_kegiatan.dipa_id_kegiatan', '=', 'tbl_dipa_output.dipa_id_kegiatan')
                ->leftJoin('tbl_dipa_sub_output', 'tbl_dipa_output.dipa_id_output', '=', 'tbl_dipa_sub_output.dipa_id_output')
                ->leftJoin('tbl_dipa_komponen','tbl_dipa_sub_output.dipa_id_sub_output', '=', 'tbl_dipa_komponen.dipa_id_sub_output')
                ->leftJoin('tbl_dipa_sub_komponen','tbl_dipa_komponen.dipa_id_komponen', '=', 'tbl_dipa_sub_komponen.dipa_id_komponen')
                ->leftJoin('tbl_dipa_akun','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->groupBy('tbl_dipa_kegiatan.dipa_id_kegiatan')
                ->groupBy('tbl_dipa_kegiatan.dipa_kode_kegiatan')
                ->groupBy('tbl_dipa_kegiatan.dipa_nama_kegiatan')
                ->where('tbl_dipa_program.dipa_id_program', $id_program)
                ->get([
                    'tbl_dipa_kegiatan.dipa_id_kegiatan',
                    'tbl_dipa_kegiatan.dipa_kode_kegiatan',
                    'tbl_dipa_kegiatan.dipa_nama_kegiatan',
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total, count(tbl_dipa_output.dipa_id_output) as count_output')]);

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::collection($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_program'      => 'required',
            'kode_kegiatan' => 'required',
            'nama_kegiatan'  => 'required',
    	]);

        DipaKegiatan::create([
            'dipa_kode_kegiatan'      => $request->kode_kegiatan,
            'dipa_nama_kegiatan'      => $request->nama_kegiatan,
            'dipa_id_program' => $request->id_program,
        ]);

        return response()->json(["status"=>"success"],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_kegiatan' => 'required',
            'nama_kegiatan'  => 'required',
    	]);
        $kegiatan = DipaKegiatan::find($id);
        if($kegiatan == null) return abort(503);

        $kegiatan->update([
            'dipa_kode_kegiatan'      => $request->kode_kegiatan,
            'dipa_nama_kegiatan'      => $request->nama_kegiatan,
        ]);

        return response()->json(["status"=>"success"],200);
    }
    public function getOne($id)
    {
        return DipaKegiatan::where('dipa_id_kegiatan',$id)->first();
    }

    public function delete($id)
    {
        $kegiatan = DipaKegiatan::find($id);
        if($kegiatan == null) return abort(503);
        $kegiatan->delete();
    }
}
