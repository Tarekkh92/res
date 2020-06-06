<?php

namespace Servicio;

use Illuminate\Database\Eloquent\Model;

class AnonymousFeedback extends Model
{
    protected $table='anonymous_feedbacks';
    public $primaryKey='id';
    public $timestamps=true;

    public function user(){
        return $this->belongsTo('Servicio\User');
    }
}
