<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Inicio</th>
      <th scope="col">Cierre</th>
      <th scope="col">Hora cierre</th>
      <th scope="col">Estado</th>
      <th scope="col">Numero de vuelo</th>
      <th scope="col">Tarifa</th>
      <th scope="col">Cliente</th>
      <th scope="col">Cantidad de pasajeros</th>
      <th scope="col">observaciones</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($todasLasReservas as $item)
    <tr>
      <td>{{$item -> id	}}</td>
      <td>{{$item -> fechaInicio}}</td>
      <td>{{$item -> fechaCierre}}</td>  
      <td>{{$item->horaCierre}}</td>
      <td>{{$item->estadoServicio}}</td>  
      <td>{{$item->numeroVuelo}}</td>  
      <td>{{$item->tarifa}}</td> 
      <td>{{$item->cantidadPasajeros}}</td>  
      <td>{{$item->observaciones}}</td> 
      <td>{{$item->cliente_id}}</td>  
      
    @endforeach
  </tbody>
</table>