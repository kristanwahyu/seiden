<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    //
    protected $primaryKey = 'kite_id_vendor';
    protected $fillable = ['kite_nama_vendor','kite_kode_vendor','kite_alamat_vendor','deleted_at'];
    protected $guarded = ['updated_at'];
    protected $table = 'kite_tabel_vendor';

    public function negara(){
        return $this->belongsTo('App\Model\negara','kite_id_negara');
    }
    public function barang(){
        return $this->hasMany('App\Model\masterbarang', 'kite_vendor_barang');
    }
}
