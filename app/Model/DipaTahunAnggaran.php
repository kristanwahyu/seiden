<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaTahunAnggaran extends Model
{
    protected $primaryKey = 'dipa_idTAng';
    protected $guarded = ['updated_at'];
    protected $table = 'dipa_tahunAnggaran';

     public function program(){
        return $this->hasMany('App\Model\DipaProgram','dipa_idTAng','dipa_idTAng');
    }
}
