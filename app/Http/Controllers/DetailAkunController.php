<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaAkun;
use App\Model\DipaAkunDetail;

class DetailAkunController extends Controller
{
    //
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
        return view('pages.satker.dipa_rincian',$data);
    }

    public function show($id_akun)
    {

        $job = DipaAkunDetail::where('dipa_id_akun',$id_akun)
            ->orderBy('dipa_id_detail_akun', 'desc');

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::eloquent($data)->addIndexColumn()->make(true);
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

        DipaAkunDetail::create([
            'dipa_nama_detail'  => $request->nama_detail,
            'dipa_volume'       => $request->volume,
            'dipa_satuan'       => $request->satuan,
            'dipa_harga_satuan' => $request->harga_satuan,
            'dipa_jenis_akun'   => $request->jenis_akun,
            'dipa_id_akun'      => $request->id_akun
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
        return DipaAkunDetail::where('dipa_id_detail_akun',$id)->first();
    }

    public function delete($id)
    {
        $output = DipaAkun::where('dipa_id_akun', $id);
        if($output == null) return abort(503);
        $output->delete();
    }
}
