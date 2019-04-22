<?php

namespace GoldenVision;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use Notifiable;
   protected $table = 'gv_usuarios';  
   protected $primaryKey='us_cedula'; 
   protected $fillable=[
    'us_cedula',
    'us_apellidos',
    'us_nombres',
    'us_correo',
    'us_telefono',
    'us_password',
    'us_estado'
   ];
   protected $hidden = [
    'us_password',
   ];
   public function getAuthPassword()
   {
       return $this->us_password;
   }
    
}
