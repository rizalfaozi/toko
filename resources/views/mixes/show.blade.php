@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mix
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('mixes.show_fields')
                    <a href="{!! route('mixes.index') !!}" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
