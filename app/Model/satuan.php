<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
    //
    protected $primaryKey = 'kite_id_satuan';
    protected $fillable = ['kite_nama_satuan','deleted_at'];
    protected $guarded = ['updated_at'];
    protected $table = 'kite_tabel_satuan';

    public function barang(){
        return $this->hasMany('App\Model\masterbarang','kite_satuan_barang');
    }
}
