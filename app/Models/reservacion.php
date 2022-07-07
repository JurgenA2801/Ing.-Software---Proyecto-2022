<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservacion extends Model
{
    use HasFactory; 

    protected $fillable = ['cliente_id', 'numeroVuelo']; 

    public function agregarServicio($servicio) { 
        return $this->reserva_servicio()->save($servicio);
    }

    public function cliente()
    {
        return $this->belongsTo(cliente::class);
    } 

    public function countCliente(){ 
        return $this->cliente()->count();
    
    } 

    public function reserva_servicio()
    {
        return $this->belongsToMany(reserva_servicio::class, 'reserva_servicios');
    } 

    public function countServicio()
    {
        return $this->reserva_servicio()->count();
    }
 
    public function desasociarCliente(){ 

        return $this->update(['cliente_id' => null]);
    } 

    public function agregar() {
        return $this->save();
    } 

    public function editar($atributoAEditar){ 
        return $this->update(['numeroVuelo' => $atributoAEditar]);
    } 

    public function eliminar($id){ 

        $reserva = reservacion::find($id);
 
        $reserva->delete();
    }  

    public function cantidadReserva(){ 

        $reservas = reservacion::all();
 
        return $reservas->count();
     }  

     public function listarReservas(){ 
        
        return reservacion::all();
     }
    
}
