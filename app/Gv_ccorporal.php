<?php

namespace GoldenVision;

use Illuminate\Database\Eloquent\Model;

class Gv_ccorporal extends Model
{
    protected $table = 'gv_ccorporales';  
    protected $primaryKey='cc_id'; 
    public $timestamps = false;
    public function consultas()
    {
        return $this->belongsToMany('GoldenVision\Gv_consulta','gv_con_ccorporales','cc_id','co_id')->withPivot('coc_observaion');
    }
}
