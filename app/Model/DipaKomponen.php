<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaKomponen extends Model
{
    protected $primaryKey = 'dipa_id_komponen';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_komponen';

    public function subOutput(){
        return $this->belongsTo('App\Model\DipaSubOutput','dipa_id_sub_output');
    }
    public function subKomponen(){
        return $this->hasMany('App\Model\DipaKomponen','dipa_id_komponen');
    }
} 
