<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaAkun extends Model
{
    protected $primaryKey = 'dipa_idAkun';
    protected $guarded = ['updated_at'];
    protected $table = 'dipa_akun';

    public function subKomponen(){
        return $this->belongsTo('App\Model\DipaSubKomponen','dipa_idSubKomp');
    }
    public function rincian(){
        return $this->hasMany('App\Model\DipaRincian','dipa_idAkun');
    }
}
