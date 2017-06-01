<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dipaSatKer extends Model
{
    protected $primarykey = 'dipa_idSK';
    protected $fillable = ['dipa_kodeSK','dipa_namaSK','dipa_statusSK'];

     public function satker(){
        return $this->hasMany('App\Model\dipaProgram','dipa_idSK','dipa_idSK');
    }
}
