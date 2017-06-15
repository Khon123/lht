@extends('backpack::layout')

@section('header')
<section class="content-header">
	<h1>Sub Company</h1>
	<ol class="breadcrumb">
		<li class="active">{{ config('app.name') }}</li>
		<li class="active">Sub Company</li>
	</ol>
</section>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<div class="box-title">
						{{-- ===========include modal========== --}}
						@include('backpack::sub-companies.modalSubCompany')

						<div class="title-left">
							<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
								<div class="input-group">
									<input type="text"  style="border-radius: 5px;" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" id="search" name="search"><span class="glyphicon glyphicon-search"></span></button>
									</span>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="box-body">
				
					<table class="table table-bordered">
						<thead>
							<tr>	
								<th class="text-center">Company Name</th>
								<th class="text-center">Website</th>
								<th class="text-center">Detial</th>
								<th class="text-center">Update Date</th>
								<th class="text-center">Status</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody >
							@foreach($subCompanies as $row)
							<tr id="event{{$row->id}}" class="event{{ $row->id_table }}">
								
								<td class="text-center">{{$row->name}}</td>
								<td class="text-center">{{$row->url}}</td>
								<td class="text-center"><?php echo substr($row->detial, 0, 25) .' ...';?></td>
								<td class="text-center"><?php echo date("d-m-Y", strtotime($row->updated_at)); ?></td>
								<td class="text-center">{{$row->status}}</td>
								<td class="text-center">
									<button class="edit_data btn btn-info open-modal" id="edit-modal" value="{{$row->id}}">
										<span class="glyphicon glyphicon-edit">edit</span>
									</button>
								</td>
							</tr>

							@endforeach
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>
<meta name="_token" content="{!! csrf_token() !!}" />
@stop

@section('after_scripts')

<script type="text/javascript">
	
	$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });

    var url ="{{ url(config('backpack.base.route_prefix', 'admin').'/subcompany')}}";
    
    //display modal form for product editing
    //// ==============Open modal with class==============
    $(document).on('click','.open-modal',function(){
		$('.save').text("Update");
		var id = $(this).val();
		console.log(id);

		$("#frmSubCompany").attr('method', 'POST');
		$("#frmSubCompany").attr('action', url + '/' + id );

		$.get(url + '/' + id, function (data) {
		    //success data
			console.log(data);

			var detial = data.detial;
			$('#name').val(data.name);
			$('#url').val(data.url);
			$('#name').val(data.name);

			if(detial != null){
				tinymce.editors['detial'].setContent(data.detial);
			}else{
				tinymce.editors['detial'].setContent('');
			}
			
			$('#status').val(data.status);

			$('#myModal').modal('show');
		});
    });

    // form validation 
    $(document).ready(function() {
    	$('#frmSubCompany').formValidation({
    		framework: 'bootstrap',
    		excluded: 'disabled',
    		
    		fields: {
    			name: {
    				validators: {
    					notEmpty: {
    						message: 'The Company name is required'
    					}
    				}
    			}
    		}
    	});
    });

</script>
</script>

@stop