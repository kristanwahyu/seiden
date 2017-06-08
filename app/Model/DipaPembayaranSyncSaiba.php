<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaPembayaranSyncSaiba extends Model
{
    protected $primaryKey = 'dipa_pembayaran_checklist_sinkronisasi_id';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_pembayaran_checklist_sinkronisasi_saiba';

    public function pembayaransyncsaiba(){
        return $this->belongsTo('App\Model\DipaPembayaran','dipa_pembayaran_id');
    }
}
