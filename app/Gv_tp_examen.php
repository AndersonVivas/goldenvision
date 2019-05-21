<?php

namespace GoldenVision;

use Illuminate\Database\Eloquent\Model;

class Gv_tp_examen extends Model
{
    protected $table = 'gv_tp_examenes';  
    protected $primaryKey='te_id'; 
    public $timestamps = false;
       
    public function consultas()
    {
        return $this->belongsToMany('GoldenVision\Gv_consulta','gv_medidas_oculares','te_id','co_id')
        ->withPivot('mo_esfod','mo_esfoi',
        'mo_ciod','mo_cioi',
        'mo_ejod','mo_ejoi',
        'mo_dnpod','mo_dnpoi',
        'mo_avlod','mo_avloi',
        'mo_avcod','mo_avcoi',
        'mo_addod','mo_addoi',
        'mo_alturaod','mo_alturaoi',
        'mo_aumentar',
    );
    }
}
