<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaSatKer extends Model
{
    protected $primaryKey = 'dipa_id_satuan_kerja';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_satuan_kerja';

     public function program(){
        return $this->hasMany('App\Model\DipaProgram','dipa_id_satuan_kerja');
    }
}
