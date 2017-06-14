<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Model\DipaPembayaranCheckSPM as SPM;
use App\Model\DipaPembayaranCheckSP2D as SP2D;
use App\Model\DipaPembayaran as Pmb;
use Illuminate\Support\Facades\Validator;

class Sp2dController extends Controller
{
    //
    public function index(){
        $SP2D = SP2D::get()->pluck('dipa_pembayaran_id')->toArray();
    	$data=SPM::with(array('pembayaran'=>function($a){
    		$a->with(array('akunDetail'=>function($b){
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
	    }));
    if(!empty($SP2D)){
        $dataz=$data
        ->whereNotIn('dipa_pembayaran_id',$SP2D)
        ->get();
    }
    else{
        $dataz=$data
        ->get();
    }
	return Datatables::of($dataz)
    ->addColumn('kode', function($kode){
            $satker=$kode->pembayaran->akunDetail->akun->subKomponen->komponen->subOutput->output->kegiatan->program->satuanKerja->dipa_kode_satuan_kerja;
            $program=$kode->pembayaran->akunDetail->akun->subKomponen->komponen->subOutput->output->kegiatan->program->dipa_kode_program;
            $kegiatan=$kode->pembayaran->akunDetail->akun->subKomponen->komponen->subOutput->output->kegiatan->dipa_kode_kegiatan;
            $output=$kode->pembayaran->akunDetail->akun->subKomponen->komponen->subOutput->output->dipa_kode_output;
            $suboutput=$kode->pembayaran->akunDetail->akun->subKomponen->komponen->subOutput->dipa_kode_sub_output;
            $komponen=$kode->pembayaran->akunDetail->akun->subKomponen->komponen->dipa_kode_komponen;
            $subkomponen=$kode->pembayaran->akunDetail->akun->subKomponen->dipa_kode_sub_komponen;
            $akun=$kode->pembayaran->akunDetail->akun->dipa_kode_akun;

            return $satker.".".$program.".".$kegiatan.".".$output.".".$suboutput.".".$komponen.".".$subkomponen.".".$akun;
        })
        ->addColumn('rincian', function($rincian){
            $namaakun=$rincian->pembayaran->akunDetail->akun->dipa_nama_akun;
            $jenisakun=$rincian->pembayaran->akunDetail->akun->dipa_jenis_akun==1?"Belanja Gaji":"Belanja Non Gaji";
            $volume=$rincian->pembayaran->akunDetail->dipa_volume;
            $satuan=$rincian->pembayaran->akunDetail->dipa_satuan;
            return $namaakun.' | '.$jenisakun.' | '.$volume.' '.$satuan;
        })
        ->addColumn('total', function($total){
            $nilai = $total->pembayaran->akunDetail->dipa_harga_satuan;
            $volume = $total->pembayaran->akunDetail->dipa_volume;
            return $nilai*$volume;
        })
    ->addIndexColumn()->make(true);
    }
    public function show($id){
        $data=SPM::where('dipa_pmb_check_spm_id',$id)->with(array('pembayaran'=>function($a){
            $a->with(array('akunDetail'=>function($b){
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
        }))->first();
        return view('pages.ppspm.sp2d', $data);
        // return $data;
    }
    public function store(Request $request, $id){
        $rules = [
            'no_sp2d'   => 'required|numeric',
            'nilai_sp2d'  => 'required|numeric',
            'addDate' => 'required|date',
            'tambah_keterangan' => 'required',
         ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()],400);
        }
        $pmb=Pmb::find($id);
        $sp2d=new SP2D;
        $sp2d->dipa_sp2d_no=$request->no_sp2d;
        $sp2d->dipa_sp2d_nilai=$request->nilai_sp2d;
        $sp2d->dipa_sp2d_tanggal=date('Y-m-d',strtotime($request->addDate))." 00:00:00";
        $sp2d->dipa_sp2d_keterangan=$request->tambah_keterangan;
        $pmb->PembayaranCheckSP2D()->save($sp2d);
        return response()->json(["status"=>"success"],200);

    }
}
