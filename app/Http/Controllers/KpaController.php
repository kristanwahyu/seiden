<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Program;
use Illuminate\Support\Facades\DB;
use App\Model\DipaAkun;
use Yajra\Datatables\Facades\Datatables;
use App\Model\DipaAkunDetail;
use App\Model\DipaPembayaran;

class KpaController extends Controller
{
    //
    public function showPage($id_akun)
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
            ->where('dipa_id_akun',$id_akun)->first();
        return view('pages.kpa.detail', $data);
    }

    public function showPageDetail($id_akun)
    {
        $data = DipaAkunDetail::with(array('akun'=>function($q){
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
            ->where('dipa_id_detail_akun',$id_akun)->first();
        return view('pages.kpa.monitoring',$data);
    }

    public function show($id)
    {
        $job = DB::table('tbl_dipa_akun_detail')
                ->join('tbl_dipa_akun', 'tbl_dipa_akun.dipa_id_akun','=','tbl_dipa_akun_detail.dipa_id_akun')
                ->join('tbl_dipa_sub_komponen', 'tbl_dipa_sub_komponen.dipa_id_sub_komponen','=','tbl_dipa_akun.dipa_id_sub_komponen')
                ->join('tbl_dipa_komponen', 'tbl_dipa_komponen.dipa_id_komponen','=','tbl_dipa_sub_komponen.dipa_id_komponen')
                ->join('tbl_dipa_sub_output', 'tbl_dipa_sub_output.dipa_id_sub_output','=','tbl_dipa_komponen.dipa_id_sub_output')
                ->join('tbl_dipa_output', 'tbl_dipa_output.dipa_id_output','=','tbl_dipa_sub_output.dipa_id_output')
                ->join('tbl_dipa_kegiatan', 'tbl_dipa_kegiatan.dipa_id_kegiatan','=','tbl_dipa_output.dipa_id_kegiatan')
                ->join('tbl_dipa_program', 'tbl_dipa_program.dipa_id_program','=','tbl_dipa_kegiatan.dipa_id_program')
                ->join('tbl_satuan_kerja', 'tbl_satuan_kerja.dipa_id_satuan_kerja','=','tbl_dipa_program.dipa_id_satuan_kerja')
                ->leftJoin('tbl_dipa_pembayaran','tbl_dipa_akun_detail.dipa_id_detail_akun', '=', 'tbl_dipa_pembayaran.dipa_id_detail_akun')
                ->groupBy('tbl_dipa_akun_detail.dipa_id_detail_akun', 
                    'tbl_dipa_akun_detail.dipa_nama_detail', 
                    'tbl_dipa_akun_detail.dipa_volume', 
                    'tbl_dipa_akun_detail.dipa_satuan', 
                    'tbl_dipa_akun_detail.dipa_harga_satuan', 
                    'tbl_dipa_akun_detail.dipa_jenis_akun', 
                    'tbl_dipa_akun_detail.dipa_id_akun')
                ->where('tbl_dipa_akun_detail.dipa_id_akun', $id)
                ->get([
                    'tbl_dipa_akun_detail.dipa_id_detail_akun',
                    'tbl_dipa_akun_detail.dipa_nama_detail',
                    'tbl_dipa_akun_detail.dipa_volume',
                    'tbl_dipa_akun_detail.dipa_satuan',
                    'tbl_dipa_akun_detail.dipa_harga_satuan',
                    'tbl_dipa_akun_detail.dipa_jenis_akun',
                    'tbl_dipa_akun_detail.dipa_id_akun',
                    DB::raw('tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume AS total,
                     SUM(tbl_dipa_pembayaran.dipa_pembayaran_nilai) as total_pembayaran,
                      (SELECT tbl_dipa_pembayaran.dipa_pembayaran_status FROM tbl_dipa_pembayaran 
                      WHERE tbl_dipa_akun_detail.dipa_id_detail_akun = tbl_dipa_pembayaran.dipa_id_detail_akun
                        ORDER BY tbl_dipa_pembayaran.dipa_pembayaran_id desc limit 1) as status, CONCAT(tbl_satuan_kerja.dipa_kode_satuan_kerja,".",
        	tbl_dipa_program.dipa_kode_program,".",
          tbl_dipa_kegiatan.dipa_kode_kegiatan,".",
          tbl_dipa_output.dipa_kode_output,".",
					tbl_dipa_sub_output.dipa_kode_sub_output,".",
					tbl_dipa_komponen.dipa_kode_komponen,".",
					tbl_dipa_sub_komponen.dipa_kode_sub_komponen,".",
					tbl_dipa_akun.dipa_kode_akun,".",
					tbl_dipa_akun_detail.dipa_id_detail_akun
				) as kode, CONCAT(
    			tbl_dipa_akun_detail.dipa_nama_detail," | ",
    			CASE tbl_dipa_akun_detail.dipa_jenis_akun WHEN 1 THEN "Belanja Gaji"
    				WHEN 2 THEN "Belanja Non Gaji"
    			 	END ," | ",
    			tbl_dipa_akun_detail.dipa_volume," ",
    			tbl_dipa_akun_detail.dipa_satuan
    		) as rincian')
                ]);
        return $this->makeDatatable($job);
    }

    public function monitoring($id_akun_detail)
    {
        $data = DipaPembayaran::with('PembayaranCheckSPM','PembayaranCheckSPP','PembayaranCheckSP2D')
            ->where('dipa_id_detail_akun', $id_akun_detail)
            ->get();
        
        return $this->makeDatatable($data);
    }

    public function makeDatatable($data)
    {
        return Datatables::collection($data)->addIndexColumn()->make(true);
    }
}
