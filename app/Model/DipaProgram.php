<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaProgram extends Model
{
    //
    protected $primaryKey = 'dipa_id_program';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_program';

    public function tahun(){
		return $this->belongsTo('App\Model\DipaTahunAnggaran', 'dipa_id_tahun_anggaran');
	} 
    public function satuanKerja(){
        return $this->belongsTo('App\Model\DipaSatKer','dipa_id_satuan_kerja');
    }
    public function kegiatan(){
        return $this->hasMany('App\Model\DipaKegiatan','dipa_id_program');
    }
}
 