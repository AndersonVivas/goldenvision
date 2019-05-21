<?php

namespace GoldenVision;

use Illuminate\Database\Eloquent\Model;

class Gv_sucursal extends Model
{
    protected $table = 'gv_sucursales';  
    protected $primaryKey='su_id'; 
    public $timestamps = false;

    public function consultas()
    {
        return $this->hasMany('GoldenVision\Gv_consulta','co_id');
    }
}
