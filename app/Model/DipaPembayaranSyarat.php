<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaPembayaranSyarat extends Model
{
    protected $primaryKey = 'dipa_pmb_syarat_id';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_pmb_syarat';

    public function pembayaran(){
        return $this->belongsTo('App\Model\DipaPembayaran','dipa_pembayaran_id');
    }
}
