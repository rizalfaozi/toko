@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1  style="text-transform:capitalize; ">
            {{ $type }}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-green">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($admins, ['url' => ['admins', $admins->id], 'method' => 'patch','enctype'=>'multipart/form-data']) !!}

                        @include('admins.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection