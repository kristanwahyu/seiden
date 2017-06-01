<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaKomponen extends Model
{
    protected $primaryKey = 'dipa_idKomp';
    protected $guarded = ['updated_at'];
    protected $table = 'dipa_komponen';

    public function subOutput(){
        return $this->belongsTo('App\Model\DipaSubOutput','dipa_idSubOut');
    }
    public function subKomponen(){
        return $this->hasMany('App\Model\DipaKomponen','dipa_idKomp');
    }
}
