@extends('FrontEnd.layout.app')

@section('content')
	<div class="container">
       <div class="row">
           <!-- Portfolio Item Row -->
           <div class="col-md-12" style=" margin-top:5px;">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $count=1; ?>
                    @foreach($slides as $row)
                        @if($count==1)
                            <div class="item active">
                                <img class="img-responsive" src="{{asset('uploads/images')}}/{{$row->image}}" alt="" style=" width:100%; height:280px;">
                            </div>
                        @else
                            <div class="item">
                                <img class="img-responsive" src="{{asset('uploads/images')}}/{{$row->image}}" alt="" style=" width:100%; height:280px;">
                            </div>
                        @endif
                        <?php $count++; ?>
                    @endforeach



                </div> <!-- close Wrapper for slides -->

            </div> <!--- close carousel -->
        </div>
    </div><!-- close  row/-->
    <div class="row">
       <div class=" col-md-12" style="margin-top:1%;">
        <div class="animated bounceInDown">

          @foreach( $tradings as $row )
           <p><b>{{ $row->title }}:</b><?php echo html_entity_decode($row->description); ?> </p>
          @endforeach
       </div>
   </div>
</div>
</div>
<!-- // cintainer-->
@stop