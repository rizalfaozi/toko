<table id="example" class="table table-striped table-bordered" style="width:100%" >
    <thead>
        <tr>
            <th>Kode Pesanan</th>
        <th>Produk</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Status</th>
        <th>Keterangan</th>
            <th >Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($reports as $report)
        <tr>
            <td>{!! $report->id!!}</td>
            <td>{!! DB::table('products')->where('id',$report->product_id)->first()->name !!}</td>
            <td>{!! $report->qty !!}</td>
            <td>{!! $report->price !!}</td>
            <td>{{ $report->qty*$report->price }}</td>
            <td>@if($report->status ==0) Proses Pesanan @elseif($report->status ==1) Terjual @else Retur  @endif</td>
            <td>{!! $report->description !!}</td>
            <td>
                {!! Form::open(['route' => ['reports.destroy', $report->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('reports.show', [$report->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('reports.edit', [$report->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>