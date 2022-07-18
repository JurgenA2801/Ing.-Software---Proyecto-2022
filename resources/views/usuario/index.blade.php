@foreach($listaDeUsuarios as $item)
    
    Rol:{{$item->rol_id}}
    nombre:{{$item->name}}
    password:{{$item->password}}  
          
@endforeach