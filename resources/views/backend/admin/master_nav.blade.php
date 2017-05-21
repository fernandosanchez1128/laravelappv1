<!doctype html>
<html>
<head>

	<!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!---->
    <link rel="stylesheet" type="text/css" href="css/visitors/visitors_styles.css">
   
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>