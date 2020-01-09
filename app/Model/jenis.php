<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    //
    protected $primaryKey = 'kite_id_jenis';
    protected $fillable = ['kite_nama_jenis','deleted_at'];
    protected $guarded = ['updated_at'];
    protected $table = 'kite_tabel_jenis';

    public function barang(){
        return $this->hasMany('App\Model\masterbarang','kite_jenis_barang');
    }
    
}
