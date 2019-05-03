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
}
