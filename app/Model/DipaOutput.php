<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaOutput extends Model
{
    protected $primaryKey = 'dipa_id_output';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_output';

    public function kegiatan(){
        return $this->belongsTo('App\Model\DipaKegiatan','dipa_id_kegiatan');
    }
    public function subOutput(){
        return $this->hasMany('App\Model\DipaSubOutput','dipa_id_output');
    }
}
