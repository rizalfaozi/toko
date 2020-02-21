<table id="example" class="table table-striped table-bordered" style="width:100%" >
    <thead>
        <tr>
             <th>Foto</th>
            <th>Nama</th>
        
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sliders as $slider)
        <tr>
             <td><img src="@if(isset($slider) ? $slider->foto != '' : false){!! url($slider->foto) !!}@else {{ asset('img/default.png') }}  @endif" width="300" height="100"></td>
            <td>{!! $slider->name !!}</td>
        
             <td>@if($slider->status == "1") Aktif @else Tidak Aktif @endif</td>
            
            
            
            <td>
                {!! Form::open(['route' => ['sliders.destroy', $slider->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sliders.show', [$slider->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sliders.edit', [$slider->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>