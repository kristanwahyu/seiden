<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class motif extends Model
{
    //
    protected $primaryKey = 'kite_id_motif';
    protected $guarded = ['updated_at'];
    protected $table = 'kite_tabel_motif';

    public function barang(){
        return $this->belongsTo('App\Model\barang','kite_id_barang');
    }
}
