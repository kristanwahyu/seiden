<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dipaKomponen extends Model
{
    protected $primarykey = 'dipa_idKomp';
    protected $fillable = ['dipa_kodeKomp','dipa_namaKomp','dipa_idSubOut'];

    public function subOutKomp(){
        return $this->belongsTo('App\Model\dipaSubOutput','dipa_idSubOut');
    }
    public function subKomp(){
        return $this->hasMany('App\Model\dipaKomponen','dipa_idKomp','dipa_idKomp');
    }
}
