<!doctype html>
<html>

<head>
	<!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
     <!-- CSS  -->
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link href= "/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  	<link href= "/css/administrator/navbar.css" type="text/css" rel="stylesheet"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>

<body style="background-image: url('/images/fondo_principal_4.jpg');">

  <nav>
    <div class="nav-wrapper black" style="min-height: 150px;">
     <img style="margin-left: 37%;" src="/images/logo_trans_logo2.png">
      <ul class="left">
        <img id="back" src="/images/back.png" style="margin-top: 40px;margin-left: 10px;">
      </ul>
    </div>
  </nav>
	
	<div class="container" style="min-height: 750px; margin-top: 80px;">

		@yield('content')

	</div>
	
 	<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="/js/materialize.min.js"></script>
    <script type="text/javascript" src="/js/administrator/pdf_ajax.js"></script>
    <script type="text/javascript" src="/js/administrator/users_ajax.js"></script>
    <script type="text/javascript" src="/js/administrator/roles_ajax.js"></script>



    <script>
 

     $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
      });
          
    $(document).ready(function(){ 
       // Initialize collapse button
      $("#back").click(function(){  
        javascript:window.history.back();
      });
    });

    $(document).ready(function(){
 		$('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15 // Creates a dropdown of 15 years to control year
		 });
	});	

  $(document).ready(function() {
    $('select').material_select();
  }); 
    </script>
</body>



</html>