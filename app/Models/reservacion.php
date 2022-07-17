<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservacion extends Model
{
    use HasFactory; 

    protected $fillable = ['cliente_id', 'numeroVuelo']; 

    public function agregarServicio($id) { 
        return $this->servicios()->attach($id);
    } 

    public function eliminarServicio($id){ 
        
        return $this->servicios()->detach($id);
    }

    public function cliente()
    {
        return $this->belongsTo(cliente::class);
    }  

    public function gasto() { 
        return $this->hasMany(gasto::class);
    }  
   
    public function agregarGasto($gasto){ 
       
        return $this->gasto()->save($gasto);
       
       } 


    public function countCliente(){ 
        return $this->cliente()->count();
    
    } 

    public function servicios() { 
        return $this->belongsToMany(servicio::class);
    } 

    public function countServicio()
    {
        return $this->servicios()->count();
    }
 
    public function desasociarCliente(){ 

        return $this->update(['cliente_id' => null]);
    } 

    public function eliminar($id){ 

        $reserva = reservacion::find($id);
 
        $reserva->delete();
    }  

    public function cantidadReserva(){ 

        $reservas = reservacion::all();
 
        return $reservas->count();
     }  

   
    
}
