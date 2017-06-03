<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaTahunAnggaran extends Model
{
    //tbl_tahun_anggaran ga punya timestamps
    public $timestamps = false;

    protected $primaryKey = 'dipa_id_tahun_anggaran';
    protected $fillable = ['dipa_tahun_anggaran', 'dipa_status'];
    protected $table = 'tbl_tahun_anggaran';

     public function program(){
        return $this->hasMany('App\Model\DipaProgram','dipa_id_tahun_anggaran','dipa_id_tahun_anggaran');
    }
}
