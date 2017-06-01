<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaOutput extends Model
{
    protected $primaryKey = 'dipa_idOut';
    protected $guarded = ['updated_at'];
    protected $table = 'dipa_output';

    public function kegiatan(){
        return $this->belongsTo('App\Model\DipaKegiatan','dipa_idKeg');
    }
    public function subOutput(){
        return $this->hasMany('App\Model\DipaKomponen','dipa_idOut');
    }
}
