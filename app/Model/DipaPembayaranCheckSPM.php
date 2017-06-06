<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaPembayaranCheckSPM extends Model
{
    protected $primaryKey = 'dipa_pembayaran_checklist_spm_id';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_pembayaran_checklist_spm';

    public function pembayaranspm(){
        return $this->belongsTo('App\Model\DipaPembayaran','dipa_pembayaran_id');
    }
}
