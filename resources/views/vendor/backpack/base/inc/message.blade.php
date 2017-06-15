@if(Session::has('message'))
<div class="row">
	<div class="col-md-6 alert alert-{{Session::get('type')}}">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <strong>{{Session::get('strong')}}</strong> {{Session::get('message')}} 
	</div>
</div>

@endif
