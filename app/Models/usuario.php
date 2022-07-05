<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class usuario extends Model
{
    use HasFactory; 

    protected $fillable = ['rol_id', 'name'];

    public function agregar() { 
        return $this->save();
    }

    public function rol()
    {
        return $this->belongsTo(rol::class);
    } 

    public function count()
    {
        return $this->rol()->count();
    } 

    public function listar(){ 

        usuario::all();

    } 

    public function cantidad_usuarios(){ 

       $usuarios = usuario::all();

       return $usuarios->count();
    } 

    public function eliminar_usuario($id){ 

        $user = usuario::find($id);
 
        $user->delete();
    } 

    public function desasociar_usuario_de_rol()
    {
        return $this->update(['rol_id' => null]);
    
    } 

    public function editarUsuario(){ 

     return $this->update(['name' => 'Jurgen']);

    }
}
