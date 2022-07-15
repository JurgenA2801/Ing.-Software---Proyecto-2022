<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gasto extends Model
{
    use HasFactory;
    protected $fillable = ['monto']; 

    public function count(){
        return $this->gasto()->count();
    }

    public function cantidad_gasto(){

        $gastos = gasto::all();

        return $gastos->count();
    }
    public function eliminar($id){ 

        $gastos = gasto::find($id);
 
        $gastos->delete();
    } 

    public function editar($atributoAEditar){ 
        return $this->update(['monto' => $atributoAEditar]);
    } 

}
