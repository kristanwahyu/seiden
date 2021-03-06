<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaPembayaran extends Model
{
    protected $primaryKey = 'dipa_pembayaran_id';
    protected $guarded = ['updated_at'];
    protected $table = 'tbl_dipa_pembayaran';

    public function syaratPembayaran(){
        return $this->hasMany('App\Model\DipaPembayaranSyarat','dipa_pembayaran_id');
    }
    public function PembayaranCheckSPM(){
        return $this->hasOne('App\Model\DipaPembayaranCheckSPM','dipa_pembayaran_id');
    }
    public function PembayaranCheckSPP(){
        return $this->hasOne('App\Model\DipaPembayaranCheckSPP','dipa_pembayaran_id');
    }
    public function PembayaranCheckSP2D(){
        return $this->hasOne('App\Model\DipaPembayaranCheckSP2D','dipa_pembayaran_id');
    }
    public function PembayaranSyncSaiba(){
        return $this->hasOne('App\Model\DipaPembayaranSyncSaiba','dipa_pembayaran_id');
    }
    public function PembayaranSyncSimak(){
        return $this->hasOne('App\Model\DipaPembayaranSyncSimak','dipa_pembayaran_id');
    }
    public function PembayaranSyncPerlengkapan(){
        return $this->hasOne('App\Model\DipaPembayaranSyncPerlengkapan','dipa_pembayaran_id');
    }
    public function akunDetail(){
        return $this->belongsTo('App\Model\DipaAkunDetail','dipa_id_detail_akun');
    }
}
