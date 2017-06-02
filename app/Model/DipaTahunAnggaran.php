<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaTahunAnggaran extends Model
{
    protected $primaryKey = 'dipa_id_tahun_anggaran';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_tahun_anggaran';

     public function program(){
        return $this->hasMany('App\Model\DipaProgram','dipa_id_tahun_anggaran','dipa_id_tahun_anggaran');
    }
}
