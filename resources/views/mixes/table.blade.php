<table id="example" class="table table-striped table-bordered" style="width:100%" >
    <thead>
        <tr>
        <th>Nama Barang</th>
        <th>Stok</th>
        <th>Kategori</th>
        <th>Sub Kategori</th>
        <th>Recin</th>
        <th>Talk</th>
        <th>Katalis</th> 
        <th>Met</th>
        <th>Dempul</th>
        <th>Status</th>
            <th >Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mixes as $mix)
            <?php 
            $kategori = DB::table('brands')->where('id',$mix->brand_id)->first()->name;
            $sub = DB::table('brands')->where('id',$mix->sub_brand_id)->first()->name;
            $jml = DB::table('stock_orders')->where(['name'=>$mix->name,'brand_id'=>$mix->brand_id,'sub_brand_id'=>$mix->sub_brand_id])->first();
            
            ?>
        <tr>
            <td>{!! $mix->name !!}</td>
            <td><?php if(!empty( $jml->stock)){ echo  $jml->stock; }  ?> Item</td>
            <td><?php if(!empty($kategori)){ echo $kategori; }  ?></td>
            <td><?php if(!empty($sub)){ echo $sub; } ?></td>
            <td>{!! $mix->recin !!} Liter</td>
            <td>{!! $mix->talk !!} Liter</td>
            <td>{!! $mix->katalis !!} Liter</td>
            <td>{!! $mix->met !!} Liter</td>
            <td>{!! $mix->dempul !!} Lembar</td>

            <td><?php  if($jml->status ==0){ echo 'Unpublish'; }else{ echo 'Publish';   }  ?></td>
            <td>
                {!! Form::open(['route' => ['mixes.destroy', $mix->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                   <?php if($jml->status ==0){ ?>  
                     <a href="{{ url('mixes/status/publish/'.$mix->id)  }}" class='btn btn-default btn-xs'><i class="fa fa-bullhorn" aria-hidden="true"></i></a>
                   <?php }else { ?>
                      <a href="{{ url('mixes/status/unpublish/'.$mix->id)  }}" class='btn btn-default btn-xs'><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                   <?php } ?>
                   
                    <a href="{!! route('mixes.show', [$mix->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                   
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

