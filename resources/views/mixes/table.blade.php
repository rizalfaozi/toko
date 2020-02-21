<table id="example" class="table table-striped table-bordered" style="width:100%" >
    <thead>
        <tr>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Sub Kategori</th>
        <th>Recin</th>
        <th>Talk</th>
        <th>Katalis</th> 
        <th>Met</th>
        <th>Dempul</th>
            <th >Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mixes as $mix)
        <tr>
            <td>{!! $mix->name !!}</td>
            <td>{!! $mix->brand->name !!}</td>
            <td>{!! DB::table('brands')->where('id',$mix->sub_brand_id)->first()->name !!}</td>
            <td>{!! $mix->recin !!} Liter</td>
            <td>{!! $mix->talk !!} Liter</td>
            <td>{!! $mix->katalis !!} Liter</td>
            <td>{!! $mix->met !!} Liter</td>
            <td>{!! $mix->dempul !!} Lembar</td>
            <td>
                {!! Form::open(['route' => ['mixes.destroy', $mix->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mixes.show', [$mix->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                   
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

