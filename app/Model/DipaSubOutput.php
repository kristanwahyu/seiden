<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaSubOutput extends Model
{
    protected $primaryKey = 'dipa_id_sub_output';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_sub_output';

    public function output(){
        return $this->belongsTo('App\Model\DipaOutput','dipa_id_output');
    }
    public function komponen(){
        return $this->hasMany('App\Model\DipaKomponen','dipa_id_sub_output');
    }
}
