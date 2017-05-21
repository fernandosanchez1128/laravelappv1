    
    <table id = tablaVta >
    	
	    <thead>
	    	<tr> 
	    	    <th style="background-color: #b0bec5;">Nombre Articulo</th>
	            <th style="background-color: #b0bec5;">Valor</th>
	            <th style="background-color: #b0bec5;">Cantidad</th>
	    	</tr>
	    </thead>

    @foreach($productos as $producto)
    	<tr>
		    <td><ul id="items"><li style="z-index: 1;">{{$producto->nombre}}</li></ul></td>
	    	<td>{{$producto->precio_de_venta}}</td>
	    	<td>{{$producto->cantidad}}</td>
	    </tr>
	@endforeach
	</table>

	





<script>
 /*dragable*/
 $("#items li").draggable({
        cursor: "move",
        revert: "invalid",
        helper: "clone"
 });

</script>
