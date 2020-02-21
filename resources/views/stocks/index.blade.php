@extends('layouts.app')

@section('content')
 <section class="content-header">
<div class="row">
        <div class="col-lg-3p col-xs-3p">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $recin }}</h3>
              <p>Recin</p>
            </div>
           
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3p col-xs-3p">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $talk }}</h3>

              <p>Talk</p>
            </div>
            
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3p col-xs-3p">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $katalis }}</h3>

              <p>Katalis</p>
            </div>
           
          
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3p col-xs-3p">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $met }}</h3>

              <p>Met</p>
            </div>
            
           
          </div>
        </div>
        <!-- ./col -->
         <!-- ./col -->
        <div class="col-lg-3p col-xs-3p">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3>{{ $dempul }}</h3>

              <p>Dempul</p>
            </div>
            
           
          </div>
        </div>
        <!-- ./col -->
      </div>
 </section>     
    <section class="content-header">
        <h1 class="pull-left">Stok Barang</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('stocks.create') !!}">Tambah</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('stocks.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

<style type="text/css">
 @media (min-width: 1200px){


.col-lg-3p {
    width: 20%;
    float: left;
}   

.col-xs-3p{
    width: 20%;
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;

 }
</style>

