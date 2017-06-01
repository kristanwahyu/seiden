<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaSubOutput extends Model
{
    protected $primaryKey = 'dipa_idSubOut';
    protected $guarded = ['updated_at'];
    protected $table = 'dipa_subOutput';

    public function output(){
        return $this->belongsTo('App\Model\DipaOutput','dipa_idOut');
    }
    public function komponen(){
        return $this->hasMany('App\Model\DipaKomponen','dipa_idSubOut');
    }
}
