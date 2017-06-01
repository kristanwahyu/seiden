<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaRincian extends Model
{
    protected $primaryKey = 'dipa_idRincian';
    protected $guarded = ['updated_at'];
    protected $table = 'dipa_rincian';

    public function AkunRincian(){
        return $this->belongsTo('App\Model\DipaSubKomponen','dipa_idSubKomp');
    }
    
}
