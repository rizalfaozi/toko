<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', '* Nama Menu:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
 
</div>

@if($jml ==0)
<input type="hidden" name="setting" value="utama" id="setting">
<input type="hidden" name="menu_id" value="0">
@else

<!-- photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('setting', 'Setting:') !!}
     <select class="form-control" name="setting">
        <option value="0">Pilih Navigasi</option>

        @if(empty($brands))
        <option value="utama">Utama</option>
        <option value="submenu">Sub Menu</option>
        @else
           @if(isset($brands) ? $brands->setting =="utama" : true)
             <option value="utama" selected>Utama</option>
             <option value="submenu">Sub Menu</option>
           @else
              <option value="utama">Utama</option>
             <option value="submenu" selected>Sub Menu</option>

           @endif

        @endif
  
    </select>
</div>



<!-- photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('menu_id', 'Menu:') !!}
     <select class="form-control" name="menu_id">
        <option value="0">Pilih Menu</option>

      @if(empty($kategori))  
        @foreach($kategori as $row)
        <option value="{{ $row->id }}">{{ $row->name }}</option>
       @endforeach

      @else
         @foreach($kategori as $row)

           @if(isset($brands) ? $brands->menu_id == $row->id : false)
            <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
           @else
             <option value="{{ $row->id }}">{{ $row->name }}</option>

           @endif

          @endforeach
      @endif 
    </select>
</div>

@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('brands.index') !!}" class="btn btn-default">Batal</a>
</div>

