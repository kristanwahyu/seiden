<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DipaSatKer extends Model
{
    protected $primaryKey = 'dipa_idSK';
    protected $guarded = ['updated_at'];
    protected $table = 'dipa_satKer';

     public function program(){
        return $this->hasMany('App\Model\DipaProgram','dipa_idSK');
    }
}
