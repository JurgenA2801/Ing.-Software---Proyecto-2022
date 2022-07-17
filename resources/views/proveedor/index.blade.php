@foreach($listaDeTodosLosProveedores as $item)
    
    nombre:{{$item->nombre}}
    correo:{{$item->correo}}
    observaciones{{$item->observaciones}}
    comisiones{{$item->comisiones}}
          
@endforeach