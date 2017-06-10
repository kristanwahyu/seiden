<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaPembayaran;
use App\Model\DipaAkunDetail;
use App\Http\Controllers\SyaratPembayaranController as syarat;
use App\Http\Controllers\SppController as spp;

class PembayaranController extends Controller
{
    //
    public function showPage($id, $id_akun)
    {   
        $data = DipaAkunDetail::with(array('akun' => function($q) {
                $q->with(array('subKomponen'=>function($l){
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
                }));
            }))
            ->with('pembayaran')
            ->where('dipa_id_detail_akun',$id)->first();
        $data['total'] = DB::table('tbl_dipa_akun')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->where('tbl_dipa_akun.dipa_id_akun',$id_akun)
                ->first([
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total')
                    ]);

        $data['total_bayar'] = DB::table('tbl_dipa_akun_detail')
                ->rightJoin('tbl_dipa_pembayaran','tbl_dipa_akun_detail.dipa_id_detail_akun', '=', 'tbl_dipa_pembayaran.dipa_id_detail_akun')
                ->where('tbl_dipa_akun_detail.dipa_id_akun',$id_akun)
                ->first([
                    DB::raw('SUM(tbl_dipa_pembayaran.dipa_pembayaran_nilai) as total_bayar')
                    ]);
        return view('pages.satker.dipa_pembayaran',$data);
    }

    public function storeOrUpdate(Request $request)
    {
        $syarat_pmb = [
            "syarat1" => $request->file('syarat1'),
            "syarat2" => $request->file('syarat2'),
            "syarat3" => $request->file('syarat3'),
            "syarat4" => $request->file('syarat4'),
            "syarat5" => $request->file('syarat5'),
            "syarat6" => $request->file('syarat6'),
            "syarat7" => $request->file('syarat7'),
        ];
        if ($request->id_pembayaran == null){
            //save
            $this->validate($request, [
                'pembayaran_tanggal'      => 'required',
                'jenis_pembayaran' => 'required',
                'id_detail_akun'  => 'required',
                'pembayaran_nilai' => 'required',
                'pembayaran_keterangan' => 'required',
                'pembayaran_status' => 'required'
            ]);

            $number = $this->clearComma($request->pembayaran_nilai);

            $dipa_pmb = DipaPembayaran::create([
                'dipa_pembayaran_tanggal'   => $request->pembayaran_tanggal,
                'dipa_jenis_pembayaran'     => $request->jenis_pembayaran,
                'dipa_id_detail_akun'       => $request->id_detail_akun,
                'dipa_pembayaran_nilai'     => $number,
                'dipa_pembayaran_keterangan'=> $request->pembayaran_keterangan,
                'dipa_pembayaran_status'    => $request->pembayaran_status,
            ]);

            $id_detail = $request->id_detail_akun;
            $nama_detail = DipaAkunDetail::find($id_detail)->dipa_nama_detail;
            $nama_folder = $id_detail.'_'.$nama_detail;

            $syarat = new syarat;

            $path_syarat = [];
            foreach($syarat_pmb as $item){
                if ($item != null) {
                    $path_syarat[] = [$syarat->upload($item, $nama_folder), '1'];
                } else {
                    $path_syarat[] = [null, '0'];
                }
            }

            $syarat->save($path_syarat, $dipa_pmb->dipa_pembayaran_id);

        } else {
            //update
        }

            return response()->json(["status"=>"success"],200);
    }

    public function draft()
    {

    }

    public function save()
    {

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
}
