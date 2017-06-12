<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaPembayaranCheckSPM extends Model
{
    protected $primaryKey = 'dipa_pmb_check_spm_id';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_pmb_check_spm';

    public function pembayaran(){
        return $this->belongsTo('App\Model\DipaPembayaran','dipa_pembayaran_id');
    }
}
