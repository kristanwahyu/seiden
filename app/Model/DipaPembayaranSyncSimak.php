<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaPembayaranSyncSimak extends Model
{
    protected $primaryKey = 'dipa_pmb_check_sink_id';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_pmb_check_sink_simak';

    public function pembayaransyncsimak(){
        return $this->belongsTo('App\Model\DipaPembayaran','dipa_pembayaran_id');
    }
}
