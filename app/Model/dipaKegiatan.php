<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dipaKegiatan extends Model
{
    protected $primarykey = 'dipa_idKeg';
    protected $fillable = ['dipa_kodeKeg','dipa_namaKeg','dipa_idProgram'];

    public function kegOut(){
        return $this->hasMany('App\Model\dipaOutput','dipa_idOut','dipa_idOut');
    }
    public function progKeg(){
        return $this->belongsTo('App\Model\dipaProgram','dipa_idProgram');
    }
}
