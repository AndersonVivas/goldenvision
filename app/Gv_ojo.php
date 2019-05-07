<?php

namespace GoldenVision;

use Illuminate\Database\Eloquent\Model;

class Gv_ojo extends Model
{
    protected $table = 'gv_ojos';  
    protected $primaryKey='oj_id'; 
    public $timestamps = false;
    public function consultas()
    {
        return $this->belongsToMany('GoldenVision\Gv_consulta','gv_keratrometria','oj_id','co_id')
        ->withPivot('ke_k1','ke_grk1',
        'ke_k2','ke_grrs',
        'ke_km','ke_grkm',
        'ke_isv','ke_iha','ke_iva','ke_ihd','ke_ki','ke_rmin','ke_cki','ke_tkc',
        'ke_paquip','ke_paquio','ke_xp','ke_xo','ke_yp','ke_yo'
    );
    }
}
