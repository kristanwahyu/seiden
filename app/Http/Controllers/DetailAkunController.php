<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaAkun;
use App\Model\DipaAkunDetail;

class DetailAkunController extends Controller
{
    public function showPage($id)
    {   
        $data = DipaAkun::with(array('subKomponen'=>function($l){
                $l->with(array('komponen' => function($n){
                    $n->with(array('subOutput' => function($m){
                        $m->with(array('output' => function($o){
                            $o->with(array('kegiatan' => function($q){
                                $q->with(array('program' =>function ($p){
                                    $p->with('tahun','satuanKerja');
                                }));
                            }));
                        }));
                    }));
                }));
            }))
            ->where('dipa_id_akun',$id)->first();

        // $data['total'] = DB::table('tbl_dipa_akun')
        //         ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
        //         ->where('tbl_dipa_akun.dipa_id_akun',$id)
        //         ->first([
        //             DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total')
        //             ]);

        $data['total'] = $this->total($id);
        
        return view('pages.satker.dipa_rincian',$data);
    }

    public function show($id_akun)
    {
        // $job = DipaAkunDetail::where('dipa_id_akun',$id_akun)
        //     ->orderBy('dipa_id_detail_akun', 'desc');

        //mode ONLY_FULL_GROUP_BY : disabled
        // $job = DipaAkunDetail::select('*', DB::raw('SUM(dipa_harga_satuan * dipa_volume) AS total'))
        //         ->where('dipa_id_akun', $id_akun)
        //         ->groupBy('dipa_id_detail_akun');

        //mode ONLY_FULL_GROUP_BY : enabled
       
        $job = DB::table('tbl_dipa_akun_detail')
                ->leftJoin('tbl_dipa_pembayaran','tbl_dipa_akun_detail.dipa_id_detail_akun', '=', 'tbl_dipa_pembayaran.dipa_id_detail_akun')
                ->groupBy('tbl_dipa_akun_detail.dipa_id_detail_akun', 'tbl_dipa_akun_detail.dipa_nama_detail', 'tbl_dipa_akun_detail.dipa_volume', 'tbl_dipa_akun_detail.dipa_satuan', 'tbl_dipa_akun_detail.dipa_harga_satuan', 'tbl_dipa_akun_detail.dipa_jenis_akun', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->where('tbl_dipa_akun_detail.dipa_id_akun', $id_akun)
                ->get([
                    'tbl_dipa_akun_detail.dipa_id_detail_akun',
                    'tbl_dipa_akun_detail.dipa_nama_detail',
                    'tbl_dipa_akun_detail.dipa_volume',
                    'tbl_dipa_akun_detail.dipa_satuan',
                    'tbl_dipa_akun_detail.dipa_harga_satuan',
                    'tbl_dipa_akun_detail.dipa_jenis_akun',
                    'tbl_dipa_akun_detail.dipa_id_akun',
                    DB::raw('tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume AS total, SUM(tbl_dipa_pembayaran.dipa_pembayaran_nilai) as total_pembayaran, (SELECT tbl_dipa_pembayaran.dipa_pembayaran_status FROM tbl_dipa_pembayaran WHERE tbl_dipa_akun_detail.dipa_id_detail_akun = tbl_dipa_pembayaran.dipa_id_detail_akun ORDER BY tbl_dipa_pembayaran.dipa_pembayaran_id desc limit 1) as status')
                ]);

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::collection($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_akun'      => 'required',
            'nama_detail' => 'required',
            'volume'  => 'required',
            'satuan' => 'required',
            'harga_satuan' => 'required',
            'jenis_akun' => 'required',
            'id_akun' => 'required',
    	]);

        $number = $this->clearComma($request->harga_satuan);

        DipaAkunDetail::create([
            'dipa_nama_detail'  => $request->nama_detail,
            'dipa_volume'       => $request->volume,
            'dipa_satuan'       => $request->satuan,
            'dipa_harga_satuan' => $number,
            'dipa_jenis_akun'   => $request->jenis_akun,
            'dipa_id_akun'      => $request->id_akun
        ]);

        $total = $this->total($request->id_akun);
        return response()->json(["status"=>"success", "total" => $total->total],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_akun'      => 'required',
            'nama_detail' => 'required',
            'volume'  => 'required',
            'satuan' => 'required',
            'harga_satuan' => 'required',
            'jenis_akun' => 'required',
    	]);

        $output = DipaAkunDetail::where('dipa_id_detail_akun',$id);
        if($output == null) return abort(503);

        $number = $this->clearComma($request->harga_satuan);

        $output->update([
            'dipa_nama_detail'  => $request->nama_detail,
            'dipa_volume'       => $request->volume,
            'dipa_satuan'       => $request->satuan,
            'dipa_harga_satuan' => $number,
            'dipa_jenis_akun'   => $request->jenis_akun
        ]);

        $total = $this->total($request->id_akun);
        return response()->json(["status"=>"success", "total" => $total->total],200);
    }
    public function getOne($id)
    {
        return DipaAkunDetail::where('dipa_id_detail_akun',$id)->first();
    }

    public function delete($id, $id_akun)
    {
        $output = DipaAkunDetail::where('dipa_id_detail_akun', $id);
        if($output == null) return abort(503);
        $output->delete();

        $total = $this->total($id_akun);
        return response()->json(["status"=>"success", "total" => $total->total],200);
    }

    public function clearComma($number)
    {
        $arr_ammount = explode('.',$number);
        $count = count($arr_ammount);
        $ammount = "";
        for ($i = 0; $i < $count; $i++){
            $ammount .= $arr_ammount[$i];
        }

        return $ammount;
    }

    public function total($id){
        $total = DipaAkunDetail::select(DB::raw('SUM(dipa_harga_satuan * dipa_volume) AS total'))
                        ->where('dipa_id_akun', $id)->first();

        return $total;
    }
}
