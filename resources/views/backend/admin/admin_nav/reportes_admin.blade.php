@extends('backend.admin.admin_nav.master_nav')


@section('content')

<div class="row  " style="min-height: 800px;">

	<div class="col s4 offset-s4" style="min-height: auto; margin-top: 50px; background-color: rgba(0,0,0,0.4); border-radius: 30px;"">
	  

		

			<input type="date" class="datepicker col s8 offset-s2" placeholder="Fecha de inicio">

			<input type="date" class="datepicker col s8 offset-s2" placeholder="Fecha final">

		<div class="input-field col s12" style="margin-top: 30px;">

			    <select multiple>
			      <option value="" disabled selected>Seleccione los datos de reporte</option>
			      <option value="1">Reporte de costo</option>
			      <option value="2">Reporte de inventario</option>
			      <option value="3">Reporte de ganancias</option>
			      <option value="3">Reporte de deudores</option>
			    </select>
	        
	  </div>
	  <center><a href="/administrator/pdf" id="generate_report" class="waves-effect waves-light btn center amber darken-1" style="border-radius: 50px;margin-bottom: 20px;margin-top: 20px;"><i class="material-icons right">picture_as_pdf</i>Generar Reportes</a></center>

	</div>
	
</div>

@endsection