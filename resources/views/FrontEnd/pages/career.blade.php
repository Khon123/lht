<?php

use Illuminate\Support\Facades\Crypt;

?>
@extends('FrontEnd.layout.app')

@section('content')

	<!-- Page Content -->
    <div class="container" style="margin-top:6.5%;">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8" style="margin-top:80px;">
                <div class="animated zoomIn">
                    <a href="#">
                        <img class="img-responsive img-hover" src="{{ asset('uploads/images/career.jpg') }}" alt="#">
                    </a>
                </div>
                <hr>
                @foreach($careers as $career)

                <h3>
                    <?php $id = Crypt::encrypt($career->id) ; ?>
                    <a href="{{ url(''). "/career/$id" }}" style="background:none;"> {{$career->job_title}}</a>
                </h3>
                <div class="#animated zoomIn">
                    
                    <p><i class="fa fa-clock-o"></i> <b> Posted Date: <?php echo date("d-m-Y", strtotime($career->post_date)); ?></b></p>
                    <p><i class="fa fa-clock-o"></i><b> Close Date: <?php echo date("d-m-Y", strtotime($career->close_date)); ?></b> </p>
                    <?php $id = Crypt::encrypt($career->id) ; ?>
                    <a class="btn btn-primary" href="{{ url(''). "/career/$id" }}">Read More <i class="fa fa-angle-right"></i></a>
                </div>

                @endforeach
                
                {{ $careers->links() }}
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4" style="margin-top:80px;">

                  <!-- Side Widget Well -->
                <div class="well">
				<div class="animated zoomIn">
                    <h4>Contec Us</h4>
                    <p>
                   N0 . 160 E2, Preah Sihanouk Boulevard <br>Beoung Keng Kong I, Khan Chamkarmon<br> Phnom Penh, Cambodia <br>
                </p>
			</div>
		 <div class="animated zoomIn">
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">Tel</abbr>: (+855) 23 224 487</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E-mail</abbr>: <a href="kao.sokharany@lhtcapital.com">kao.sokharany@lhtcapital.com</a>
                </p>
				</div>
				</div>

            </div>

        </div>
        <!-- /.row -->
        <hr>
		</div><!--close container-->
@stop