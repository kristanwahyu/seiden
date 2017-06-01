<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dipaOutput extends Model
{
    protected $primarykey = 'dipa_idOut';
    protected $fillable = ['dipa_kodeOut','dipa_namaOut','dipa_idKeg'];

    public function kegOut(){
        return $this->belongsTo('App\Model\dipaKegiatan','dipa_idKeg');
    }
    public function subOut(){
        return $this->hasMany('App\Model\dipaSubOutput','dipa_idOut','dipa_idOut');
    }
}
