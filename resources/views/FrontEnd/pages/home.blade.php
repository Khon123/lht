<?php

use App\Http\Controllers\Helpers\Language;

?>
@extends('FrontEnd.layout.app')

@section('header')
	<!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <?php $count=1; ?>
            @foreach($slides as $slide)
                @if($count==1)
                    <div class="item active">
                        <div class="fill" style="background-image:url('{{ asset('uploads/images') }}/{{ $slide->image }}');"> </div>
                        <div class="carousel-caption">
                            <h2>{{ $slide->detial }} </h2>
                        </div>
                    </div>
                @else
                    <div class="item">
                        <div class="fill" style="background-image:url('{{ asset('uploads/images') }}/{{ $slide->image }}');"></div>
                        <div class="carousel-caption">
                            <h2>{{ $slide->detial }}</h2>
                        </div>
                    </div>
                @endif
                <?php $count++; ?>
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
@stop

@section('content')
	<!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                
                    <?php echo Language::getTitleLang()== 'kh'? '<b>ស្វាគមន៍​មកកាន់</b>
                        LTH Capital': 'Welcome to LHT Capital' ;?>
                    
                </h3>
            </div>
        </div>
        @foreach( $homes as $home) 
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
						<h4> {{ $home->title }}</h4>	
                    </div>
                    <div class="panel-body">
						<div class="animated fadeInUp" style="animation-delay: 0.4s;">
	                        <p><?php  echo html_entity_decode($home->titleDetial); ?></p>
						</div>
                    </div>
                </div>
            </div>		
            <div class="col-md-6">
			  	<div class="grid">
					<div class="animated zoomIn" style="animation-delay: 0.6s;">
						<figure class="effect-zoe">
							<img src="{{ asset('uploads/images').'/'. $home->image }}" alt="img14" style="width:100%; height:400px;">
							<figcaption>
								<h3>{{ $home->titleImage }}</h3>
								<span class="icon-heart"></span>
								<span class="icon-eye"></span>
								<span class="icon-paper-clip"></span>
								<p><?php echo html_entity_decode($home->imageDetial); ?></p>
							</figcaption>			
						</figure>
					</div><!--close animeted zoomin-->	
               	</div>
			</div><!-- col-lg-->
        </div>
        @endforeach
    </div>
    <!-- /.container -->
@stop