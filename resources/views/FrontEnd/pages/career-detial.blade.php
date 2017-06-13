@extends('FrontEnd.layout.app')

@section('content')

<!-- Page Content -->
<div class="container" style="margin-top:6.5%;">
    <div class="row">
        <h2 style="color: #1565c0; margin-bottom: 10px; margin-left: 20px;">
                {{$career->job_title}}
            </h2>
            <hr>
        <div class="col-md-6">

            
            <div class="#animated zoomIn">
            <h4><b>Job Description</b></h4>
            <hr>
                <p><?php echo html_entity_decode($career->job_description);?></p>
            <h4><b>Job requirement</b></h4>
            <hr>
                <p><?php echo html_entity_decode($career->job_requirement);?></p>

            </div>
            <!-- Side Widget Well -->
            
            <h4><b>About the Company</b></h4>
            <hr>
            <p>LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing,marketing,seles;distribution and after-sal support services.</p>

            <h4><b>Contact Us</b></h4>
            <hr>
            <p>
                N0 . 160 E2, Preah Sihanouk Boulevard <br>Beoung Keng Kong I, Khan Chamkarmon<br> Phnom Penh, Cambodia <br>
            </p>
            <p><i class="fa fa-phone"></i> 
             <abbr title="Phone">Tel</abbr>: (+855) 23 224 487</p>
             <p><i class="fa fa-envelope-o"></i> 
                 <abbr title="Email">E-mail</abbr>: <a href="kao.sokharany@lhtcapital.com">kao.sokharany@lhtcapital.com</a>
             </p>
            
        </div>
        <div class="col-md-6">
            <a href="">
                <img class="img-responsive img-hover" src="{{ asset('uploads/images/') }}/{{ $career->image }}" alt="" style="border-radius: 5px; width: 100%">
            </a>
        </div>
     </div>
     <!-- /.row -->
     <hr>
 </div><!--close container-->
 @stop