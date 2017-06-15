<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaKegiatan;
use App\Model\DipaOutput;

class OutputController extends Controller
{
    //
    public function showPage($id)
    {   
        $data = DipaKegiatan::with(array('program' => function($q){
               $q->with('tahun','satuanKerja'); 
            }))
            ->where('dipa_id_kegiatan',$id)->first();

        $data['total'] = DB::table('tbl_dipa_kegiatan')
                ->leftJoin('tbl_dipa_output', 'tbl_dipa_kegiatan.dipa_id_kegiatan', '=', 'tbl_dipa_output.dipa_id_kegiatan')
                ->leftJoin('tbl_dipa_sub_output', 'tbl_dipa_output.dipa_id_output', '=', 'tbl_dipa_sub_output.dipa_id_output')
                ->leftJoin('tbl_dipa_komponen','tbl_dipa_sub_output.dipa_id_sub_output', '=', 'tbl_dipa_komponen.dipa_id_sub_output')
                ->leftJoin('tbl_dipa_sub_komponen','tbl_dipa_komponen.dipa_id_komponen', '=', 'tbl_dipa_sub_komponen.dipa_id_komponen')
                ->leftJoin('tbl_dipa_akun','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->where('tbl_dipa_kegiatan.dipa_id_kegiatan',$id)
                ->first([
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total')
                    ]);
        // return $data;
        return view('pages.satker.dipa_output',$data);
    }

    public function show($id_kegiatan)
    {
        $job = DB::table('tbl_dipa_output')
                ->leftJoin('tbl_dipa_kegiatan', 'tbl_dipa_kegiatan.dipa_id_kegiatan', '=', 'tbl_dipa_output.dipa_id_kegiatan')
                ->leftJoin('tbl_dipa_sub_output', 'tbl_dipa_output.dipa_id_output', '=', 'tbl_dipa_sub_output.dipa_id_output')
                ->leftJoin('tbl_dipa_komponen','tbl_dipa_sub_output.dipa_id_sub_output', '=', 'tbl_dipa_komponen.dipa_id_sub_output')
                ->leftJoin('tbl_dipa_sub_komponen','tbl_dipa_komponen.dipa_id_komponen', '=', 'tbl_dipa_sub_komponen.dipa_id_komponen')
                ->leftJoin('tbl_dipa_akun','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->groupBy('tbl_dipa_output.dipa_id_output','tbl_dipa_output.dipa_kode_output','tbl_dipa_output.dipa_nama_output')
                ->where('tbl_dipa_kegiatan.dipa_id_kegiatan', $id_kegiatan)
                ->get([
                    'tbl_dipa_output.dipa_id_output',
                    'tbl_dipa_output.dipa_kode_output',
                    'tbl_dipa_output.dipa_nama_output',
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total, count(tbl_dipa_sub_output.dipa_id_sub_output) as count_sub_output')]);

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::collection($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kegiatan'      => 'required',
            'kode_output' => 'required',
            'nama_output'  => 'required',
    	]);

        DipaOutput::create([
            'dipa_kode_output'      => $request->kode_output,
            'dipa_nama_output'      => $request->nama_output,
            'dipa_id_kegiatan' => $request->id_kegiatan,
        ]);

        return response()->json(["status"=>"success"],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_output' => 'required',
            'nama_output'  => 'required',
    	]);
        $output = DipaOutput::find($id);
        if($output == null) return abort(503);

        $output->update([
            'dipa_kode_output'      => $request->kode_output,
            'dipa_nama_output'      => $request->nama_output,
        ]);

        return response()->json(["status"=>"success"],200);
    }
    public function getOne($id)
    {
        return DipaOutput::where('dipa_id_output',$id)->first();
    }

    public function delete($id)
    {
        $output = DipaOutput::find($id);
        if($output == null) return abort(503);
        $output->delete();
    }
    public function get($id_kegiatan)
    {
        return DipaOutput::where('dipa_id_kegiatan',$id_kegiatan)->get();
    }
}
