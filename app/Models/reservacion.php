<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservacion extends Model
{
    use HasFactory; 

    protected $fillable = ['cliente_id'];

    public function cliente()
    {
        return $this->belongsTo(cliente::class);
    } 

    public function countCliente(){ 
        return $this->cliente()->count();
    
    } 

    public function servicio()
    {
        return $this->belongsTo(servicio::class);
    } 

    public function countServicio()
    {
        return $this->servicio()->count();
    }
 
    public function desasociarCliente(){ 

        return $this->update(['cliente_id' => null]);
    }
    
}
