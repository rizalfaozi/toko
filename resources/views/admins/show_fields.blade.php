
<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('photo', 'Photo:') !!}
    <p><img width="50" height="50"  src="@if(isset($admins) ? $admins->photo != '' : false){!! $admins->photo !!}@else {{ asset('img/default.png') }}  @endif" /></p>
</div>


<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $admins->name !!}</p>
</div>


<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $admins->email !!}</p>
</div>



<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{!! $admins->phone !!}</p>
</div>


<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>@if($admins->status==0) Tidak Aktif @else Aktif @endif</p>
</div>


