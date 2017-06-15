
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="subheader">
      <div id="email" class="pull-right">

        <section class="section-1 clearfix">

          <ul style="margin-bottom:-2px;">
            <li style="display: inline-block;">
              <form action="" method="GET">
                <input type="hidden" name="lang" value="kh">                     
                <input type="submit" value="ភាសាខ្មែរ" style="border:0px;margin-left:85px; font-size:18px; background: rgba(238, 238, 238, 0.62)" >
              </form>
            </li> |
            <li style="display: inline-block;">
              <form action="" method="GET">
                <input type="hidden" name="lang" value="en">    
                <input type="submit" value='English' style="border:0px;font-size:18px; background: rgba(238, 238, 238, 0.62)">
              </form>
            </li>
          </ul>

          {{-- <ul style="margin-bottom: 0px;">
            <li style="display: inline-block;">
              <form action="" method="get">
                <input type="hidden" name="lang" value="en">    
                <input type="submit" value='' style="border:0px;background:url('{{URL::asset("uploads/images/english.png")}}');background-size: 100%;width: 35px;
                height: 20px;" >
              </form>
            </li>

            <li style="display: inline-block;">
              <form action="" method="get">
                <input type="hidden" name="lang" value="kh">                     
                <input type="submit" value="" style="border:0px;background:url('{{URL::asset("uploads/images/khmer.png")}}');background-size: 100%;width: 35px;
                height: 20px;">
              </form>
            </li>
          </ul> --}}
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
      <?php
      use App\Http\Controllers\Helpers\Language;
     ?>
      <a class="navbar-brand" href="{{ url('') }}"><img src="{{ asset('uploads/images/Logo LHT.png') }}" style="margin-top:-10px; width:100px; height:120px; margin-left: <?php echo Language::getTitleLang() == 'kh'? '-30px': '0px' ; ?>"></a>	
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div style="margin-left: <?php echo Language::getTitleLang() == 'en'? '10px': '-33px' ; ?>;" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        @foreach($menu as $row)

          @if($row->alias != 'home')
            @if($row->alias == 'group-company')
              <li><a style="width:165px;" href="{{ url(''). '/'. $row->alias }}">{{ $row->name }}</a></li>
            @endif

            @if($row->name =='ក្រុមការងាររបស់យើង')
              <li ><a href="{{ url(''). '/'. $row->alias }}" style="width: 199px;">{{ $row->name }}</a></li>
            @else
              @if(($row->name != 'ក្រុមហ៊ុនជាដៃគូ') && ($row->name != 'Group Company'))
                @if($row->name == 'ទំនាក់ទំនង')
                  <li><a href="{{ url(''). '/'. $row->alias }}" style="width: 125px;" >{{ $row->name }}</a></li>
                @endif
                @if($row->name == 'កាងារ')
                  <li><a href="{{ url(''). '/'. $row->alias }}" style="width: 106px;" >{{ $row->name }}</a></li>
                
                @else
                  @if($row->name != 'ទំនាក់ទំនង')
                    <li><a href="{{ url(''). '/'. $row->alias }}">{{ $row->name }}</a></li>
                  @endif
                @endif
              @endif
            @endif
            
          @else
          <li class="active"><a href="{{ url('') }}">{{ $row->name }}</a></li>
          @endif
        @endforeach
      </ul> 
    </div>
    <!-- Close Menu -->
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>