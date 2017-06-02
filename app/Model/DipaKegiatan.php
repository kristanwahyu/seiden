<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaKegiatan extends Model
{
    protected $primaryKey = 'dipa_id_kegiatan';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_kegiatan';

    public function output(){
        return $this->hasMany('App\Model\DipaOutput','dipa_id_kegiatan');
    }
    public function program(){
        return $this->belongsTo('App\Model\DipaProgram','dipa_id_program');
    }
} 
