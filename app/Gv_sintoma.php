<?php

namespace GoldenVision;

use Illuminate\Database\Eloquent\Model;

class Gv_sintoma extends Model
{
    protected $table = 'gv_sintomas';  
    protected $primaryKey='si_id'; 
    public $timestamps = false;
    public function consultas()
    {
        return $this->belongsToMany('GoldenVision\Gv_consulta','Gv_consultas_sintomas','si_id','co_id')->withPivot('cos_otros');
    }
}
