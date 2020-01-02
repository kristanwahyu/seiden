<?php

namespace App\MOdel;

use Illuminate\Database\Eloquent\Model;

class masterbarang extends Model
{
    //
    protected $primaryKey = 'kite_id_barang';
    protected $guarded = ['updated_at'];
    protected $table = 'kite_tabel_barang';

    public function vendor(){
        return $this->belongsTo('App\Model\vendor','kite_id_vendor');
    }
    public function satuan(){
        return $this->belongsTo('App\Model\satuan','kite_id_satuan');
    }
    public function jenis(){
        return $this->belongsTo('App\Model\jenis','kite_id_jenis');
    }
    public function subproduksi(){
        return $this->belongsTo('App\Model\subproduksi','kite_id_subproduksi');
    }
    public function motif(){
        return $this->hasMany('App\Model\motif','kite_id_barang');
    }
}
