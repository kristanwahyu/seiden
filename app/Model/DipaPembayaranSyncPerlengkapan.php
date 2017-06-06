<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaPembayaranSyncPerlengkapan extends Model
{
    protected $primaryKey = 'dipa_pembayaran_checklist_sinkronisasi_id';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_pembayaran_checklist_sinkronisasi_perlengkapan';

    public function pembayaransyncperkap(){
        return $this->belongsTo('App\Model\DipaPembayaran','dipa_pembayaran_id');
    }
}
