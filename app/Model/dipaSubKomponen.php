<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dipaSubKomponen extends Model
{
   protected $primarykey = 'dipa_idSubKomp';
    protected $fillable = ['dipa_kodeSubKomp','dipa_namaSubKomp','dipa_idKomp'];

    public function subKomp(){
        return $this->belongsTo('App\Model\dipaKomponen','dipa_idKomp');
    }
    public function subKompAkun(){
        return $this->hasMany('App\Model\dipaAkun','dipa_idSubKomp','dipa_idSubKomp');
    }
}
