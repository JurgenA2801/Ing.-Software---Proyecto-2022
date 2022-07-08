<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class proveedor extends Model
{
    use HasFactory; 
    protected $fillable = ['comisiones']; 

    public function agregar() { 
        return $this->save();
    }
    public function servicio(){ 
        return $this->hasMany(servicio::class);
     } 
 
     public function count(){
         return $this->servicio()->count();
     }  
 
     public function agregarservicio($servicio){ 
        
      return $this->servicio()->save($servicio);
     
     }
     public function cantidadproveedor(){ 

        $proveedor = proveedor::all();
 
        return $proveedor->count();
     }  
     public function eliminar($id){ 

        $proveedor = proveedor::find($id);
 
        $proveedor->delete();
    }  
    public function editar($atributoAEditar){ 
        return $this->update(['comisiones' => $atributoAEditar]);
    } 
}