<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use HasFactory; 
    protected $fillable = ['proveedor_id', 'fecha']; 
    public function agregar() {
        return $this->save();
    } 
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
    public function agregarproveedores($reserva)
    {
        return $this->proveedor()->save($reserva);
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
    public function eliminar($id){ 

        $servicio = servicio::find($id);
 
        $servicio->delete();
    }  
    
    public function editar($atributoAEditar){ 
        return $this->update(['fecha' => $atributoAEditar]);
    } 
}
