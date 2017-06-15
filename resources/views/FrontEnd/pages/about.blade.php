<?php
use App\Http\Controllers\Helpers\Language;

?>

@extends('FrontEnd.layout.app')

@section('content')
	<!-- Page Content -->
    <div class="container" style="margin-bottom: 50px;">
        <div class="row" style=" margin-top: 80px;">
            <div class="col-lg-12">
                <h3 class="page-header"><?php echo Language::getTitleLang()=='kh'?"អំពីយើងខ្ញុំ":"About Us"; ?></h3>
            </div>
            <!-- Portfolio Item Row -->
            <div class="col-md-8" style=" margin-top: -95px;">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php $count=1; ?>
                        @foreach($images as $image)
                            @if($count==1)
                                <div class="item active">
                                    <img class="img-responsive" src="uploads/images/{{$image->image}}" alt="" style=" width:750px; height:450px;">
                                </div>
                            @else
                                <div class="item">
                                    <img class="img-responsive" src="uploads/images/{{$image->image}}" alt="" style=" width:750px; height:450px;">
                                </div>
                            @endif
                            <?php $count++; ?>
                        @endforeach
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
            @foreach($abouts as $about)
                <h4> {{$about->title}} </h4>
				<div class="animated zoomIn">                   
                    <p> <?php echo html_entity_decode($about->detial); ?> </p>
			    </div>
            @endforeach
		   </div>
		</div>
	</div>
@stop