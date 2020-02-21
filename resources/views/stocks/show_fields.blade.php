<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $stock->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nama Barang:') !!}
    <p>{!! $stock->name !!}</p>
</div>

<!-- Qty Field -->
<div class="form-group">
    {!! Form::label('qty', 'Jumlah Item:') !!}
    <p>{!! $stock->qty !!}</p>
</div>

<!-- Qty Item Field -->
<div class="form-group">
    {!! Form::label('qty_item', 'Jumlah Satuan:') !!}
    <p>{!! $stock->qty_item !!}</p>
</div>


