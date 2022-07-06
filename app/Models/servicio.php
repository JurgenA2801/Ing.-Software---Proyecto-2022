<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use HasFactory; 

    public function reservacion() { 
        return $this->hasOne(reservacion::class);
    } 

    public function count(){ 
        return $this->reservacion()->count();
    } 

    public function agregarReserva($reserva)
    {
        return $this->reservacion()->save($reserva);
    }
}
