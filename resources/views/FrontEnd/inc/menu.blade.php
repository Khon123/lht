<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="subheader">
      <div id="email" class="pull-right">

        <section class="section-1 clearfix">
          <ul style="margin-bottom: 0px;">
            <li style="display: inline-block;">
              <form action="" method="get">
                <input type="hidden" name="lang" value="en">    
                <input type="submit" value='' style="border:0px;background:url('{{URL::asset("frontend/images/english.png")}}');background-size: 100%;width: 35px;
                height: 20px;" >
              </form>
            </li>

            <li style="display: inline-block;">
              <form action="" method="get">
                <input type="hidden" name="lang" value="kh">                     
                <input type="submit" value="" style="border:0px;background:url('{{URL::asset("frontend/images/khmer.png")}}');background-size: 100%;width: 35px;
                height: 20px;">
              </form>
            </li>
          </ul>
        </section>

        {{-- <a href="index_khmer.html" style="margin-left:51px; font-size:18px;">ភាសាខ្មែរ</a> | <a href="index.html" style="font-size:18px;">English</a><br />  --}}
        <form class="navbar-form pull-right">
          <input type="text" class="form-control" placeholder="Search this site ..." id="searchinput" />
        </form>                       
      </div>
    </div> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('') }}"><img src="{{ asset('frontend/images/') }}/LHT .png" style="margin-top:-10px; width:100px; height:120px; margin-left:-5%;"></a>	
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        @foreach($menu as $row)
        <?php 
        if($row->alias!='home')
        {
          ?>
          <li><a href="{{ url(''). '/'. $row->alias }}">{{ $row->name }}</a></li>
          <?php  
        }
        else
        {
          ?>
          {{-- @if($row->name =='Group Company')
            <li><a href="{{ url('') }}" style="width: 179px;">{{ $row->name }}</a></li>
          @endif --}}
          <li><a href="{{ url('') }}">{{ $row->name }}</a></li>
          <?php 
        }
        ?>

        @endforeach
</ul> 
</div>
<!-- Close Menu -->
<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>