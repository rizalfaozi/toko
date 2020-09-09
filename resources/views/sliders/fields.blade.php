<!-- Nama Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Judul:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
 {!! Form::label('product', 'Produk:') !!} 
<select name="product_id" class="form-control" id="product_id">
    <option value="0">Pilih Produk</option>
    @foreach($products as $row)
         <?php $brand_id = DB::table('brands')->where(['id'=>$row->brand_id])->first()->name;?>
         <?php $sub_brand_id = DB::table('brands')->where(['id'=>$row->sub_brand_id])->first()->name;?>
        @if(Request::segment(3) == "edit")
            @if($row->id == $slider->product_id)   

              <option value="{{ $row->id }}" selected="selected">{{ $row->name }} - {{ $brand_id }} - {{ $sub_brand_id }} </option>  
            @endif
        @else
         <option value="{{ $row->id }}">{{ $row->name }} - {{ $brand_id }} - {{ $sub_brand_id }} </option>     
        @endif
    @endforeach
</select>

</div>
<!-- Nama Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Deskripsi:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-12">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto', null, ['class' => 'form-control']) !!}
</div>


@if(Request::segment(3) == "edit")

@if(isset($slider) ? $slider->foto != "" : true )
<div class="form-group col-sm-12">
<img src="{!! url($slider->foto) !!}" width="140" height="115">
</div>
@endif


@endif


@if(Request::segment(3) == "edit")
<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', '* Status:') !!}<br>
     {{ Form::radio('status', 1, isset($slider) ? $slider->status == 1 : true) }} Publish<br>
    {{ Form::radio('status', 0, isset($slider) ? $slider->status == 0 : false) }} Unpublish
</div>

@else

<div class="form-group col-sm-6">
    {!! Form::label('status', '* Status:') !!}<br>
    <input type="radio" name="status" id="status" value="1"> Publish<br>
    <input type="radio" name="status" id="status" value="0"> Unpublish
</div>

@endif


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sliders.index') !!}" class="btn btn-default">Batal</a>
</div>
