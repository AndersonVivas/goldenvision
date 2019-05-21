<?php

namespace GoldenVision;

use Illuminate\Database\Eloquent\Model;

class Gv_clente extends Model
{
    protected $table = 'gv_clentes';  
    protected $primaryKey='cle_id'; 
    public $timestamps = false;
    public function lente()
    {
        return $this->belongsTo('GoldenVision\Gv_lente','le_id');
    }
    public function consultas()
    {
        return $this->belongsToMany('GoldenVision\Gv_consulta','gv_consulta_lentes','cle_id','co_id');
    }
}
