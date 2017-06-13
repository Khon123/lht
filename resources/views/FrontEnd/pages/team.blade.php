<?php

use Illuminate\Support\Facades\Crypt;

?>

@extends('FrontEnd.layout.app')

@section('content')

	<!-- Page Content -->
    <div class="container" >
    	<div class="row">
        	<div class="col-lg-12" style="margin-top: 100px;">
        	   <h3>Our Team</h3>
        	</div>
    	</div>
		<div class="row">
            <?php $count = 1;?>
            @foreach($teams as $team)
                <div class="col-md-3 portfolio-item">                    
                    <div class="animated pulse">
                        <a href="#">
                            <img class="img-responsive" src="{{ asset('uploads/images/')}}/{{$team->image }}" alt="" style="border-radius : 5px;">
                        </a>
                    </div>
                    <div class="animated bounceInDown">
                        <h3>
                            <?php $id = Crypt::encrypt($team->id); ?>
                            
                            <a href="{{ url(''). "/team/$id" }}" style="background:none;">{{$team->lastName . ' ' . $team->firstName}}</a>
                        </h3>
                        <p><?php echo html_entity_decode($team->detial); ?></p>

                    </div>               
                </div>
                @if($count == 4)
                    <div class="col-md-12">
                        <hr>
                    </div>
                    
                    <?php $count = 1;?>
                @endif 
                
                <?php $count++; ?>
            @endforeach
        </div>
        {{ $teams->links() }}
		
    </div>
    <!-- /.container -->
@stop