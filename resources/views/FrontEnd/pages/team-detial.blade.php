@extends('FrontEnd.layout.app')

@section('after_styles')
<style type="text/css">

	.user-row {
		margin-bottom: 14px;
	}

	.user-row:last-child {
		margin-bottom: 0;
	}

	.dropdown-user {
		margin: 13px 0;
		padding: 5px;
		height: 100%;
	}

	.dropdown-user:hover {
		cursor: pointer;
	}

	.table-user-information > tbody > tr {
		border-top: 1px solid rgb(221, 221, 221);
	}

	.table-user-information > tbody > tr:first-child {
		border-top: 0;
	}


	.table-user-information > tbody > tr > td {
		border-top: 0;
	}
	.toppad
	{
		margin-top:20px;
	}
</style>
@stop
@section('content')
<div class="container">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


	<div class="panel panel-info" style="margin-top: 200px; margin-bottom: 200px" >
			<div class="panel-heading" style="background: #f9a825">
				<h1 class="panel-title"><b>{{$team->firstName. ' '. $team->lastName}}</b></h1>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12 col-lg-12 " align="center"> 
						<img src="{{ asset('uploads/images/')}}/{{$team->image }}" alt="" style="margin-top: 25px; border-radius: 5px;" >
						<hr>
				    </div>

					<div class=" col-md-12 col-lg-12 "> 
						<table class="table table-user-information">
							<tbody>
								<tr>
									<td><b>First Name:</b></td>
									<td>{{$team->firstName}}</td>
								</tr>
								<tr>
									<td><b>Last Name:</b></td>
									<td>{{$team->lastName}}</td>
								</tr>
								<tr>
									<td><b>Gender:</b></td>
									<td>{{$team->gender}}</td>
								</tr>
								<tr>
									<tr>
										<td><b>Phone Number</b>:</td>
										<td>{{$team->phone}}</td>
									</tr>
									<tr>
										<td><b>Email:</b></td>
										<td><a href="#">{{$team->email}}</a></td>
									</tr>
									<tr>
										<td><b>Address:</b></B></td>
										<td>{{$team->address}}</td>
									</tr>
										<td><b>Detial:</b></td>
										<td><?php echo html_entity_decode($team->detial); ?>
									</td>

								</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@stop