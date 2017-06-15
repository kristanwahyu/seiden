<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Model\DipaPembayaranCheckSPP as SPP;
use App\Model\DipaPembayaranCheckSPM as SPM;
use App\Model\DipaPembayaran as Pmb;
use Illuminate\Support\Facades\Validator;

class SpmController extends Controller
{
    //
    public function index(){
        $SPM = SPM::get()->pluck('dipa_pembayaran_id')->toArray();
    	$data=SPP::with(array('pembayaranspp'=>function($a){
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
    if(!empty($SPM)){
        $dataz=$data
        ->whereNotIn('dipa_pembayaran_id',$SPM)
        ->get();
    }
    else{
        $dataz=$data
        ->get();
    }
	return Datatables::of($dataz)
        ->addColumn('kode', function($kode){
            $satker=$kode->pembayaranspp->akunDetail->akun->subKomponen->komponen->subOutput->output->kegiatan->program->satuanKerja->dipa_kode_satuan_kerja;
            $program=$kode->pembayaranspp->akunDetail->akun->subKomponen->komponen->subOutput->output->kegiatan->program->dipa_kode_program;
            $kegiatan=$kode->pembayaranspp->akunDetail->akun->subKomponen->komponen->subOutput->output->kegiatan->dipa_kode_kegiatan;
            $output=$kode->pembayaranspp->akunDetail->akun->subKomponen->komponen->subOutput->output->dipa_kode_output;
            $suboutput=$kode->pembayaranspp->akunDetail->akun->subKomponen->komponen->subOutput->dipa_kode_sub_output;
            $komponen=$kode->pembayaranspp->akunDetail->akun->subKomponen->komponen->dipa_kode_komponen;
            $subkomponen=$kode->pembayaranspp->akunDetail->akun->subKomponen->dipa_kode_sub_komponen;
            $akun=$kode->pembayaranspp->akunDetail->akun->dipa_kode_akun;

            return $satker.".".$program.".".$kegiatan.".".$output.".".$suboutput.".".$komponen.".".$subkomponen.".".$akun;
        })
        ->addColumn('rincian', function($rincian){
            $namaakun=$rincian->pembayaranspp->akunDetail->akun->dipa_nama_akun;
            $jenisakun=$rincian->pembayaranspp->akunDetail->akun->dipa_jenis_akun==1?"Belanja Gaji":"Belanja Non Gaji";
            $volume=$rincian->pembayaranspp->akunDetail->dipa_volume;
            $satuan=$rincian->pembayaranspp->akunDetail->dipa_satuan;
            return $namaakun.' | '.$jenisakun.' | '.$volume.' '.$satuan;
        })
        ->addColumn('total', function($total){
            $nilai = $total->pembayaranspp->akunDetail->dipa_harga_satuan;
            $volume = $total->pembayaranspp->akunDetail->dipa_volume;
            return $nilai*$volume;
        })
        ->addIndexColumn()->make(true);
        // return $SPM;
    }
    public function show($id){
        $data=SPP::where('dipa_pmb_check_spp_id',$id)->with(array('pembayaranspp'=>function($a){
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
        return view('pages.ppspm.spm', $data);
        // return $data;
    }
    public function store(Request $request, $id){
        $rules = [
            'no_spm'   => 'required|numeric',
            'nilai_spm'  => 'required|numeric',
            'addDate' => 'required|date',
            'tambah_keterangan' => 'required',
         ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()],400);
        }
        $pmb=Pmb::find($id);
        $spm=new SPM;
        $spm->dipa_spm_no=$request->no_spm;
        $spm->dipa_spm_nilai=$request->nilai_spm;
        $spm->dipa_spm_tanggal=date('Y-m-d',strtotime($request->addDate))." 00:00:00";
        $spm->dipa_spm_keterangan=$request->tambah_keterangan;
        $pmb->PembayaranCheckSPM()->save($spm);
        return response()->json(["status"=>"success"],200);

    }
}
