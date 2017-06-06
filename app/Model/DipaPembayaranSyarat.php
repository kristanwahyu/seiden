<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaPembayaranSyarat extends Model
{
    protected $primaryKey = 'dipa_pembayaran_syarat_id';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_pembayaran_syarat';

    public function pembayaransyarat(){
        return $this->belongsTo('App\Model\DipaPembayaran','dipa_pembayaran_id');
    }
}
