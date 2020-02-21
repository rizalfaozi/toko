<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama Barang:') !!}
     <select name="name" class="form-control">
        <option value="0">Pilih Barang</option>
        <option value="Recin">Recin</option>
        <option value="Talk">Talk</option>
        <option value="Katalis">Katalis</option>
        <option value="Met">Met</option>
        <option value="Dempul">Dempul</option>
    </select>
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
    <select name="other" class="form-control">
    	<option value="0">Pilih Satuan</option>
    	<option value="liter">Liter</option>
    	<option value="lembar">Lembar</option>
    </select>
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('stocks.index') !!}" class="btn btn-default">Batal</a>
</div>
