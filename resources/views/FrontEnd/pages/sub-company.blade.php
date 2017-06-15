<?php

use App\Http\Controllers\Helpers\Language;

?>
@extends('FrontEnd.layout.app')

@section('content')

<!-- Page Content -->
<div class="container" style="margin-top:6.6%;">
	<div class="row">
		<div class="col-lg-12" style="margin-top: 10px;">
			<h3><?php echo Language::getTitleLang()=='kh'?"ទិដ្ឋភាពទូទៅ":"OverView"; ?></h3>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="pull-left">
			<h5 style="margin-left:8%; font-size:16px;"><b><?php echo Language::getTitleLang()=='kh'?"ក្រុមហ៊ុនដៃគូរបស់យើង":"Our Group Companies"; ?></b></h5>
			<ul>
				<li><a href="" style="background:none;">Lucky Mall</a></li>
				<li><a href="" style="background:none;">Lucky Salon</a></li>
				<li><a href="" style="background:none;">Lucky Combi</a></li>
				<li><a href="" style="background:none;">Lucky Combi Marketing</a></li>
				<ul>
					@foreach($subCompanies as $row)

						<li><a href="{{ url(''). "/group-company/sub-company/" . $row->id }}" style="background:none;">{{ $row->name }}</a></li>

					@endforeach
				</ul>
			</li>
		</ul>
	</div>
	<div class="col-lg-10">
		<a href="#" class="thumbnail">
			<img src="{{asset('uploads/images')}}/{{ $subCompany->image }}" alt="..." style="width:100%; height:350px;">
		</a>
		<div class="animated bounceInDown">
			<p><?php echo html_entity_decode($subCompany->detial);?></p>
			<h4><?php echo Language::getTitleLang()=='kh'?'ទស្សនា': 'To visit'; ?> {{ $subCompany->name }}, <a href="https://{{ $subCompany->url }}" target="_blank"  style="background:none;"><?php echo Language::getTitleLang()=='kh'?'ចុច​ទីនេះ': 'Click here'; ?></a></h4>
		</div><!-- close animated bounceInDown-->
	</div>
</div>
<!-- /.row -->

</div>
<!-- /.container -->

@stop