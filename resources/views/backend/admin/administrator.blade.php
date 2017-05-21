<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>panel de administracion</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/administrator/admin_styles.css">

 
 

</head>
<body>


<!--SlideNav-->
<ul id="slide-out" class="side-nav">
    <li><div class="userView">
      <div class="background">
        <img src="images/card.jpg">
      </div>
      <a href="#!user"><img class="circle" src="images/user.png"></a>
      <a href="#!name"><span class="white-text name">@if(Sentinel::check()) {{Sentinel::getUser()->name }} @endif</span></a>
      <a href="#!email"><span class="white-text email">@if(Sentinel::check()) {{Sentinel::getUser()->email }} @endif</span></a>
     </div>
    </li>


    


    <form action="{{ url('/administrator/perfil_admin') }}" method="POST" id="form_perfil">
      {{ csrf_field() }}
      <li><a class="waves-effect" id="perfil_button"><i class="material-icons">person</i>Perfil</a></li>
    </form>
    <form action="{{ url('/administrator/reportes_admin') }}" method="POST" id="form_reportes">
      {{ csrf_field() }}
      <li><a class="waves-effect" id="reportes_button"><i class="material-icons">folder</i>Reportes</a></li>
    </form>
    <form action="{{ url('/administrator/roles_admin') }}" method="POST" id="form_roles">
      {{ csrf_field() }}
      <li><a class="waves-effect" id="roles_button"><i class="material-icons">account_circle</i>Roles</a></li>
    </form>

    <li><div class="divider"></div></li>
    <li><a class="subheader">Seccion 2</a></li>
    <li>
      <!--logout-->
      <form action="/administrator/logout" method="POST" id="form_logout">
        {{ csrf_field() }}
      </form>
      <a class="waves-effect" href="#!" onclick="document.getElementById('form_logout').submit()">
      <i class="material-icons">exit_to_app</i>Cerrar Sesion</a>
    </li>

  </ul> 
<!--********************-->
<!--modal registro-->
  <div id="register_window" class="modal">
    <div class="modal-content">

    <!--<div id="message_error_register">
      
    </div>-->

      <div class="row" id="alert_box" hidden="true">
        <div class="col s12 m12">
          <div class="card red darken-1" id="alert_box_color">
            <div class="row">
              <div class="col s12 m10">
                <div class="card-content white-text">
                  <strong id="error"></strong>
              </div>
            </div>
            <div class="col s12 m2">
              <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
            </div>
          </div>
         </div>
        </div>
      </div>

    

    <table>
    {{--{{ url('/administrator/products_register') }}"--}}
      <form method="POST" name="form_register" id="form_register" >

      <!--<input type="hidden" name="_token" value="{{--{{ csrf_token() }}--}}" id="token">-->

         <thead class=" blue-grey lighten-3 ">
          <tr>
            <th>Nombre</th>
            <th>Valor compra</th>
            <th>Valor venta</th>
            <th>Cantidad</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tr>
          <td >
            <input class="truncate txt-hueco" maxlength="255" type="text" id="regi_nombre" name="nombre" required>
          </td>
          <td>
            <input class="truncate txt-hueco" maxlength="50" type="number" id="regi_precio_de_compra" name="precio_de_compra" required>
          </td>
          <td>
           <input class="truncate txt-hueco" maxlength="50" type="number" id="regi_precio_de_venta" name="precio_de_venta" name="valor_venta" required>
          </td>
          <td>
          <input class="truncate txt-hueco" maxlength="11" type="number" id="regi_cantidad" name="cantidad" required>
          </td>
             <!--boton de registro-->
            <td colspan="2"><!--fucionar con otra celda-->
              <a href="#" style="margin-right: 30%;" id="registrar" class="tooltipped waves-effect waves-circle waves-light  btn-floating secondary-content amber" data-tooltip="registrar" data-position="bottom" data-delay="5"><i class="small material-icons">check</i></a>

            </td>
          </tr>
       </form>
    </table>
    <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat right" 
      style="margin-top: 2%;margin-bottom: 2%;">Cerrar</a>
    </div>
  </div>


<!--********************-->
  <!-- Modal Structure update-->
  <div id="update_window" class="modal">
    <div class="modal-content">
      <h4 class="center-align">Edicion</h4>
      

       <div class="row" id="alert_box_update" hidden="true">
        <div class="col s12 m12">
          <div class="card red darken-1" id="alert_box_update_color">
            <div class="row">
              <div class="col s12 m10">
                <div class="card-content white-text">
                  <strong id="error_update"></strong>
              </div>
            </div>
            <div class="col s12 m2">
              <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
            </div>
          </div>
         </div>
        </div>
      </div>

      <!--tabla de edicion-->

      <table class="bordered highlight responsive-table">

           <thead class="blue-grey lighten-3">
            <tr>
                <th>Articulo</th>
                <th>Valor compra</th>
                <th>Valor venta</th>
                <th>Cantidad</th>
                <th></th>
                <th></th>
            </tr>
          </thead>

          <tbody>
            <!--actualizar de productos-->
            {{--action="{{ url('/administrator/products_update') }}"--}}
             <form  method="POST" id="form_update" name="form_update">
                  
                <!--<input type="hidden" name="_token2" value="{{--{{ csrf_token() }}--}}" id="token_2">modificar token?-->
                <input type="hidden" name="id_actualizar" id="id_actualizar">
              <tr>
                <td >
                  <input type="text" maxlength="255" id="nombre_actualizar" name="nombre_actualizar" class="txt-hueco" required>
                </td>
                <td>
                  <input type="number" maxlength="50" id="precio_de_compra_actualizar" name="precio_de_compra_actualizar" class="txt-hueco" required>
                </td>
                <td>
                  <input type="number" maxlength="50" id="precio_de_venta_actualizar" name="precio_de_venta_actualizar" name="valor_venta"  class="txt-hueco" required>
                </td>
                <td>
                  <input type="number" maxlength="11" id="cantidad_actualizar" name="cantidad" class="txt-hueco_actualizar"
                   required>
                </td>
                <!--boton de registro-->
                <td colspan="2"><!--fucionar con otra celda-->
                  <a id="actualizar" class="btn-hueco tooltipped waves-effect waves-circle waves-light btn-floating secondary-content amber" data-tooltip="actualizar" data-position="bottom" data-delay="5">
                  <i class="material-icons">swap_horiz</i></a>
              
                </td>
              </tr>
             </form>  
            <tr>
          </tbody> 
      </table> 
      <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat right" 
      style="margin-top: 2%;margin-bottom: 2%;">Cerrar</a>
    </div>
      
  </div>
<!--********************-->
<!--********************-->
  <!-- Modal Structure delete-->
  <div id="delete_window" class="modal">
    <div class="modal-content">
      <h5 class="center-align"><i class="medium material-icons">warning</i>¿esta seguro de eliminar este registro?</h5>
      <div class="container">
        <input type="text" maxlength="11" id="producto_delete" name="cantidad" class="txt-hueco_actualizar"
         required>
        <h2 id=""></h2>
        <input type="hidden" id="input_delete" name="input_delete">
        <a  id="delete_button" class="modal-action modal-close waves-effect waves-orange btn-flat">aceptar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat">cancelar</a>
      </div>
    </div>
  </div>

<!--********************-->
<!--********************-->
  <!-- Modal Structure nueva mesa-->
  <div id="nueva_mesa" class="modal">
    <div class="modal-content">
      <h5 class="center-align"> <img src="/images/beer.png"> Agregar nueva mesa de consumo</h5>
      <div class="container">

        <div class="input-field col s6">
          <input placeholder="Escriba el nombre aqui" id="nombre_mesa" type="text" class="validate">
        </div>

        <a id="register_mesa" class="modal-action modal-close waves-effect waves-orange btn-flat">aceptar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat">cancelar</a>
      </div>
    </div>
  </div>

<!--********************-->
   <nav class="nav-extended black">
    <div class="nav-wrapper">

       <i data-activates="slide-out" class="material-icons left button-collapse" style="margin-left: 20px">menu</i> 
       <img src="images/logo_trans_logo.png" class="left" style="margin-left: 10px;margin-top: 5px;">

      <ul class="side-nav" id="mobile-demo">
        <!--///////////////////////////-->
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab right" style="margin-right: 30px;"><a  href="#test4">Administracion</a></li>
        <li class="tab right"><a class="active" href="#test3">Menu</a></li>
        <li class="tab right"><a href="#test2">Ventas</a></li>
        <li class="tab right"><a href="#test1">Inventarios</a></li>          
      </ul>
    </div>
  </nav>

  

  <div id="test1" class="container col s12" >
      <a class="waves-effect waves-light btn amber darken-1" href="#register_window" style="margin-bottom: 20px;border-radius: 50px;">
      <i class="material-icons right">add</i>Nuevo producto</a>
      <div class="row"> 
        <!--donde se carga la tabla de los productos-->
        <div id="ajax_products"></div>
      </div>
  </div>

  <!--
  *
  *
  *
  *
  *
  *segunda pestaña
  *
  *
  *
  *
  *
  -->
  <div id="test2">

    <div class="row">
      <!--tabla izquierda-->
      <div id="inv" class= "left" style="margin-left: 50px; margin-top: 100px;">

      

      </div>


      <!--tabla ventas--> 
      <div id="venta" class="left" style="margin-left: 50px;">
        <div class="row">
        <!--boton nueva mesa-->
          <div style="margin-left: 20px;">
            <a  class="btn waves-effect waves-light amber darken-2 left" href="#nueva_mesa" name="action" style="border-radius:  50px;">Nueva Mesa
               <i class="material-icons right">add</i>
            </a>
            <div style="max-width: 120px;" class="right" >
              <input placeholder="Fecha" type="date" class="datepicker small">
            </div>
          </div>
          <!--fecha
          <div class="right">
            -->
          </div>
          <!--donde se crean las nuevas mesas-->
          <div id="tabla_ventas" style="border-radius: 40px;" >


        <!-- <style type="text/css">
            .blur{
              -webkit-filter: blur(5px);
              -moz-filter: blur(5px);
              -o-filter: blur(5px);
              -ms-filter: blur(5px);
              filter: blur(5px);
            }
          </style>-->

            <!--cardview de la mesa-->
            

            <div id="mesa"></div>

           
          </div>

        </div>
      </div>



    </div>
  </div>

  <!--
  *
  *
  *
  *
  *
  *tercera pestaña
  *
  *
  *
  *
  *
  *
  *-->


  <div id="test3" class="container " style=" max-width:1000px;  max-height: 800px; margin-top: 40px;" >
    
      <!--division superior-->
      <div class="container" style="min-width: 100%;  min-height: 150px; overflow: hidden;">
        <div class="row  amber lighten-5 " style="margin-left: 20px;margin-right: 20px;margin-bottom: 20px;border-radius: 20px;">
            
            <div class="row" style="margin-left: 10px;margin-right: 10px;">
              <form class="col s12">
                <div class="row">
                  <div class="input-field col s12">

                  <div style="overflow: auto;max-height: 150px;">
                    <textarea id="textarea1" placeholder="Escriba..." class="materialize-textarea" ></textarea>
                  </div>
                    
                  </div>
                </div>
              </form>
            </div>
             <form action="#" >
              <div class="file-field input-field " style="margin-right: 20px;">
                
                  <input type="file" multiple>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Agrege un archivo">
                </div>
              </div>
            </form>

        </div>

          <button id="Publico" class="btn waves-effect waves-light right amber darken-2" type="submit" name="action" style="margin-right: 20px;margin-bottom: 20px; border-radius:  50px;">Publicar
          </button>

      </div>

      <!--division inferior-->
      <div id="MenuCard" class="container " style="min-width: 100%;max-height: 480px;border-radius: 50px;overflow: auto;">
        
        
      </div>


  </div>






  <!--cuarta pestaña-->








  <div id="test4" class="container col s12">

    <p><h4 class="white-text">CARGAR ARCHIVOS</h4></p>



    <div class="container" style="min-width: 100%;  min-height: 150px; margin-bottom: 50px; ">

      <div class="container">

        <form action="#" style="margin-left: 10px;margin-right: 10px;">
          <div class="file-field input-field" >
            <div class="btn amber darken-2" style="margin-top: 50px;" >
              <span>Agregar</span>
              <input type="file" multiple>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Seleccione el archivo a subir" style="margin-top: 50px;">
            </div>
          </div>
        </form>
   
       </div>
    </div>


    <!--inferior-->


   <div class="container  " style="min-width: 100%; min-height: 480px; ">

       <p><h4 class="white-text">Almacenamiento</h4></p>



   </div>


  </div>



       

  <!--CHAT-->
  <div>
    <div class="row">
      <div class="col s3 m6">

           <div class="card chat z-depth-4">
            <div class="card-content black-text">
              <span class="card-title">Chat Hueco</span>

              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
          </div>

      </div>      
    </div>
  </div>

  <!--  Scripts-->
  <script src="js/init.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

  <script src="js/materialize.js"></script>
  <script src="js/administrator/inventario_ajax.js"></script>
  <script src="js/administrator/mesa_ajax.js"></script>
  <script type="text/javascript" src="/js/administrator/ajaxMenu.js"></script>
  

  

  <script>

    

    $(document).ready(function(){ 
       // Initialize collapse button
      $("#perfil_button").click(function(){  
        document.getElementById("form_perfil").submit();
      });
    });

    $(document).ready(function(){ 
       // Initialize collapse button
      $("#reportes_button").click(function(){  
        document.getElementById("form_reportes").submit();
      });
    });

    $(document).ready(function(){ 
       // Initialize collapse button
      $("#roles_button").click(function(){  
        document.getElementById("form_roles").submit();
      });
    });

    $(document).ready(function(){
       // Initialize collapse button
      $(".button-collapse").sideNav();
    })

    $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    });

    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
    });


  </script>

  </body>
</html>
