<?php

namespace Servicio;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table='feedbacks';
    public $primaryKey='id';
    public $timestamps=true;

    public function user(){
        return $this->belongsTo('Servicio\User');
    }
    // public function parent_user(){
    //     return $this->belongsTo('Servicio\Token');
    // }
}
