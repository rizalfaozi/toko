@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="text-transform:capitalize; ">
              Kategori
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-green">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['url' => 'brands','enctype'=>'multipart/form-data']) !!}

                        @include('brands.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
