<?php 

use Illuminate\Support\Facades\Crypt;

 ?>
@extends('FrontEnd.layout.app')

@section('content')
	<!-- Page Content -->
    <div class="container" style="margin-top: 6.6%;">
	
             
        @foreach($events as $event)
            <!-- Blog Post Row -->
            <div class="row">
                <div class="col-md-5" style="margin-top: 2%;">
                    <a href="">
                        <img class="img-responsive img-hover" src="uploads/images/{{ $event->image }}" alt="" style="border-radius: 5px;">
                    </a>
                </div>
                <div class="col-md-7">
                    <h1>
                        <?php $id = Crypt::encrypt($event->id) ;?>
                        <a href="{{ url(''). "/event/$id" }}">{{ $event->title }}</a>
                    </h1>
                    <hr>
                    <h3 style="margin-top: 15px" >
                        <b><?php echo date('d-m-y', strtotime($event->event_date)); ?></b>
                    </h3>
                    <a class="btn btn-primary" href="{{ url(''). "/event/$id" }}">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <!-- /.row -->
            <hr>
        @endforeach
        
    </div>
    <!-- /.container -->
@stop