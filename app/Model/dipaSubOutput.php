<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dipaSubOutput extends Model
{
    protected $primarykey = 'dipa_idSubOut';
    protected $fillable = ['dipa_kodeSubOut','dipa_namaSubOut','dipa_idOut'];

    public function subOut(){
        return $this->belongsTo('App\Model\dipaOutput','dipa_idOut');
    }
    public function subOutKomp(){
        return $this->hasMany('App\Model\dipaKomponen','dipa_idSubOut','dipa_idSubOut');
    }
}
