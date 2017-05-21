
<div class="col s7">
  <table class="bordered highlight responsive-table">

    <thead class="blue-grey lighten-3">
      <tr>
        <th class="blue-grey lighten-3">Articulo</th>
        <th class="blue-grey lighten-3">Valor compra</th>
        <th class="blue-grey lighten-3">Valor venta</th>
        <th class="blue-grey lighten-3">Cantidad</th>
        <th class="blue-grey lighten-3"></th>
        <th class="blue-grey lighten-3"></th>
      </tr>
    </thead>

    <tbody>

      @foreach($productos as $producto) 
                  
        <tr>

          <td>{{ $producto->nombre }}</td>
          <td>{{ $producto->precio_de_compra }}</td>
          <td>{{ $producto->precio_de_venta }}</td>
          <td>{{ $producto->cantidad }}</td>

                  
          <td class="scrollable">
            <a class="a_editar tooltipped waves-effect waves-circle waves-light btn-floating secondary-content amber darken-1" data-tooltip="editar" data-position="bottom" data-delay="5" href="#update_window"
            onclick="mostrar({{$producto->id}});">
              <i class="small material-icons left">edit</i>
            </a>
          </td>
                
          <td>
            <a class="a_borrar tooltipped waves-effect waves-circle waves-light btn-floating secondary-content amber darken-1" data-tooltip="eliminar" data-position="bottom" data-delay="5" id="" href="#delete_window" 
            onclick="borrar({{$producto->id}});">
              <i class="small material-icons left">delete</i>
            </a>
          </td>
        </tr>

      @endforeach
           
    </tbody>


  </table>

  {!! $productos->links() !!}   

</div>

<div class="col s5">
  <table class="bordered highlight responsive-table">

    <thead class="blue-grey lighten-3">
      <tr>
        <th class="blue-grey lighten-3">Ganancia Unitaria</th>
        <th class="blue-grey lighten-3">Total Compra</th>
        <th class="blue-grey lighten-3">Total venta</th>
        <th class="blue-grey lighten-3">Ganancia Total</th>
      </tr>
    </thead>

    <tbody>

      @foreach($productos as $producto) 
                  
        <tr>

          <td id="tt" style="height: 69px;">{{ $producto->ganancia_unitaria }}</td>
          <td style="height: 69px;">{{ $producto->total_compra}}</td>
          <td style="height: 69px;">{{ $producto->total_venta}}</td>
          <td style="height: 69px;">{{ $producto->ganancia_total}}</td>
          




        </tr>

      @endforeach
           
    </tbody>


  </table>



 