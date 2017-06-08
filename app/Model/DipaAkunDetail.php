<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaAkunDetail extends Model
{
    protected $primaryKey = 'dipa_id_detail_akun';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_akun_detail';

    public function akun(){
        return $this->belongsTo('App\Model\DipaAkun','dipa_id_akun');
    }
    public function pembayaran(){
        return $this->hasMany('App\Model\DipaPembayaran','dipa_id_detail_akun');
    }
}
