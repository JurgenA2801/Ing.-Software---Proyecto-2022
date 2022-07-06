<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory; 

    public function reservacion(){ 
       return $this->hasMany(reservacion::class);
    } 

    public function count(){
        return $this->reservacion()->count();
    }  

    public function agregarReserva($reserva){ 
       
     return $this->reservacion()->save($reserva);
    
    }
}
