<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaPembayaranSyncPerlengkapan extends Model
{
    protected $primaryKey = 'dipa_pmb_check_sink_id';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_pmb_check_sink_perlengkapan';

    public function pembayaransyncperkap(){
        return $this->belongsTo('App\Model\DipaPembayaran','dipa_pembayaran_id');
    }
}
