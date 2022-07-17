<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gasto extends Model
{
    use HasFactory;
   
    protected $fillable = ['reservacion_id']; 

    public function count(){
        return $this->gasto()->count();
    }

    public function cantidad_gasto(){

        $gastos = gasto::all();

        return $gastos->count();
    } 

    public function reservacion()
    {
        return $this->belongsTo(reservacion::class);
    }  

    public function desasociarReserva(){ 

        return $this->update(['reservacion_id' => null]);
    }   




}
