




    <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Nama Brands:') !!}
        <p>{!! $brands->name !!}</p>
    </div>

      <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Setting:') !!}
        <p>{!! $brands->setting !!}</p>
    </div>

      <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Menu:') !!}
        <p>{!! $brands->menu_id !!}</p>
    </div>


<div class="form-group">
    <a href="{!! route('brands.index') !!}" class="btn btn-default">Kembali</a>
    </div>

