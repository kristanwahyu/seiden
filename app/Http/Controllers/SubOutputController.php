<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaOutput;
use App\Model\DipaSubOutput;

class SubOutputController extends Controller
{
    //
    public function showPage($id)
    {   
        $data = DipaOutput::with(array('kegiatan' => function($q){
               $q->with(array('program' =>function ($p){
                    $p->with('tahun','satuanKerja');
               }));
            }))
            ->where('dipa_id_output',$id)->first();
        $data['total'] = DB::table('tbl_dipa_output')
                ->leftJoin('tbl_dipa_sub_output', 'tbl_dipa_output.dipa_id_output', '=', 'tbl_dipa_sub_output.dipa_id_output')
                ->leftJoin('tbl_dipa_komponen','tbl_dipa_sub_output.dipa_id_sub_output', '=', 'tbl_dipa_komponen.dipa_id_sub_output')
                ->leftJoin('tbl_dipa_sub_komponen','tbl_dipa_komponen.dipa_id_komponen', '=', 'tbl_dipa_sub_komponen.dipa_id_komponen')
                ->leftJoin('tbl_dipa_akun','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->where('tbl_dipa_output.dipa_id_output',$id)
                ->first([
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total')
                    ]);
        // return $data;
        return view('pages.satker.dipa_suboutput',$data);
    }

    public function show($id_output)
    {
        $job = DB::table('tbl_dipa_sub_output')
                ->leftJoin('tbl_dipa_output', 'tbl_dipa_output.dipa_id_output', '=', 'tbl_dipa_sub_output.dipa_id_output')
                ->leftJoin('tbl_dipa_komponen','tbl_dipa_sub_output.dipa_id_sub_output', '=', 'tbl_dipa_komponen.dipa_id_sub_output')
                ->leftJoin('tbl_dipa_sub_komponen','tbl_dipa_komponen.dipa_id_komponen', '=', 'tbl_dipa_sub_komponen.dipa_id_komponen')
                ->leftJoin('tbl_dipa_akun','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->groupBy('tbl_dipa_sub_output.dipa_id_sub_output')
                ->groupBy('tbl_dipa_sub_output.dipa_kode_sub_output')
                ->groupBy('tbl_dipa_sub_output.dipa_nama_sub_output')
                ->where('tbl_dipa_output.dipa_id_output', $id_output)
                ->get([
                    'tbl_dipa_sub_output.dipa_id_sub_output',
                    'tbl_dipa_sub_output.dipa_kode_sub_output',
                    'tbl_dipa_sub_output.dipa_nama_sub_output',
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total, count(tbl_dipa_komponen.dipa_id_komponen) as count_komponen')]);

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::collection($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_output'      => 'required',
            'kode_sub_output' => 'required',
            'nama_sub_output'  => 'required',
    	]);

        DipaSubOutput::create([
            'dipa_kode_sub_output'      => $request->kode_sub_output,
            'dipa_nama_sub_output'      => $request->nama_sub_output,
            'dipa_id_output' => $request->id_output,
        ]);

        return response()->json(["status"=>"success"],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_sub_output' => 'required',
            'nama_sub_output'  => 'required',
    	]);
        $output = DipaSubOutput::find($id);
        if($output == null) return abort(503);

        $output->update([
            'dipa_kode_sub_output'      => $request->kode_sub_output,
            'dipa_nama_sub_output'      => $request->nama_sub_output,
        ]);

        return response()->json(["status"=>"success"],200);
    }
    public function getOne($id)
    {
        return DipaSubOutput::where('dipa_id_sub_output',$id)->first();
    }

    public function delete($id)
    {
        $output = DipaSubOutput::find($id);
        if($output == null) return abort(503);
        $output->delete();
    }
}
