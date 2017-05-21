
<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		
	body{
		background: #000000;
	}

	</style>
	<!--asignar css y images
    <link rel="stylesheet" href="/bower_components/material-design-lite/material.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->

	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-orange.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
</head>

<!--<body style="background-color:black;">-->
<body>




<!-- Uses a transparent header that draws on top of the layout's background -->
<style>
.demo-layout-transparent {
  background: url('/images/fondo_usuarios.jpg') center / cover;
}
.demo-layout-transparent .mdl-layout__header,
.demo-layout-transparent .mdl-layout__drawer-button {
  /* This background is dark, so we set text to white. Use 87% black instead if
     your background is light. */
  color: white;
}
.mdl-layout__drawer{
	background: #000000;
}
.mdl-navigation__link{
	color: white;

}
#title{
	color: white;
}
</style>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent">

	    <div class="mdl-layout__header-row">
	      <!-- Title -->
	      <span class="mdl-layout-title">EL Hueco</span>
	      <!-- Add spacer, to align navigation to the right -->
	      <div class="mdl-layout-spacer"></div>
	      <!-- Navigation -->
	      <nav class="mdl-navigation">
	        <a class="mdl-navigation__link" href="">Link</a>
	        <a class="mdl-navigation__link" href="">Link</a>
	        <a class="mdl-navigation__link" href="">Link</a>
	        <a class="mdl-navigation__link" href="">Link</a>

			<form  action="/client" method="POST" id="form_logout">
	        	{{ csrf_field() }}
	            <a class="mdl-navigation__link" href="#" onclick="document.getElementById('form_logout').submit()">Logout</a>
	        </form>

	      </nav>
	    </div>

  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title" id="title">@if(Sentinel::check()) {{Sentinel::getUser()->name }} @endif</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
    </nav>
  </div>
  <main class="mdl-layout__content">


  	


  
  </main>
</div>
	


<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<!--<script src="/bower_components/material-design-lite/material.min.js"></script>-->

 
  </body>
</html>
