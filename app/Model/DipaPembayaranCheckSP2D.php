<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaPembayaranCheckSP2D extends Model
{
    protected $primaryKey = 'dipa_pmb_check_sp2d_id';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_pmb_check_sp2d';

    public function pembayaransp2d(){
        return $this->belongsTo('App\Model\DipaPembayaran','dipa_pembayaran_id');
    }
}
