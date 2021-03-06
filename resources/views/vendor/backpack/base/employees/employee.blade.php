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
		<h1>Team</h1>
		<ol class="breadcrumb">
			<li class="active">{{ config('app.name') }}</li>
			<li class="active">Team</li>
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
							<span class="glyphicon glyphicon-plus"></span>Add New Team
						</button>

						{{-- ===========include modal========== --}}
						@include('backpack::employees.modalEmployee')

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

								<th class="text-center">First Name</th>
								<th class="text-center">Last Name</th>
								<th class="text-center">Gender</th>
								<th class="text-center">image</th>
								<th class="text-center">email</th>
								<th class="text-center">status</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody id="employee-table" name="employee-table">
							@foreach($datas as $row)
							<tr id="employee{{$row->id}}" class="employee{{$row->id_table}}">

								<td class="text-center">{{$row->firstName}}</td>
								<td class="text-center">{{$row->lastName}}</td>
								<td class="text-center">{{$row->gender}}</td>
								<td class="text-center"><img src="{{ url('uploads/images/'. $row->image )}}" style="width: 50px; height: 50px;"></td>
								<td class="text-center"><span class="glyphicon glyphicon-envelope" data-toggle="tooltip" title="{{$row->email}}"></span></td>
								<td class="text-center">{{$row->status}}</td>
								<td class="text-center">
									<button class="edit_data btn btn-info open-modal" id="edit-modal" value="{{$row->id}}">
										<span class="glyphicon glyphicon-edit">edit</span>
									</button>
									<button class="btn btn-danger delete-employee" value="{{$row->id_table}}">
										<span class="glyphicon glyphicon-trash">delete</span>
									</button>
								</td>
							</tr>

							@endforeach
						</tbody>
					</table>
                    
				</div>
			</div>
            {{ $datas->links() }} <!--pagination-->
		</div>
	</div>
	<meta name="_token" content="{!! csrf_token() !!}" />
	@stop

	@section('after_scripts')

	<script type="text/javascript">
	// initStatusDropDownList();
	// initGenderDropDownList();
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
	})
	var url ="{{ url(config('backpack.base.route_prefix', 'admin').'/team')}}";
	// display modal
	$('#add-new').click(function(){
        $('.modal-title').text("Add New Team");
		$('.save').text("Save");
		$("#frmEmployee").attr('method', 'POST');
		$("#frmEmployee").attr('action', url );
		$('#btn-save').val("add");
		$('#frmEmployee').trigger("reset");
		$('#myModal').modal('show');
	});
	
	//display modal form for product editing
	// ==============Open modal with class==============
	$(document).on('click','.open-modal',function(){
        $('.modal-title').text("Update Team");
		$('.save').text("Update");
		var employee_id = $(this).val();

		$("#frmEmployee").attr('method', 'POST');
		$("#frmEmployee").attr('action', url + '/' + employee_id );

        $('#myModal').modal('show');
		$.get(url + '/' + employee_id, function (data) {
            //success data
            console.log(data);

            var detial = data.detial;
            $('#firstName').val(data.firstName);
            $('#lastName').val(data.lastName);
            $('#gender').val(data.gender);
            $('#phone').val(data.phone);
            $('#email').val(data.email);
            $('#address').val(data.address);

            if(detial != null){
                tinymce.editors['detial'].setContent(data.detial);
            }else{
                tinymce.editors['detial'].setContent('');
            }
            
            $('#status').val(data.status);
         });
	});
    //delete employee and remove it from list
    $(document).on('click','.delete-employee',function(){

    	if(confirm("Are you sure you want to delete this?")){
    		var employee_id = $(this).val();
            console.log(employee_id);
    		$.ajaxSetup({
    			headers: {
    				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    			}
    		})
    		$.ajax({
    			type: "DELETE",
    			url: url + '/' + employee_id,
    			success: function (data) {
    				console.log(data);
    				$(".employee" + employee_id).remove();
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
    	$('#frmEmployee').formValidation({
    		framework: 'bootstrap',
    		excluded: 'disabled',
    		// icon: {
    		// 	valid: 'glyphicon glyphicon-ok',
    		// 	invalid: 'glyphicon glyphicon-remove',
    		// 	validating: 'glyphicon glyphicon-refresh'
    		// },
    		fields: {
    			firstName: {
    				validators: {
    					notEmpty: {
    						message: 'The first name is required'
    					},
    					stringLength: {
    						min: 2,
    						max: 30,
    						message: 'The first name must be more than 2 and less than 30 characters long'
    					},
    					
    				}
    			},
    			lastName: {
    				validators: {
    					notEmpty: {
    						message: 'The last name is required'
    					},
    					stringLength: {
    						min: 2,
    						max: 30,
    						message: 'The last name must be more than 2 and less than 30 characters long'
    					},
    				}
    			},
    			gender: {
    				validators: {
    					notEmpty: {
    						message: 'The gender is required'
    					}
    				}
    			},
    			phone: {
    				validators: {
    					regexp: {
    						regexp: /^[0-9+]+$/,
    						message: 'The telephone can only consist of number and plus',
    					}
    				}
    			},
    			email: {
    				validators: {
    					emailAddress: {
    						message: 'The input is not a valid email address'
    					}
    				}
    			},
    			address: {
    				validators: {
    					stringLength: {
    						max: 255,
    						min: 2,
    						message: 'The address must be more than 2 and less than 255 charachter long',
    					},

    				}
    			},
    			// detial: {
    			// 	validators: {
    			// 		notEmpty: {
    			// 			message: 'The description is required'
    			// 		},
    			// 		stringLength: {
    			// 			min: 5,
    			// 			message: 'The description must be more than 5 charachter'
    			// 		}
    			// 	}
    			// }
    		}
    	});
    });
 </script>
</script>

 @stop