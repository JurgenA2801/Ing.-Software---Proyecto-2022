<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory; 

    protected $fillable = ['cedula', 'name'];


    public function reservacion(){ 
       return $this->hasMany(reservacion::class);
    } 

    public function count(){
        return $this->reservacion()->count();
    }  

    public function agregarReserva($reserva){ 
       
     return $this->reservacion()->save($reserva);
    
    }
    public function cantidad_cliente(){/*No se si lo voy a ocupar */

        $clientes = cliente::all();

        return $clientes->count();
    }
    public function agregar() {
        return $this->save();
    } 
    public function editar($atributoAEditar){ 
        return $this->update(['cedula' => $atributoAEditar]);
    } 
    public function eliminar($id){ 

        $cliente = cliente::find($id);
 
        $cliente->delete();
    }  
    
}
