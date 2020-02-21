<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $mix->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $mix->name !!}</p>
</div>

<!-- Stock Id Field -->
<div class="form-group">
    {!! Form::label('stock_id', 'Kategori:') !!}
    <p>{!! $mix->brand->name !!}</p>
</div>

<!-- Qty Field -->
<div class="form-group">
    {!! Form::label('qty', 'Sub Kategori:') !!}
    <p>{!! DB::table('brands')->where('id',$mix->sub_brand_id)->first()->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $mix->created_at !!}</p>
</div>

