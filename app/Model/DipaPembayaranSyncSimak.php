<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaPembayaranSyncSimak extends Model
{
    protected $primaryKey = 'dipa_pembayaran_checklist_sinkronisasi_id';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_pembayaran_checklist_sinkronisasi_simak';

    public function pembayaransyncsimak(){
        return $this->belongsTo('App\Model\DipaPembayaran','dipa_pembayaran_id');
    }
}
