<?php

namespace GoldenVision;

use Illuminate\Database\Eloquent\Model;

class Gv_lente extends Model
{
    protected $table = 'gv_lentes';  
    protected $primaryKey='le_id'; 
    public $timestamps = false;
    public function caracteristicas()
    {
        return $this->hasMany('GoldenVision\Gv_clente');
    }

}
