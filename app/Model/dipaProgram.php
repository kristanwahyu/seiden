<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dipaProgram extends Model
{
    //
    protected $primarykey = 'dipa_idProgram';
    protected $fillable = ['dipa_kodeProgram','dipa_namaProgram','dipa_idTAng','dipa_idSK'];

    public function tahun(){
		return $this->belongsTo('App\Model\dipaTahunAnggaran', 'dipa_idTAng');
	} 
    public function satker(){
        return $this->belongsTo('App\Model\dipaSatKer','dipa_idSK');
    }
    public function progKeg(){
        return $this->hasMany('App\Model\dipaKegiatan','dipa_idProgram','dipa_idProgram');
    }
}
