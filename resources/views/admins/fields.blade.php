<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', '* Username:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
 
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', '* Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<?php if(Request::segment(2) =="create"){  ;?>
<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', '* Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<?php } ?>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', '* Telp:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'photo:') !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}
</div>

<br>
@if(isset($admins) ? $admins->photo != "" : true )
<div class="form-group col-sm-12">
<img src="{!! url($admins->photo) !!}" width="140" height="115">
</div>
@endif

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', '* Status:') !!}<br>
     {{ Form::radio('status', 1, isset($admins) ? $admins->status == 1 : true) }} Aktif<br>
    {{ Form::radio('status', 0, isset($admins) ? $admins->status == 0 : false) }} Tidak Aktif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admins.index') !!}" class="btn btn-default">Batal</a>
</div>

