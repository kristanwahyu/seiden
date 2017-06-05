<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbl_pengguna';
    protected $primaryKey = 'dipa_id_pengguna';
    protected $guarded = ['updated_at'];
    /**
     * The attributes that should be hidden for arrays.
     * 
     * @var array
     */
    protected $hidden = [
        'dipa_password_pengguna', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->dipa_password_pengguna;
    }

    public function satuanKerja()
    {
        return $this->belongsTo('App\Model\DipaSatKer','dipa_id_satuan_kerja');
    }
}
