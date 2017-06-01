<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class dipaAkun extends Model
{
    protected $primarykey = 'dipa_idAkun';
    protected $fillable = ['dipa_kodeAkun','dipa_namaAkun','dipa_idSubKomp'];

    public function subKompAkun(){
        return $this->belongsTo('App\Model\dipaSubKomponen','dipa_idSubKomp');
    }
    public function AkunRincian(){
        return $this->hasMany('App\Model\dipaRincian','dipa_idAkun','dipa_idAkun');
    }
}
