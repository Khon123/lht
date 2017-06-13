
<?php

use App\Http\Controllers\Helpers\Language;

?>
@extends('FrontEnd.layout.app')

@section('content')
	<!-- Page Content -->
    <div class="container" >
		 <div class="row">
		 <div class="col-lg-12" style="margin-top:80px;">
            <h3><?php echo Language::getTitleLang()=='kh'?"ទិដ្ឋភាពទូទៅ":"OverView"; ?></h3>
			<hr>
		</div>
        </div>
		<div class="row">
			<div class="col-md-3">
				<div class="pull-left">
					<h5 style="margin-left:8%; font-size:16px;"><b><?php echo Language::getTitleLang()=='kh'?"ក្រុមហ៊ុនដៃគូរបស់យើង":"Our Group Companies"; ?></b></h5>
					<ul>
						<li><a href="" style="background:none;">Lucky Mall</a></li>
						<li><a href="" style="background:none;">Lucky Salon</a></li>
						<li><a href="" style="background:none;">Lucky Combi</a></li>
						<li><a href="" style="background:none;">Lucky Combi Marketing</a>
						<ul>
							@foreach($subCompanies as $subCompany)

								<li><a href="{{ url(''). "/group-company/sub-company/" . $subCompany->id }}" style="background:none;">{{ $subCompany->name }}</a></li>

							@endforeach
						</ul>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<?php $count = 1 ?>
				@foreach($companys as $company)
					<div class="col-md-6">
						<div class="pull-right">
							<img src="{{asset('uploads/images')}}/{{$company->image}}" style="width:110px; height:129px; padding:2px; margin-left:80px;">
							<p>{{ $company->description }}</p>
							<h4><a href="https://{{ $company->url }}" target="_blank" style="background:none;">{{ $company->url }}</a></h4>
						</div>
					</div>
					@if($count == 2)
						<div class="col-md-12">
							<hr>
						</div>
					@endif
					<?php $count++ ?>
				@endforeach
			</div>
			
		</div>
		<!-- close row-->
		
    </div>
    <!-- /.container -->
@stop