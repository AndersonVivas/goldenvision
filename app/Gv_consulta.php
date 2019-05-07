<?php

namespace GoldenVision;

use Illuminate\Database\Eloquent\Model;

class Gv_consulta extends Model
{
    protected $table = 'gv_consultas';  
    protected $primaryKey='co_id'; 
    public $timestamps = false;
    public function usuario()
    {
        return $this->belongsTo('GoldenVision\Gv_usuario','us_cedula');
    }
    public function paciente()
    {
        return $this->belongsTo('GoldenVision\Gv_paciente','pa_id');
    }
    public function sucursal()
    {
        return $this->belongsTo('GoldenVision\Gv_paciente','su_id');
    }
    public function sintomas()
    {
        return $this->belongsToMany('GoldenVision\Gv_sintoma','gv_consultas_sintomas','co_id','si_id')->withPivot('cos_otros');
    }
    public function caracteristicasCor()
    {
        return $this->belongsToMany('GoldenVision\Gv_ccorporal','gv_con_ccorporales','co_id','cc_id')->withPivot('coc_observaion');
    }
}
