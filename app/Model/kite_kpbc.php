<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kite_kpbc extends Model
{
    //
    protected $primaryKey = 'kite_id_kpbc';
    protected $fillable = ['kite_kode_kpbc', 'kite_nama_kpbc', 'kite_eselon_kpbc', 'kite_kota_kpbc'];
    protected $guarded = ['updated_at'];
    protected $table = 'kite_tabel_kpbc';
    protected $dates = ['deleted_at'];
}
