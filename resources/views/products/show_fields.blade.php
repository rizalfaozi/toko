

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nama:') !!}
    <p>{!! $product->name !!}</p>
</div>

<!-- Brand Id Field -->
<div class="form-group">
    {!! Form::label('brand_id', 'Brand:') !!}
    <p>{!! $product->brand->name !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Harga:') !!}
    <p>{!! $product->price !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Deskripsi:') !!}
    <p>{!! $product->description !!}</p>
</div>

<!-- Motif Field -->
<div class="form-group">
    {!! Form::label('motif', 'Motif:') !!}
    <p>{!! $product->theme !!}</p>
</div>

<!-- Warna Field -->
<div class="form-group">
    {!! Form::label('warna', 'Warna:') !!}
    <p>{!! $product->color !!}</p>
</div>

<!-- Ephoto Field -->
<div class="form-group">
    {!! Form::label('photo', 'Photo:') !!}
    <p>{!! $product->photo !!}</p>
</div>

