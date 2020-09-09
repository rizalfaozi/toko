@extends('layouts.app')

@section('content')
 
    <section class="content-header">
        <h1 class="pull-left">Laporan</h1>

         
        
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('reports.create') !!}">Tambah</a>

           <a class="btn btn-default pull-right" style="margin-top: -10px;margin-bottom: 5px;margin-right:10px;" href="{{ url('showprint') }}">Print</a>
        </h1>
             
        

    </section>

 

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
<form action="{{ url('cari/report') }}">
    <div class="box-header">
                <div class="pull-left">
       <select name="bulan" class="form-control">
           <option value="0">Pilih Bulan</option>

           <option value="01">Januari</option>
           <option value="02">Februari</option>
           <option value="03">Maret</option>
           <option value="04">April</option>
           <option value="05">Mei</option>
           <option value="06">Juni</option>
           <option value="07">Juli</option>
           <option value="08">Agustus</option>
           <option value="09">September</option>
           <option value="10">Oktober</option>
           <option value="11">November</option>
           <option value="12">Desember</option>
       </select>
    </div>
    <div class="pull-left" style="margin: 0px 5px;">
         <select name="tahun" class="form-control">
           <option value="0">Pilih Tahun</option>

           <option value="2020">2020</option>
           <option value="2019">2019</option>
           <option value="2018">2018</option>
           <option value="2017">2017</option>
           <option value="2016">2016</option>
           <option value="2015">2015</option>
         
       </select>

    </div>  
    
     <div class="pull-left" style="margin: 0px 5px;">
        <input type="submit" name="cari" value="Cari" class="btn btn-primary">
     </div>
     </form> 
            </div>    
            <div class="box-body">
                    @include('reports.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

