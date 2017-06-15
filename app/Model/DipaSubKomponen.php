<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaSubKomponen extends Model
{
    protected $primaryKey = 'dipa_id_sub_komponen';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_sub_komponen';

    public function komponen(){
        return $this->belongsTo('App\Model\DipaKomponen','dipa_id_komponen');
    }
    public function akun(){
        return $this->hasMany('App\Model\DipaAkun','dipa_id_sub_komponen');
    }
}
