<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaRincian extends Model
{
    protected $primaryKey = 'dipa_id_detail_akun';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_akun_detail';

    public function AkunRincian(){
        return $this->belongsTo('App\Model\DipaAkun','dipa_id_akun');
    }
    
}
