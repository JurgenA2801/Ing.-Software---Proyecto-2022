<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva_servicio extends Model
{
    use HasFactory; 
   
    protected $fillable = ['servicio_id, reservacion_id']; 
} 

