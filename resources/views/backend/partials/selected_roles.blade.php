
<style type="text/css">
    #selected_roles {
        display: inline;
    }
</style>


<select id="selected_roles">
	@foreach($roles as $rol)
		<option>{{$rol->name}}</option>
	@endforeach
</select>

{{--<ul>
@foreach($roles as $rol)

      <li>{{$rol->name}}</li>

@endforeach      
</ul>--}}