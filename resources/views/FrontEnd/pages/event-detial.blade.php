@extends('FrontEnd.layout.app')

@section('content')
	<!-- Page Content -->
    <div class="container" style="margin-top: 6.6%;">
        <!-- Blog Post Row -->
            <div class="row">
                <div class="col-md-12" style="margin-top: 2%;">
                    <a href="">
                        <img class="img-responsive" src="{{ asset('uploads/images/') }}/{{ $event->image }}" alt="" style="width: 100% ; height: 650px;" >
                    </a>
                </div>
                <div class="col-md-6">
                    <h1>
                        <b style="color: #1565c0;">{{ $event->title }}</b> 
                    </h1>
                    <hr>
                    <h3 style="margin-top: 15px" >
                        <b><?php echo date('d-m-y', strtotime($event->event_date)); ?></b>
                    </h3>
                    <p style="margin-top: 25px;" ><?php echo html_entity_decode($event->description);?></p>
                </div>
            </div>
            <!-- /.row -->
            <hr>
    </div>
    <!-- /.container -->
@stop