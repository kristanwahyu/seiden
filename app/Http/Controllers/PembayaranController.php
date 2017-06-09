<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaPembayaran;
use App\Model\DipaAkunDetail;

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
            ->where('dipa_id_detail_akun',$id)->first();
        $data['total'] = DB::table('tbl_dipa_akun')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->where('tbl_dipa_akun.dipa_id_akun',$id_akun)
                ->first([
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total')
                    ]);
        return view('pages.satker.dipa_pembayaran',$data);
    }
}
