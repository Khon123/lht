<?php
use App\Http\Controllers\Helpers\Language;
?>
@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          {{--<li class="header">{{ trans('backpack::base.administration') }}</li>--}}
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span><?php echo Language::getTitleLang()=='en'?'Dashboard':'ផ្ទាំងគ្រប់គ្រង'?></span></a></li>
          
          <!-- ======================================= -->
          
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/menu') }}"><i class="fa fa-newspaper-o"></i><span><?php echo Language::getTitleLang()=='en'?' Menu':' ម៉ឺនុយ'?></span></a></li>

          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/home') }}"><i class="fa fa-home"></i> <span><?php echo Language::getTitleLang()=='en'?'Home':'ទំព័រដើម'?></span></a></li>

          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/about') }}"><i class="fa fa-list"></i> <span><?php echo Language::getTitleLang()=='en'?'About':'អំពីយើង'?></span></a></li>
          
          <li><a href="{{  url(config('backpack.base.route_prefix', 'admin').'/slide') }}"><span class="glyphicon glyphicon-picture"><?php echo Language::getTitleLang()=='en'?' Slider':' ស្លាយដឺ'?></span></a></li>
          
          <li class="treeview">
              <a href=""><i class="fa fa-group"></i><span><?php echo Language::getTitleLang()=='en'?'Group Company':'ក្រុមហ៊ុនជាដៃគួ'?></span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/company') }}"><span><?php echo Language::getTitleLang()=='en'?'Company':'ក្រុមហ៊ុន'?></span></a></li>
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/subcompany') }}"><span><?php echo Language::getTitleLang()=='en'?'Sub Company':'ក្រុមហ៊ុនដៃគួ'?></span></a></li>
              </ul>
          </li>

          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/team') }}"><i class="fa fa-list"></i> <span><?php echo Language::getTitleLang()=='en'?'Our Team':'ក្រុមការងាររបស់យើង'?></span></a></li>

          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/event') }}"><i class="fa fa-list"></i> <span><?php echo Language::getTitleLang()=='en'?'Event':'ព្រឹតិការណ៏'?></span></a></li>

          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/trading') }}"><i class="fa fa-list"></i> <span><?php echo Language::getTitleLang()=='en'?'Trading':'ពាណិជ្ជកម្ម'?></span></a></li>

          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/career') }}"><i class="fa fa-list"></i> <span><?php echo Language::getTitleLang()=='en'?'Career':'ការងារ'?></span></a></li>
          <hr/>
          <li class="treeview">
              <a href=""><i class="fa fa-cogs"></i><span><?php echo Language::getTitleLang()=='en'?'Setting':'ការកំណត់'?></span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/user') }}"><?php echo Language::getTitleLang()=='en'?'User':'អ្នកប្រើប្រាស់'?></a></li>
              </ul>
          </li>
          <!-- ======================================= -->
          {{-- <li class="header">{{ trans('backpack::base.user') }}</li> --}}
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span><?php echo Language::getTitleLang()=='en'?'Logout':'ចាកចេញពីកម្មវិធី'?></span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
