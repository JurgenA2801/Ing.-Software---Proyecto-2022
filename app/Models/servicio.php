<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use HasFactory; 

    public function reservacions() { 
        return $this->belongsToMany(reservacion::class);
    } 

    public function count(){ 
        return $this->reserva_servicio()->count();
    } 

    public function agregarReserva($reserva)
    {
        return $this->reserva_servicio()->save($reserva);
    }
}
