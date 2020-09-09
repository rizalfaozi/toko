
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;">
	<a href="{{ url('') }}">Beranda</a> &gt; 
	<a href="">{{ $category }}</a> &gt;
	 {{  $subcategory }}
</div>

<!-- <iframe src="http://www.facebook.com/plugins/like.php?href=http://arkadiaapps.loc/produk/detail/sdl100003-sandal-anak-gaul-kuning&amp;layout=standard&amp;show_faces=false&amp;width=500&amp;action=recommend&amp;colorscheme=light&amp;height=40" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:40px; color:#FFFFFF;" allowtransparency="true"></iframe> -->
  <?php $name = DB::table('stock_orders')->where('id',$product->product_id)->first()->name; ?> 

<h1>{{ $name }}</h1>

<!-- <div class="share">Bagikan Produk ini ke : 
	<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'> Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'> Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'> Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'> Digg</a>");
</script>
<a href="http://twitter.com/home/?status=http://arkadiaapps.loc/produk/detail/sdl100003-sandal-anak-gaul-kuning" target="_blank"> Twitter</a> | <a href="http://www.facebook.com/share.php?u=http://arkadiaapps.loc/produk/detail/sdl100003-sandal-anak-gaul-kuning" target="_blank"> Facebook</a> | <a href="http://www.reddit.com/submit?url=http://arkadiaapps.loc/produk/detail/sdl100003-sandal-anak-gaul-kuning" target="_blank"> Reddit</a> | <a href="http://digg.com/submit?url=http://arkadiaapps.loc/produk/detail/sdl100003-sandal-anak-gaul-kuning" target="_blank"> Digg</a>
</div> -->

<div class="cleaner_h10"></div>

<table width="100%">
<tbody><tr><td rowspan="5"><img src="{{ url($product->photo)}}" width="150"></td>
<td>Harga </td><td>:</td><td><span style="margin:0px auto; padding:0px; font-size:15px;"><b>Rp {!!  number_format($product->price,2,',','.')  !!}</b></span> -per pasang</td></tr>
<tr><td>Motif </td><td>:</td><td><span style="margin:0px auto; padding:0px; font-size:12px;"><b>{{ $product->theme }}</b></span></td></tr>
<tr><td>Warna </td><td>:</td><td>{{ $product->color }}</td></tr>

<tr><td>Jumlah Pesanan </td><td>:</td>
	<td>


<select name="banyak">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>

</select>




</td></tr>

<tr><td colspan="3"><a href="{{ url('order/'.$product->id) }}"  class="tombol-beli-produk"></a></td></tr>
<tr>

<td>
	<a href="{{ url($product->photo) }}" rel="example_group" title="{{ $name }} - Harga  Rp {!!  number_format($product->price,2,',','.');  !!}"><div class="tombol-perbesar">Perbesar Gambar Produk</div></a>
</td>

<td colspan="3">NB : @if($product->noted =="") - @else {{ $product->noted }} @endif</td></tr>
<tr><td colspan="4"><b>Deskripsi Produk</b></td></tr>
<tr><td colspan="4">@if($product->description =="")Deskripsi produk masih kosong.@else {{ $product->description }}  @endif</td></tr>
</tbody></table></form>

<!-- <div class="share">Bagikan Produk ini ke : 
	<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'> Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'> Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'> Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'> Digg</a>");
</script><a href="http://twitter.com/home/?status=http://arkadiaapps.loc/produk/detail/sdl100003-sandal-anak-gaul-kuning" target="_blank"> Twitter</a> | <a href="http://www.facebook.com/share.php?u=http://arkadiaapps.loc/produk/detail/sdl100003-sandal-anak-gaul-kuning" target="_blank"> Facebook</a> | <a href="http://www.reddit.com/submit?url=http://arkadiaapps.loc/produk/detail/sdl100003-sandal-anak-gaul-kuning" target="_blank"> Reddit</a> | <a href="http://digg.com/submit?url=http://arkadiaapps.loc/produk/detail/sdl100003-sandal-anak-gaul-kuning" target="_blank"> Digg</a>
</div>
 -->

<div class="cleaner_h30"></div>
@include('frontend.productrelated')