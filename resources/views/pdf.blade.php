 

<html>

<head>
	
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<style type="text/css">

    body {
      border-left: double border;
      border-bottom: double border;
      background-image: url('/images/logo_trans_logo2.png');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
    }
    table {
      margin-top: 20px;
      border: solid;
    }

	</style>

</head>



  <body>

    <h3 class="black-text center">Reporte de productos</h3>

     <table class="bordered striped centered">
        <thead>
            <tr>
                <th class="black-text">nombre</th>
                <th class="black-text">precio de compra</th>
                <th class="black-text">precio de venta</th>
                <th class="black-text">cantidad</th>
            </tr>
        </thead>

        <tbody>

        	@foreach($productos as $producto)
            <tr style="border-bottom: solid;">
               <td class="black-text">{{$producto->nombre}}</td>
               <td class="black-text">{{$producto->precio_de_compra}}</td>
               <td class="black-text">{{$producto->precio_de_venta}}</td>
               <td class="black-text">{{$producto->cantidad}}</td>
            </tr>
            @endforeach
        </tbody>
     </table>

  </body>

</html>



            