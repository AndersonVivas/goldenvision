<?php

namespace GoldenVision;

use Illuminate\Database\Eloquent\Model;

class Gv_rol extends Model
{
    protected $table = 'gv_roles';
    public $timestamps = false;
    protected $primaryKey='ro_id';

    public function usuarios()
    {
        return $this->hasMany('GoldenVision\Gv_usuario');
    }
}
