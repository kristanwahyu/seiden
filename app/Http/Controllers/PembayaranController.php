<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    //
    public function showPage($id)
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
            ->where('dipa_id_akun',$id)->first();
    }
}
