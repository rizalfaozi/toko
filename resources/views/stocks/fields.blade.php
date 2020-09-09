<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama Barang:') !!}
    <input type="text" name="" disabled="disabled" value="{{ $stock->name }}" class="form-control">
    <input type="hidden" name="name" value="{{ $stock->name }}">
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', 'Jumlah Item:') !!}
    {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Qty Item Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size', 'Ukuran:') !!}
    {!! Form::number('size', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('other', 'Satuan Ukuran:') !!}
   <input type="text" name="" disabled="disabled" value="{{ $stock->other }}" class="form-control">
    <input type="hidden" name="other"  value="{{ $stock->other }}">
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('stocks.index') !!}" class="btn btn-default">Batal</a>
</div>
