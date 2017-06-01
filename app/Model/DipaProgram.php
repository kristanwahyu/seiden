<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaProgram extends Model
{
    //
    protected $primaryKey = 'dipa_idProgram';
    protected $guarded = ['updated_at'];
    protected $table = 'dipa_program';

    public function tahun(){
		return $this->belongsTo('App\Model\DipaTahunAnggaran', 'dipa_idTAng');
	} 
    public function satker(){
        return $this->belongsTo('App\Model\DipaSatKer','dipa_idSK');
    }
    public function kegiatan(){
        return $this->hasMany('App\Model\DipaKegiatan','dipa_idProgram');
    }
}
