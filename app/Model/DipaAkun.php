<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaAkun extends Model
{
    protected $primaryKey = 'dipa_id_akun';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_akun';

    public function subKomponen(){
        return $this->belongsTo('App\Model\DipaSubKomponen','dipa_id_sub_komponen');
    }
    public function rincian(){
        return $this->hasMany('App\Model\DipaRincian','dipa_id_akun');
    }
}
 