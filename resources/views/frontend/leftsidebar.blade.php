<div id="content-left">
<div id="sub-content-title">Produk Terlaris </div>

<div id="sub-content-center-privat">
<ul id="produklaris">

@foreach($propuler as $row)
   <?php $name = DB::table('stock_orders')->where('id',$row->product_id)->first()->name; ?> 
<li>
<div id="list-produk">
<p style="text-align:center; margin:0px auto; height:35px;"><strong>{{ $name }}</strong></p><p style="text-align:center; margin:0px auto;"><img src="{{ url($row->photo) }}" width="100" class="vtip" title="{{ $name }}" /><br />{!!  "Rp " . number_format($row->price,2,',','.');  !!}<div style="width:152px; margin:0px auto; padding:0px;">

	<a href="{{ url('order/'.$row->id) }}" class="tombol-beli" ></a>
	<a href="{{ url('detail/'.$row->id) }}" class="vtip" title="{{ $name }} - Harga Rp {!! number_format($row->price,2,',','.')  !!}">
				<img src="{{ asset('images/bar-detail.png') }}" border=0 style="float:right;" />
			</a>
</div>
</p>
</div>
</li>

@endforeach

</ul>
</div>
<div id="sub-content-footer"></div>












<div class="cleaner_h10"></div>
<div id="sub-content-title">Hot Line Service</div>
<div id="sub-content-center">
	<p align="center" style="margin:0px auto; padding:3px;"><img src="{{ url('/images/hot-line-contact.png') }}" /></p>
	<p align="center" style="margin:0px auto; padding:3px;"><img src="{{ url('/images/hot-line-email.png') }}" /></p>
</div>
<div id="sub-content-footer"></div>

</div>