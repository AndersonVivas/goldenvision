<?php

namespace GoldenVision;

use Illuminate\Database\Eloquent\Model;

class Gv_localidad extends Model
{
    protected $table = 'gv_localidades';  
    protected $primaryKey='lo_id'; 
    public $timestamps = false;
    public function pacientes()
    {
        return $this->hasMany('GoldenVision\Gv_paciente');
    } 
    protected $fillable=[
        'lo_nombre'
        
    ];
}
