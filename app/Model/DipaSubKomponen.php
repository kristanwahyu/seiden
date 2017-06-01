<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaSubKomponen extends Model
{
    protected $primaryKey = 'dipa_idSubKomp';
    protected $guarded = ['updated_at'];
    protected $table = 'dipa_subKomponen';

    public function subKomponen(){
        return $this->belongsTo('App\Model\DipaKomponen','dipa_idKomp');
    }
    public function akun(){
        return $this->hasMany('App\Model\DipaAkun','dipa_idSubKomp');
    }
}
