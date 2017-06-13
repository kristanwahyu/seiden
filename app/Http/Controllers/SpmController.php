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
	    }))->get();
	return Datatables::of($data)->make(true);
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
