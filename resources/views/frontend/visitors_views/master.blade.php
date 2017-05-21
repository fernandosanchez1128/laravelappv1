<!doctype html>
<html>
<head>

	<!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!---->
    <link rel="stylesheet" type="text/css" href="css/visitors/visitors_styles.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <style>
    /*input:not([type]).valid, input:not([type]):focus.valid    color valido*/
    /*input:not([type]).invalid, input:not([type]):focus.invalid    color no valido*/
    input[type=range] + .thumb {
  position: absolute;
  border: none;
  height: 0;
  width: 0;
  border-radius: 50%;
  background-color: #ffb300;/*#ffb300 amber darken-1*/
  top: 10px;
  margin-left: -6px;
  -webkit-transform-origin: 50% 50%;
          transform-origin: 50% 50%;
  -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
}
    </style>
</head>
<body class='fondo'>
		<!--imagen de la parte superior-->
		<div class="center-align">
			<img src = "/images/logo_trans.png" alt = "una imagen">  
		</div>
	<div id="general">

		<div class="container">

			@yield('content')

		</div>
	</div>

	<script src="js/visitors/visitors_script.js"></script>
	
 	<!--Import jQuery before materialize.js-->
    
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>
