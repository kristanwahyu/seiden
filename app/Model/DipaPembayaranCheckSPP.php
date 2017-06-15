<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaPembayaranCheckSPP extends Model
{
    protected $primaryKey = 'dipa_pmb_check_spp_id';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_pmb_check_spp';

    public function pembayaranspp(){
        return $this->belongsTo('App\Model\DipaPembayaran','dipa_pembayaran_id');
    }
}
