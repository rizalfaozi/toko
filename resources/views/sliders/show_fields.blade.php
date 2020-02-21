<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $slider->id !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $slider->nama !!}</p>
</div>

@if(!empty($slider))
<div class="form-group">
 <img width="300" height="100" src="@if($slider->foto != '') {!! url($slider->foto) !!}@else {{ asset('img/default.png') }}  @endif">
</div>    

@endif

<!-- Prduct Id Field -->
<div class="form-group">
    {!! Form::label('products_id', 'Products:') !!}
    <p>{!! $slider->products->nama !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $slider->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $slider->updated_at !!}</p>
</div>

