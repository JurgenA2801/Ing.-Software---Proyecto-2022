<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use HasFactory; 

    public function reserva_servicio() { 
        return $this->belongsToMany(reserva_servicio::class, 'reserva_servicios');
    } 

    public function count(){ 
        return $this->reserva_servicio()->count();
    } 

    public function agregarReserva($reserva)
    {
        return $this->reserva_servicio()->save($reserva);
    }
}
