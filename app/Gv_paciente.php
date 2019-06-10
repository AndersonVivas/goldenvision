<?php

namespace GoldenVision;

use Illuminate\Database\Eloquent\Model;

class Gv_paciente extends Model
{
    protected $table = 'gv_pacientes';
    public $timestamps = false;
    protected $primaryKey='pa_id'; 
    public function localidad()
    {
        return $this->belongsTo('GoldenVision\Gv_localidad', 'lo_id');
    }
    public function consultas()
    {
        return $this->hasMany('GoldenVision\Gv_consulta','co_id','pa_id');
    }
}
