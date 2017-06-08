<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaKomponen;
use App\Model\DipaSubOutput;

class KomponenController extends Controller
{
    //
    public function showPage($id)
    {   
        $data = DipaSubOutput::with(array('output' => function($o){
                $o->with(array('kegiatan' => function($q){
                    $q->with(array('program' =>function ($p){
                        $p->with('tahun','satuanKerja');
                    }));
                }));
            }))
            ->where('dipa_id_sub_output',$id)->first();

        $data['total'] = DB::table('tbl_dipa_sub_output')
                ->leftJoin('tbl_dipa_komponen','tbl_dipa_sub_output.dipa_id_sub_output', '=', 'tbl_dipa_komponen.dipa_id_sub_output')
                ->leftJoin('tbl_dipa_sub_komponen','tbl_dipa_komponen.dipa_id_komponen', '=', 'tbl_dipa_sub_komponen.dipa_id_komponen')
                ->leftJoin('tbl_dipa_akun','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->where('tbl_dipa_sub_output.dipa_id_sub_output',$id)
                ->first([
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total')
                    ]);
        // return $data;
        return view('pages.satker.dipa_komponen',$data);
    }

    public function show($id_sub_output)
    {
        $job = DB::table('tbl_dipa_sub_output')
                ->leftJoin('tbl_dipa_komponen','tbl_dipa_sub_output.dipa_id_sub_output', '=', 'tbl_dipa_komponen.dipa_id_sub_output')
                ->leftJoin('tbl_dipa_sub_komponen','tbl_dipa_komponen.dipa_id_komponen', '=', 'tbl_dipa_sub_komponen.dipa_id_komponen')
                ->leftJoin('tbl_dipa_akun','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->groupBy('tbl_dipa_komponen.dipa_id_komponen')
                ->groupBy('tbl_dipa_komponen.dipa_kode_komponen')
                ->groupBy('tbl_dipa_komponen.dipa_nama_komponen')
                ->where('tbl_dipa_sub_output.dipa_id_sub_output', $id_sub_output)
                ->get([
                    'tbl_dipa_komponen.dipa_id_komponen',
                    'tbl_dipa_komponen.dipa_kode_komponen',
                    'tbl_dipa_komponen.dipa_nama_komponen',
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total, count(tbl_dipa_sub_komponen.dipa_id_sub_komponen) as count_sub_komponen')]);

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::collection($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_sub_output'      => 'required',
            'kode_komponen' => 'required',
            'nama_komponen'  => 'required',
    	]);

        DipaKomponen::create([
            'dipa_kode_komponen'      => $request->kode_komponen,
            'dipa_nama_komponen'      => $request->nama_komponen,
            'dipa_id_sub_output' => $request->id_sub_output,
        ]);

        return response()->json(["status"=>"success"],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_komponen' => 'required',
            'nama_komponen'  => 'required',
    	]);
        $output = DipaKomponen::find($id);
        if($output == null) return abort(503);

        $output->update([
            'dipa_kode_komponen'      => $request->kode_komponen,
            'dipa_nama_komponen'      => $request->nama_komponen,
        ]);

        return response()->json(["status"=>"success"],200);
    }
    public function getOne($id)
    {
        return DipaKomponen::where('dipa_id_komponen',$id)->first();
    }

    public function delete($id)
    {
        $output = DipaKomponen::find($id);
        if($output == null) return abort(503);
        $output->delete();
    }
}
