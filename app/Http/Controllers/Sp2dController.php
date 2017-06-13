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
	    }))->get();
	return Datatables::of($data)->make(true);
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
            'no_sp2d'   => 'required',
            'nilai_sp2d'  => 'required',
            'addDate' => 'required',
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
