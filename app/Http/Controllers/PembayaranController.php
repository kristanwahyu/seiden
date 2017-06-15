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
                ->leftJoin('tbl_dipa_pembayaran','tbl_dipa_akun_detail.dipa_id_detail_akun', '=', 'tbl_dipa_pembayaran.dipa_id_detail_akun')
                ->where('tbl_dipa_akun_detail.dipa_id_detail_akun',$id)
                ->first([
                    DB::raw('SUM(tbl_dipa_pembayaran.dipa_pembayaran_nilai) as total_bayar')
                    ]);
        $check_draft = DipaPembayaran::with(array('syaratPembayaran'=>function($q){
                $q->orderBy('dipa_pmb_syarat_id','desc');
            }))
            ->where([['dipa_id_detail_akun','=', $id],['dipa_pembayaran_status','=','0']])->first();

        if($check_draft != null) {
            $data['pembayaran_param'] = $check_draft;
        } else {
            $data['pembayaran_param'] = null;
        }
        return view('pages.satker.dipa_pembayaran',$data);
    }

    public function storeOrUpdate(Request $request)
    {
        if ($request->id_pembayaran == null){
            //save
            $syarat_pmb = [
                "syarat1" => $request->file('syarat1'),
                "syarat2" => $request->file('syarat2'),
                "syarat3" => $request->file('syarat3'),
                "syarat4" => $request->file('syarat4'),
                "syarat5" => $request->file('syarat5'),
                "syarat6" => $request->file('syarat6'),
                "syarat7" => $request->file('syarat7'),
            ];

            $data_check = [
                "check1" => $request->check1,
                "check2" => $request->check2,
                "check3" => $request->check3,
                "check4" => $request->check4,
                "check5" => $request->check5,
                "check6" => $request->check6,
                "check7" => $request->check7,
            ];

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
            $id_pmb = $dipa_pmb->dipa_pembayaran_id;
            $id_detail = $request->id_detail_akun;
            $nama_detail = DipaAkunDetail::find($id_detail)->dipa_nama_detail;
            $nama_detail_arr = explode(' ', $nama_detail);
            if(count($nama_detail_arr) > 1) {
                $nama_detail = "";
                for($i=0; $i<count($nama_detail_arr); $i++)
                {
                    $nama_detail .= $nama_detail_arr[$i];
                }
            }
            $nama_folder = $id_detail.'_'.$nama_detail.'_'.$id_pmb;

            $syarat = new syarat;

            $path_syarat = [];
            foreach($syarat_pmb as $item){
                if ($item != null) {
                    $path_syarat[] = [$syarat->upload($item, $nama_folder)];
                } else {
                    $path_syarat[] = [null];
                }
            }

            $syarat->save($path_syarat, $data_check, $id_pmb);

        } else {
            //update
            //menyusun syarat menjadi array
            $syarat_pmb = [
                $request->file('syarat1'),
                $request->file('syarat2'),
                $request->file('syarat3'),
                $request->file('syarat4'),
                $request->file('syarat5'),
                $request->file('syarat6'),
                $request->file('syarat7'),
            ];
            //menyusun parameter file exist kedalam array
            $array_check = [
                $request->hidden_syarat1, $request->hidden_syarat2, $request->hidden_syarat3,
                $request->hidden_syarat4, $request->hidden_syarat5, $request->hidden_syarat6,
                $request->hidden_syarat7,
            ];
            //menyusun cheklist kedalam array
            $data_check = [
                "check1" => $request->check1,
                "check2" => $request->check2,
                "check3" => $request->check3,
                "check4" => $request->check4,
                "check5" => $request->check5,
                "check6" => $request->check6,
                "check7" => $request->check7,
            ];
            //validasi
            $this->validate($request, [
                'pembayaran_tanggal'      => 'required',
                'jenis_pembayaran' => 'required',
                'id_detail_akun'  => 'required',
                'pembayaran_nilai' => 'required',
                'pembayaran_keterangan' => 'required',
                'pembayaran_status' => 'required'
            ]);
            //menghilangkan . untuk kemudian di save ke database
            $number = $this->clearComma($request->pembayaran_nilai);
            //update data pembayaran
            $dipa_pmb = DipaPembayaran::find($request->id_pembayaran)->update([
                'dipa_pembayaran_tanggal'   => $request->pembayaran_tanggal,
                'dipa_jenis_pembayaran'     => $request->jenis_pembayaran,
                'dipa_id_detail_akun'       => $request->id_detail_akun,
                'dipa_pembayaran_nilai'     => $number,
                'dipa_pembayaran_keterangan'=> $request->pembayaran_keterangan,
                'dipa_pembayaran_status'    => $request->pembayaran_status,
            ]);
            //mendapatkan id_pmb
            $id_pmb = $request->id_pembayaran;
            //mendapatkan id detail akun nama detail (untuk proses pembuatan nama folder)
            $id_detail = $request->id_detail_akun;
            $nama_detail = DipaAkunDetail::find($id_detail)->dipa_nama_detail;
            $nama_detail_arr = explode(' ', $nama_detail);
            if(count($nama_detail_arr) > 1) {
                $nama_detail = "";
                for($i=0; $i<count($nama_detail_arr); $i++)
                {
                    $nama_detail .= $nama_detail_arr[$i];
                }
            }
            $nama_folder = $id_detail.'_'.$nama_detail.'_'.$id_pmb;
            //format nama foler idakundetail_namaakundetai_idpembayaran
            //instansiasi controller syarat
            $syarat = new syarat;
            $syarat->update($id_pmb, $array_check, $syarat_pmb, $data_check, $nama_folder);
                        
        }

            return response()->json(["status"=>"success"],200);
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
    public function bendahara($jenis_pembayaran=null){
        if($jenis_pembayaran==null){
            $jenis_pembayaran=0;
        }
        $pmb=DipaPembayaran::with(array('akunDetail'=>function($b){
                $b->with(array('akun'=>function($c){
                    $c->with(array('subKomponen'=>function($d){
                        $d->with(array('komponen'=>function($e){
                            $e->with(array('subOutput'=>function($f){
                                $f->with(array('output'=>function($g){
                                    $g->with(array('kegiatan'=>function($h){
                                        $h->with(array('program'=>function($i){
                                            $i->with(array('tahun','satuanKerja'));
                                        }));
                                    }));
                                }));
                            }));
                        }));
                    }));
                }));
            }));
        switch ($jenis_pembayaran) {
            case 1:
                $data=$pmb->where('dipa_jenis_pembayaran', 1)->get();
                break;
            case 2:
                $data=$pmb->where('dipa_jenis_pembayaran', 2)->get();
                break;
            default:
                $data=$pmb->get();
                break;
        }
        return Datatables::of($data)->addIndexColumn()->make(true);
    }
}
