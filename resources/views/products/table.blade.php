<table id="example" class="table table-striped table-bordered" style="width:100%" >
    <thead>
        <tr>
            <th>Photo</th>
            <th>Nama</th>
        <th>Brand</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Deskripsi</th>
        <th>Motif</th>
        <th>Warna</th>
        <th>Status</th>
       
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($product as $produk)
      <?php $ID = DB::table('stock_orders')->where(['brand_id'=>$produk->brand_id,'sub_brand_id'=>$produk->sub_brand_id])->first();?>
        <tr>
            <td><img width="50" height="50"  src="@if(isset($produk) ? $produk->photo != '' : false){!! url($produk->photo) !!}@else {{ asset('img/default.png') }}  @endif" /></td>
            <td><?php echo  $ID->name ;?></td>
            <td>{!! $produk->brand->name !!}</td>
            <td>@if($produk->price ==0) - @else  {!!  "Rp " . number_format($produk->price,2,',','.');  !!}@endif</td>
            <td><?php echo  $ID->stock;?> Item</td>
            <td>@if($produk->description =="")- @else {!!  substr($produk->description, 0, 80) !!} ...@endif</td>
            <td>@if($produk->theme =="")  - @else {!! $produk->theme !!}@endif</td>
            <td>@if($produk->color =="") - @else{!! $produk->color !!}@endif</td>
            <td>@if($produk->status ==0) Unpublish    @else  Publish @endif</td>
           
            <td>
                {!! Form::open(['route' => ['product.destroy', $produk->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @if($produk->status ==0)
                      <a href="{{ url('product/status/publish/'.$produk->id)  }}" class='btn btn-default btn-xs'><i class="fa fa-bullhorn" aria-hidden="true"></i></a>
                    @else
                      <a href="{{ url('product/status/unpublish/'.$produk->id)  }}" class='btn btn-default btn-xs'><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                    @endif
                    <a href="{!! route('product.show', [$produk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('product.edit', [$produk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>