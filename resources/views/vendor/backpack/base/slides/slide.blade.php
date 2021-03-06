@extends('backpack::layout')

@section('after_styles')

	<style>
	    .bootstrap-iso .formden_header h2, 
	    .bootstrap-iso .formden_header p, 
	    .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; 
	      color: black}.bootstrap-iso form button, 
	    .bootstrap-iso form button:hover{color: white !important;} 
	    .asteriskField{color: red;}
  	</style>

@endsection

@section('header')
<section class="content-header">
	<h1>Setup Slide</h1>
	<ol class="breadcrumb">
		<li class="active">{{ config('app.name') }}</li>
		<li class="active">Setup Slide</li>
	</ol>
</section>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-default">
			<div class="box-header with-border">
				<div class="box-title">
					{{-- add button --}}
					<button class="btn btn-primary pull-left" id="add-new" name="add-new">
						<span class="glyphicon glyphicon-plus"></span>Add New Slide
					</button>
					{{-- ===========include modal========== --}}
					@include('backpack::slides.modalslide')

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
							<th class="text-center">Article</th>
							<th class="text-center">image</th>
							{{-- <th class="text-center">description</th> --}}
							<th class="text-center">status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody id="slide-table" name="slide-table">
					
						@foreach($datas as $row)
						<tr id="slide{{$row->id}}" class="slide{{ $row->id_table }}">
							<td class="text-center">{{$row->article->name}}</td>
							<td class="img text-center">
								<img style="width: 50px; height: 50px;" src="{{ url(''). '/uploads/images/'. $row->image }}">
								
							{{-- <td class="text-center">{{$row->description}}</td> --}}
							<td class="text-center">{{$row->status}}</td>
							<td class="text-center">
								<button class="edit_data btn btn-info open-modal" id="edit-modal" value="{{$row->id}}">
									<span class="glyphicon glyphicon-edit">edit</span>
								</button>
								<button class="btn btn-danger delete-slide" value="{{$row->id_table}}">
									<span class="glyphicon glyphicon-trash">delete</span>
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
	})
	var url ="{{ url(config('backpack.base.route_prefix', 'admin').'/slide') }}";
	// display modal
	$('#add-new').click(function(){
		$('.save').text("Save");
		$("#frmslide").attr('method', 'POST');
        $("#frmslide").attr('action', url );
		$('#btn-save').val("add");
		$('#frmslide').trigger("reset");

		$('#article_id').show();
		$('.article').show();
		
		$('#myModal').modal('show');
	});
	
	//display modal form for product editing
	//// ==============Open modal with class==============
	$(document).on('click','.open-modal',function(){
		$('.save').text("Update");
		var slide_id = $(this).val();
		console.log(slide_id);
		<?php

			use App\Http\Controllers\Helpers\Language;

		?>
		<?php 
			$lang = Language::getTitleLang();
			if( $lang=='kh'): 
		?>
			$('#article_id').hide();
			$('.article').hide();
		<?php endif; ?>

        $("#frmslide").attr('method', 'POST');
        $("#frmslide").attr('action', url + '/' + slide_id );
        $.get(url + '/' + slide_id, function (data) {
            //success data
            console.log(data);
            $('#article_id').val(data.article_id);
            $('#detial').val(data.detial);
            $('#status').val(data.status);
              
            $('#myModal').modal('show');
        });
	});
	
    //delete slide and remove it from list
    $(document).on('click','.delete-slide',function(){

    	if(confirm("Are you sure you want to delete this?")){
    		var slide_id = $(this).val();
    		$.ajaxSetup({
    			headers: {
    				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    			}
    		})
    		$.ajax({
    			type: "DELETE",
    			url: url + '/' + slide_id,
    			success: function (data) {
    				console.log(data);
    				$(".slide" + slide_id).remove();
    			},
    			error: function (data) {
    				console.log('Error:', data);
    			}
    		});

    	}else{
    		return false;
    	}

    });
    // form validation
    $(document).ready(function() {
    	$('#frmslide').formValidation({
    		framework: 'bootstrap',
    		excluded: 'disabled',
    		fields: {
    			article_id: {
    				validators: {
    					notEmpty: {
    						message: 'The article name is required'
    					},
    				}
    			}
    		}
    	});
    });

				

</script>

@stop