<table id="example" class="table table-striped table-bordered" style="width:100%" >
    <thead>
        <tr>
        <th>Nama Barang</th>
        <th>Jumlah</th>
       
        <th>Ukuran</th>
         <th>Total </th>
        <th>Tgl Pembuatan</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($stocks as $stock)
        <tr>
            <td>{!! $stock->name !!}</td>
            <td>{!! $stock->qty !!}</td>

            <td>{!! $stock->size !!} {{  $stock->other }}</td>
                <td>{!! $stock->total_size !!} {{  $stock->other }}</td>
             <td>{!! $stock->created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['stocks.destroy', $stock->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('stocks.show', [$stock->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('stocks.edit', [$stock->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

