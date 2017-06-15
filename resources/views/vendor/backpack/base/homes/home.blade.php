@extends('backpack::layout')

@section('header')
<section class="content-header">
	<h1>Home</h1>
	<ol class="breadcrumb">
		<li class="active">{{ config('app.name') }}</li>
		<li class="active">Home</li>
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
						@include('backpack::homes.modalHome')

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
								<th class="text-center">Title</th>
								<th class="text-center">Image</th>
								<th class="text-center">Title Image</th>
								<th class="text-center">Status</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody >
							@foreach($homes as $row)
							<tr id="event{{$row->id}}" class="event{{ $row->id_table }}">
								
								<td class="text-center">{{$row->title}}</td>
								<td class="text-center"><img style="width: 50px; height: 50px;" src="{{ url(''). '/uploads/images/'. $row->image }}"></td>
								<td class="text-center">{{$row->titleImage}}</td>
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

    var url ="{{ url(config('backpack.base.route_prefix', 'admin').'/home')}}";
    
    //display modal form for product editing
    //// ==============Open modal with class==============
    $(document).on('click','.open-modal',function(){
		$('.save').text("Update");
		var id = $(this).val();
		console.log(id);

		$("#frmHome").attr('method', 'POST');
		$("#frmHome").attr('action', url + '/' + id );

		$.get(url + '/' + id, function (data) {
		    //success data
			console.log(data);
			var titleDetial = data.titleDetial;
			var imageDetial = data.imageDetial;
			$('#title').val(data.title);

			if(titleDetial == null){
				tinymce.editors['titleDetial'].setContent('');
			}else{
				tinymce.editors['titleDetial'].setContent(data.titleDetial);
			}
			
			$('#titleImage').val(data.titleImage);
			
			if(imageDetial == null){
				tinymce.editors['imageDetial'].setContent('');
			}else{
				tinymce.editors['imageDetial'].setContent(data.imageDetial);
			}
			
			$('#status').val(data.status);

			$('#myModal').modal('show');
		});
    });

    // form validation 
    $(document).ready(function() {
    	$('#frmHome').formValidation({
    		framework: 'bootstrap',
    		excluded: 'disabled',
    		
    		fields: {
    			title: {
    				validators: {
    					notEmpty: {
    						message: 'The title is required'
    					}
    				}
    			},
    			titleImage: {
    				validators: {
    					notEmpty: {
    						message: 'The title image is required'
    					}
    				}
    			}
    		}
    	});
    });

</script>
@stop