@foreach($losServicios as $item)
    
    fecha:{{$item->fecha}}
    observaciones{{$item->observaciones}}
    Proveedor{{$item->proveedor_id}}
          
@endforeach