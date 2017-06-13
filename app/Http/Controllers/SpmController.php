<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Model\DipaPembayaranCheckSPP as SPP;

class SpmController extends Controller
{
    //
    public function show(){
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
}
