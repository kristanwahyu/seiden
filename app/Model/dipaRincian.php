<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dipaRincian extends Model
{
    protected $primarykey = 'dipa_idRincian';
    protected $fillable = ['dipa_kodeRincian','dipa_namaRincian','dipa_volume','dipa_satuan','dipa_hargaSat','dipa_idSubKomp'];

    public function AkunRincian(){
        return $this->belongsTo('App\Model\dipaSubKomponen','dipa_idSubKomp');
    }
    
}
