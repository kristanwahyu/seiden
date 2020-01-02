<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class subproduksi extends Model
{
    //
    protected $primaryKey = 'kite_id_subproduksi';
    protected $fillable = ['kite_nama_subproduksi','deleted_at'];
    protected $guarded = ['updated_at'];
    protected $table = 'kite_tabel_subproduksi';

    public function barang(){
        return $this->hasMany('App\Model\negara','kite_id_negara'); 
    }
}
