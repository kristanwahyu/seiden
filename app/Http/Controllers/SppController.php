<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaPembayaranSyncSimak;
use App\Model\DipaPembayaranSyncSaiba;
use App\Model\DipaPembayaranSyncPerlengkapan;
use App\Model\DipaPembayaranCheckSPP;

class SppController extends Controller
{
	public function showPage(){
		return view('pages.ppk.dashboard');
	}

	public function show()
	{ 
		$data = DB::table('tbl_dipa_pembayaran')
		->join('tbl_dipa_akun_detail', 'tbl_dipa_akun_detail.dipa_id_detail_akun','=','tbl_dipa_pembayaran.dipa_id_detail_akun')
		->join('tbl_dipa_akun', 'tbl_dipa_akun.dipa_id_akun','=','tbl_dipa_akun_detail.dipa_id_akun')
		->join('tbl_dipa_sub_komponen', 'tbl_dipa_sub_komponen.dipa_id_sub_komponen','=','tbl_dipa_akun.dipa_id_sub_komponen')
		->join('tbl_dipa_komponen', 'tbl_dipa_komponen.dipa_id_komponen','=','tbl_dipa_sub_komponen.dipa_id_komponen')
		->join('tbl_dipa_sub_output', 'tbl_dipa_sub_output.dipa_id_sub_output','=','tbl_dipa_komponen.dipa_id_sub_output')
		->join('tbl_dipa_output', 'tbl_dipa_output.dipa_id_output','=','tbl_dipa_sub_output.dipa_id_output')
		->join('tbl_dipa_kegiatan', 'tbl_dipa_kegiatan.dipa_id_kegiatan','=','tbl_dipa_output.dipa_id_kegiatan')
		->join('tbl_dipa_program', 'tbl_dipa_program.dipa_id_program','=','tbl_dipa_kegiatan.dipa_id_program')
		->leftJoin('tbl_dipa_pmb_check_spp', 'tbl_dipa_pmb_check_spp.dipa_pembayaran_id','=','tbl_dipa_pembayaran.dipa_pembayaran_id')
		->whereNull('tbl_dipa_pmb_check_spp.dipa_pembayaran_id')
		->where('tbl_dipa_program.dipa_id_satuan_kerja',Auth::user()->dipa_id_satuan_kerja)
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
        DB::raw('tbl_dipa_akun_detail.dipa_harga_satuan * tbl_dipa_akun_detail.dipa_volume as total'),
        'tbl_dipa_pembayaran.dipa_pembayaran_nilai',
        'tbl_dipa_pembayaran.dipa_pembayaran_id'
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
								->leftJoin('tbl_tahun_anggaran', 'tbl_tahun_anggaran.dipa_id_tahun_anggaran','=','tbl_dipa_program.dipa_id_tahun_anggaran')
                ->where('tbl_dipa_pembayaran.dipa_pembayaran_id',$id)
                ->get();
        
  	return view('pages.ppk.spp', compact("data"));
	}

	public function store(Request $request){
		$this->validate($request, [
      'no_spp'	    => 'required',
      'nilai_spp'      => 'required',
      'addDate' => 'required',
      'tambah_keterangan'  => 'required',
      'id'  => 'required',
  	]);

		if($request->check_simak=="true"){
			$simak="1";
			DipaPembayaranSyncSimak::create([
				'dipa_pembayaran_id'	=> $request->id,
			]);
		}else{
			$simak="0";
		}

		if($request->check_saiba=="true"){
			$saiba="1";
			DipaPembayaranSyncSaiba::create([
				'dipa_pembayaran_id'	=> $request->id,
			]);
		}else{
			$saiba="0";
		}

		if($request->check_perlengkapan=="true"){
			$perlengkapan="1";
			DipaPembayaranSyncPerlengkapan::create([
				'dipa_pembayaran_id'	=> $request->id,
			]);
		}else{
			$perlengkapan="0";
		}

    DipaPembayaranCheckSPP::create([
      'dipa_spp_no'      		=> $request->no_spp,
      'dipa_spp_nilai'      => $request->nilai_spp,
      'dipa_spp_tanggal' 		=> $request->addDate,
      'dipa_spp_keterangan'   		=> $request->tambah_keterangan,
      'dipa_sinkronisasi_simak'   => $simak,
      'dipa_sinkronisasi_saiba'   => $saiba,
      'dipa_sinkronisasi_perlengkapan'   => $perlengkapan,
      'dipa_pembayaran_id'   			=> $request->id,
    ]);

    return response()->json(["status"=>"success"],200);
	}

	public function makeDataTable($data){
	    return Datatables::collection($data)->addIndexColumn()->make(true);
	  }
}
