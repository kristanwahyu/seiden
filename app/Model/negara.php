<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class negara extends Model
{
    //
    protected $primaryKey = 'kite_id_negara';
    protected $fillable = ['kite_nama_negara','kite_kode_negara','deleted_at'];
    protected $guarded = ['updated_at'];
    protected $table = 'kite_tabel_negara';
}
