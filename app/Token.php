<?php

namespace Servicio;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table='tokens';
    public $primaryKey='id';
    public $timestamps=true;

//     public function child_user(){
//         return $this->hasMany('Servicio\Feedback');
//     }
}
