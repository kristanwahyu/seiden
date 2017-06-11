<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaPembayaran;
use App\Model\DipaAkunDetail;

class SppController extends Controller
{
	public function showPage(){
		// $data = DB::table('tbl_dipa_pembayaran')->get();
		return view('pages.ppk.dashboard');
	}

	public function show()
	{ 
    // $data = DB::table('tbl_dipa_pembayaran')
    //         ->whereNotExists(function ($query) {
    //             $query->select(DB::raw(1))
    //                   ->from('tbl_dipa_pmb_check_spp')
    //                   ->whereRaw('tbl_dipa_pembayaran.dipa_pembayaran_id = tbl_dipa_pmb_check_spp.dipa_pembayaran_id');
    //         })
    //         ->get();

    $data = DB::table('tbl_dipa_program')
                ->leftJoin('tbl_dipa_kegiatan', 'tbl_dipa_program.dipa_id_program', '=', 'tbl_dipa_kegiatan.dipa_id_program')
                ->leftJoin('tbl_dipa_output', 'tbl_dipa_kegiatan.dipa_id_kegiatan', '=', 'tbl_dipa_output.dipa_id_kegiatan')
                ->leftJoin('tbl_dipa_sub_output', 'tbl_dipa_output.dipa_id_output', '=', 'tbl_dipa_sub_output.dipa_id_output')
                ->leftJoin('tbl_dipa_komponen','tbl_dipa_sub_output.dipa_id_sub_output', '=', 'tbl_dipa_komponen.dipa_id_sub_output')
                ->leftJoin('tbl_dipa_sub_komponen','tbl_dipa_komponen.dipa_id_komponen', '=', 'tbl_dipa_sub_komponen.dipa_id_komponen')
                ->leftJoin('tbl_dipa_akun','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->groupBy('tbl_dipa_program.dipa_id_program', 'tbl_dipa_program.dipa_kode_program', 'tbl_dipa_program.dipa_nama_program')
                ->get([
                		DB::raw('CONCAT(
                			tbl_dipa_akun_detail.dipa_nama_detail," | ",
                			CASE tbl_dipa_akun_detail.dipa_jenis_akun WHEN 1 THEN "Belanja Gaji"
                				WHEN 2 THEN "Belanja Non Gaji"
                			 	END ," | ",
                			tbl_dipa_akun_detail.dipa_volume," ",
                			tbl_dipa_akun_detail.dipa_satuan
                		) as rincian'),
                    DB::raw('CONCAT(
                    	tbl_dipa_program.dipa_kode_program,".",
	                    tbl_dipa_kegiatan.dipa_kode_kegiatan,".",
	                    tbl_dipa_output.dipa_kode_output,".",
											tbl_dipa_sub_output.dipa_kode_sub_output,".",
											tbl_dipa_komponen.dipa_kode_komponen,".",
											tbl_dipa_sub_komponen.dipa_kode_sub_komponen,".",
											tbl_dipa_akun.dipa_kode_akun,".",
											tbl_dipa_akun_detail.dipa_id_detail_akun
										) as kode'),
										'tbl_dipa_akun_detail.dipa_volume',
										'tbl_dipa_akun_detail.dipa_harga_satuan',
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) as total, count(tbl_dipa_kegiatan.dipa_id_kegiatan) as count_kegiatan'),
                    DB::raw('SUM(tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume) AS bayar'),
                    'tbl_dipa_akun_detail.dipa_id_detail_akun'
                    ]);

    return $this->makeDataTable($data);
	}

	public function getOne($id){
		$data = DB::table('tbl_dipa_program')
                ->leftJoin('tbl_dipa_kegiatan', 'tbl_dipa_program.dipa_id_program', '=', 'tbl_dipa_kegiatan.dipa_id_program')
                ->leftJoin('tbl_dipa_output', 'tbl_dipa_kegiatan.dipa_id_kegiatan', '=', 'tbl_dipa_output.dipa_id_kegiatan')
                ->leftJoin('tbl_dipa_sub_output', 'tbl_dipa_output.dipa_id_output', '=', 'tbl_dipa_sub_output.dipa_id_output')
                ->leftJoin('tbl_dipa_komponen','tbl_dipa_sub_output.dipa_id_sub_output', '=', 'tbl_dipa_komponen.dipa_id_sub_output')
                ->leftJoin('tbl_dipa_sub_komponen','tbl_dipa_komponen.dipa_id_komponen', '=', 'tbl_dipa_sub_komponen.dipa_id_komponen')
                ->leftJoin('tbl_dipa_akun','tbl_dipa_sub_komponen.dipa_id_sub_komponen', '=', 'tbl_dipa_akun.dipa_id_sub_komponen')
                ->leftJoin('tbl_dipa_akun_detail','tbl_dipa_akun.dipa_id_akun', '=', 'tbl_dipa_akun_detail.dipa_id_akun')
                ->leftJoin('tbl_dipa_pembayaran','tbl_dipa_akun_detail.dipa_id_detail_akun', '=', 'tbl_dipa_pembayaran.dipa_id_detail_akun')
                ->where('tbl_dipa_pembayaran.dipa_id_detail_akun',1)
                ->get();
        
  	return view('pages.ppk.spp', compact("data"));
	}

	public function makeDataTable($data){
    return Datatables::collection($data)->addIndexColumn()->make(true);
  }
}
