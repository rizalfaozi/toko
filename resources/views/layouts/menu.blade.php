<li class="header">MAIN NAVIGATION</li>

<li class="">
    <a href="{!! url('home') !!}"><i class="fa fa-home"></i><span>Dashboard</span></a>
</li>


<li class="treeview">
  <a href="#">
    <i class="fa fa-users"></i>
    <span>Management User</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">

<li class="">
    <a href="{!! route('admins.index') !!}"><i class="fa fa-circle-o"></i><span>Admin</span></a>
</li>

  </ul>
</li>


<li class="treeview">
  <a href="#">
    <i class="fa fa-bookmark"></i>
    <span>Management Produk</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">


<li class="">
    <a href="{!! route('brands.index') !!}"><i class="fa fa-circle-o"></i><span>Kategori</span></a>
</li>


<li class="{{ Request::is('product*') ? 'active' : '' }}">
    <a href="{!! route('product.index') !!}"><i class="fa fa-circle-o"></i><span>Produk</span></a>
</li>



  </ul>
</li>




<li class="{{ Request::is('sliders*') ? 'active' : '' }}">
    <a href="{!! route('sliders.index') !!}"><i class="fa fa-comment"></i><span>Slider </span></a>
</li>



<li class="{{ Request::is('reports*') ? 'active' : '' }}">
    <a href="{!! route('reports.index') !!}"><i class="fa fa-exclamation-circle"></i><span>Reports</span></a>
</li>



<li class="{{ Request::is('stocks*') ? 'active' : '' }}">
    <a href="{!! route('stocks.index') !!}"><i class="fa fa-database"></i><span>Stocks</span></a>
</li>

<li class="{{ Request::is('mixes*') ? 'active' : '' }}">
    <a href="{!! route('mixes.index') !!}"><i class="fa fa-gift"></i><span>Mixes</span></a>
</li>


