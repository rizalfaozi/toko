<!-- Nama Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Judul:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
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


<br>
@if(isset($slider) ? $slider->foto != "" : true )
<div class="form-group col-sm-12">
<img src="{!! url($slider->foto) !!}" width="140" height="115">
</div>
@endif

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', '* Status:') !!}<br>
     {{ Form::radio('status', 1, isset($slider) ? $slider->status == 1 : true) }} Aktif<br>
    {{ Form::radio('status', 0, isset($slider) ? $slider->status == 0 : false) }} Tidak Aktif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sliders.index') !!}" class="btn btn-default">Batal</a>
</div>
