<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dipaTahunAnggaran extends Model
{
    protected $primarykey = 'dipa_idTAng';
    protected $fillable = ['dipa_tahun','dipa_statusTA'];

     public function satker(){
        return $this->hasMany('App\Model\dipaProgram','dipa_idTAng','dipa_idTAng');
    }
}
