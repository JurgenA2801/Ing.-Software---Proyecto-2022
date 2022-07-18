<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    use HasFactory;
    
    public function usuario()
    {
        return $this->hasOne(usuario::class);
    } 

    public function agregarUsuario($usuario) { 
        return $this->usuario()->save($usuario);
    }

    public function count()
    {
        return $this->usuario()->count();
    } 

   
}
