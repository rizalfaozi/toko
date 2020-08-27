<!-- Kode Pesanan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_pesanan', 'Kode Pesanan:') !!}
    {!! Form::text('kode_pesanan', $report->id, ['class' => 'form-control','disabled'=>'disabled']) !!}
    <input type="hidden" name="order_id" value="{{ $report->id }}">
</div>

<!-- Produk Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Produk:') !!}
    <select name="product_id" class="form-control">
        <option value="0">Pilih Produk</option>
       @if(!empty($product))
        @foreach($product as $row)
           @if($report->product_id == $row->id)
             <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
           @else
             <option value="{{ $row->id }}">{{ $row->name }}</option>
           @endif  
        @endforeach
       @endif 
    </select>
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', 'Jumlah:') !!}
    {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Harga:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>



<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}<br>
     {{ Form::radio('status', 0, isset($admins) ? $admins->status == 0 : true) }} Proses<br>
    {{ Form::radio('status', 1, isset($admins) ? $admins->status == 1 : false) }} Terjual<br>
    {{ Form::radio('status', 2, isset($admins) ? $admins->status == 2 : false) }} Retur
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('reports.index') !!}" class="btn btn-default">Batal</a>
</div>
