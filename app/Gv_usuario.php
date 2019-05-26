<?php

namespace GoldenVision;

use Illuminate\Database\Eloquent\Model;

class Gv_usuario extends Model
{
    protected $table = 'gv_usuarios';
    public $timestamps = false;
    protected $primaryKey='us_cedula';
    public function rol()
    {
        return $this->belongsTo('GoldenVision\Gv_rol', 'ro_id');
    }
    public function authorizeRol($rol){
         if($this->hasRole($rol)){
             return true;
         }
         abort(401,'No puedes realizar esta accion');
    }
    public function hasRole($role){
        if($this->rol()->where('ro_rol',$role)->first()){
            return true;
        }
        return false;
    }
    public function consultas()
    {
        return $this->hasMany('GoldenVision\Gv_consulta');
    }
    
    
}
