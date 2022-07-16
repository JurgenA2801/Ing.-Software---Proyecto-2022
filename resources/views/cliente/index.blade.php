@foreach($losClientes as $item)
    
    cedula:{{$item->cedula}}
    nombre:{{$item->nombre}}
    correo:{{$item->correo}}  
          
@endforeach