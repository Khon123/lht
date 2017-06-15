@extends('backpack::layout')

@section('after_styles')
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
@endsection

@section('header')
<section class="content-header">
	<h1>Career</h1>
	<ol class="breadcrumb">
		<li class="active">{{ config('app.name') }}</li>
		<li class="active">Career</li>
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
						<span class="glyphicon glyphicon-plus"></span>Add New Career
					</button>

					@include('backpack::careers.modalCareer')

					<h1 id="h1" style="display: none;">Add New Career</h1>
					<div class="title-left " id="search">
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
				@include('backpack::inc.message')
				{{-- table career --}}
				<div class="table" id="table">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Job Title</th>
								<th>Post Date</th>
								<th>Close Date</th>
								<th>status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($datas as $row)
							<tr id="career{{$row->id}}" class="career{{ $row->id_table }}">
								<td>{{ $row->job_title }}</td>
								<td>{{ $row->post_date }}</td>
								<td>{{ $row->close_date }}</td>
								<td>{{ $row->status }}</td>
								<td>
									<button class="edit_data btn btn-info open-modal" id="edit-modal" value="{{$row->id}}">
										<span class="glyphicon glyphicon-edit">edit</span>
									</button>
									<button class="btn btn-danger delete-career" value="{{$row->id_table}}">
										<span class="glyphicon glyphicon-trash">delete</span>
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			{{ $datas->links() }}
		</div>
	</div>
</div>
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection

@section('after_scripts')
<script type="text/javascript">

	var url ="{{ url(config('backpack.base.route_prefix', 'admin').'/career')}}";
	{{-- post_date datepicker --}}
	$(document).ready(function(){
		var date_input = $('input[name="post_date"]');//our date in put has the name "post_date"
		var container = $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent():"body";
		date_input.datepicker({
			format: "yyyy-mm-dd",
			container: container,
			todayHighlight: true,
			autoclose: true
		});
	});
	{{-- close_date datepicker --}}

	$(document).ready(function(){
		var date_input = $('input[name="close_date"]');//our date in put has the name "post_date"
		var container = $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent():"body";
		date_input.datepicker({
			format: "yyyy-mm-dd",
			container: container,
			todayHighlight: true,
			autoclose: true
		}); 
  	});
	// click button add new career
	$('#add-new').click(function() {
		$('.save').text('Save');
		$('.modal-title').text("Add New Career");
		$('#frmCareer').trigger("reset");
		$("#frmCareer").attr('method', 'POST');
		$("#frmCareer").attr('action', url );
		$('#myModal').modal('show');
	});

	//display modal form for product editing
	$(document).on('click','.open-modal',function(){
		$('.save').text("Update");
		$('.modal-title').text("Update Career");
		var career_id = $(this).val();

		// change url and method to route update
		$("#frmCareer").attr('method', 'POST');
		$("#frmCareer").attr('action', url + '/' + career_id );

        // get data to show in modal
        $.get(url + '/' + career_id, function (data) {
            //success data
            console.log(data);
            $('#job_title').val(data.job_title);

            var job_description = data.job_description;
            var job_requirement = data.job_requirement;

            if(job_description == null ){
            	tinymce.get('job_description').setContent('');
            }else{
            	tinymce.editors['job_description'].setContent(data.job_description);
            }
            if(job_requirement == null){
            	tinymce.get('job_requirement').setContent('');
            }else{
            	tinymce.editors['job_requirement'].setContent(data.job_requirement);
            }
                      
            $('#post_date').val(data.post_date);
            $('#close_date').val(data.close_date);
            $('#status').val(data.status);

            // show modal
            $('#myModal').modal('show');
         });
     });
	//delete employee and remove it from list
	$(document).on('click','.delete-career',function(){

		if(confirm("Are you sure you want to delete this?")){
			var career_id = $(this).val();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			})
			$.ajax({
				type: "DELETE",
				url: url + '/' + career_id,
				success: function (data) {
					console.log(data);
					$(".career" + career_id).remove();
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});

		}else{
			return false;
		}
	});

</script>
@stop