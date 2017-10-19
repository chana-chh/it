@if(Session::has('uspeh'))
<div class="alert alert-success alert-dismissible fade in" id="poruka">
 	<button class="close" data-dismiss="alert">&times;</button>
  	{{ Session::get('uspeh') }}
</div>
@endif

@if(Session::has('info'))
<div class="alert alert-info alert-dismissible fade in" id="poruka">
 	<button class="close" data-dismiss="alert">&times;</button>
  	{{ Session::get('info') }}
</div>
@endif

@if(Session::has('upozorenje'))
<div class="alert alert-warning alert-dismissible fade in" role="alert" id="poruka">
 	<button class="close" data-dismiss="alert">&times;</button>
  	{{ Session::get('upozorenje') }}
</div>
@endif

@if(Session::has('greska'))
<div class="alert alert-danger alert-dismissible fade in" role="alert" id="poruka">
 	<button class="close" data-dismiss="alert">&times;</button>
  	{{ Session::get('greska') }}
</div>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade in" role="alert" id="poruka">
 	<button class="close" data-dismiss="alert">&times;</button>
 	<strong>Greške:</strong>
 	<ul>
  	@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
  	@endforeach
  	</ul>
</div>
@endif
