<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaKegiatan extends Model
{
    protected $primaryKey = 'dipa_idKeg';
    protected $guarded = ['updated_at'];
    protected $table = 'dipa_kegiatan';

    public function output(){
        return $this->hasMany('App\Model\DipaOutput','dipa_idOut','dipa_idOut');
    }
    public function program(){
        return $this->belongsTo('App\Model\DipaProgram','dipa_idProgram');
    }
}
