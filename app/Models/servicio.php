<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use HasFactory; 
    protected $fillable = ['proveedor_id']; 

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
    public function agregarproveedores($servicio)
    {
        return $this->proveedor()->save($servicio);
    }

    public function cantidadservicio(){ 

        $servicio = servicio::all();
 
        return $servicio->count();
     }  
     public function proveedor()
    {
        return $this->belongsTo(proveedor::class);
    } 

    public function countproveedor(){ 
        return $this->proveedor()->count();
    
    } 
    public function desasociarproveedor(){ 

        return $this->update(['proveedor_id' => null]);
    } 
 

}
