@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kategori
        </h1>
    </section>
    <div class="content">
        <div class="box box-green">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('brands.show_fields')
                    
                </div>
                
            </div>
        </div>
    </div>
@endsection
