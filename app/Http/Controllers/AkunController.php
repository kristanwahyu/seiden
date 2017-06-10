<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaAkun;
use App\Model\DipaSubKomponen;

class AkunController extends Controller
{
    //
    public function showPage($id)
    {   
        $data = DipaSubKomponen::with(array('komponen' => function($n){
                $n->with(array('subOutput' => function($m){
                    $m->with(array('output' => function($o){
                        $o->with(array('kegiatan' => function($q){
                            $q->with(array('program' =>function ($p){
                                $p->with('tahun','satuanKerja');
                            }));
                        }));
                    }));
                }));
            }))
            ->where('dipa_id_sub_komponen',$id)->first();

        $data['total'] = DB::table('tbl_dipa_sub_komponen')
                ->leftJoin('tbl_dipa_akun','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->where('tbl_dipa_sub_komponen.dipa_id_sub_komponen',$id)
                ->first([
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total')
                    ]);
        // return $data;
        return view('pages.satker.dipa_akun',$data);
    }

    public function show($id_sub_komponen)
    {
        $job = DB::table('tbl_dipa_akun')
                ->leftJoin('tbl_dipa_sub_komponen','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->groupBy('tbl_dipa_akun.dipa_id_akun','tbl_dipa_akun.dipa_kode_akun','tbl_dipa_akun.dipa_nama_akun')
                ->where('tbl_dipa_sub_komponen.dipa_id_sub_komponen', $id_sub_komponen)
                ->orderBy('tbl_dipa_akun.dipa_id_akun', 'desc')
                ->get([
                    'tbl_dipa_akun.dipa_id_akun',
                    'tbl_dipa_akun.dipa_kode_akun',
                    'tbl_dipa_akun.dipa_nama_akun',
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total, count(tbl_dipa_akun_detail.dipa_id_detail_akun) as count_sub_akun_detail')]);

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::collection($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_sub_komponen'      => 'required',
            'kode_akun' => 'required',
            'nama_akun'  => 'required',
    	]);

        DipaAkun::create([
            'dipa_kode_akun'      => $request->kode_akun,
            'dipa_nama_akun'      => $request->nama_akun,
            'dipa_id_sub_komponen' => $request->id_sub_komponen,
        ]);

        return response()->json(["status"=>"success"],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_akun' => 'required',
            'nama_akun'  => 'required',
    	]);
        $output = DipaAkun::where('dipa_id_akun',$id);
        if($output == null) return abort(503);

        $output->update([
            'dipa_kode_akun'      => $request->kode_akun,
            'dipa_nama_akun'      => $request->nama_akun,
        ]);

        return response()->json(["status"=>"success"],200);
    }
    public function getOne($id)
    {
        return DipaAkun::where('dipa_id_akun',$id)->first();
    }

    public function delete($id)
    {
        $output = DipaAkun::where('dipa_id_akun', $id);
        if($output == null) return abort(503);
        $output->delete();
    }
}
