 <?php 
    $order = DB::table('stock_orders')->where('id',$product->product_id)->first();
    $brand =  DB::table('brands')->where('id',$order->brand_id)->first();
    $subbrand =  DB::table('brands')->where('id',$order->sub_brand_id)->first();
  ?> 
<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;">
	<a href="">Beranda</a> &gt; Order &gt; {{ $order->name }}</div>



<h1>Form Pemesanan Produk {{ $order->name }}</h1>

<div class="cleaner_h10"></div>

<form method="post" action="{{ url('order/send') }}">
<table width="100%">
<tbody>
	<tr>
		<td width="100">Nama </td>
		<td width="20">:</td>
		<td><input name="name" type="text" class="input-teks" id="name" size="50">

<div id="alertnama" style="display:none; background-color:#999999; color:#FFFFFF; padding:5px;">Nama tidak diijinkan kosong</div>
</td>
</tr>

<tr>
	<td width="100">Email</td>
	<td>:</td>
	<td><input name="email" type="text" class="input-teks" id="email" size="50"></td>
</tr>

<tr>
	<td width="100">Produk</td>
	<td>:</td>
	<td>
		<input  type="text" disabled="disabled" class="input-teks" size="50" value="{{ $order->name }}">
        <input name="product_id" type="hidden" class="input-teks" id="product_id" size="50" value="{{ $product->id }}">

        <input name="product_name" type="hidden" class="input-teks" id="produk_name" size="50" value="{{ $order->name }}">
	</td>
</tr>

<tr>
	<td width="100">Kategori</td>
	<td>:</td>
	<td>
		<input  type="text" disabled="disabled" class="input-teks" size="50" value="{{ $brand->name }}">
        <input name="brandid" type="hidden" class="input-teks" id="brandid" size="50" value="{{ $brand->id }}">
	</td>
</tr>

<tr>
	<td width="100">Sub Kategori</td>
	<td>:</td>
	<td>
		<input  type="text" disabled="disabled" class="input-teks" size="50" value="{{ $subbrand->name }}">
        <input name="subbrand" type="hidden" class="input-teks" id="subbrand" size="50" value="{{ $subbrand->id }}">
	</td>
</tr>

<!-- <tr>
	<td width="100">Stok</td>
	<td>:</td>
	<td>
		<input  type="text" disabled="disabled" class="input-teks" size="50" value="{{ $order->stock }}">
        <input name="stock" type="hidden" class="input-teks" id="stock" size="50" value="{{ $order->stock }}">
	</td>
</tr> -->

<tr>
	<td width="100">Harga</td>
	<td>:</td>
	<td>
		<input  type="text" disabled="disabled" class="input-teks" size="50" value="{{ $product->price }}">
        <input name="price" type="hidden" class="input-teks" id="price" size="50" value="{{ $product->price }}">
	</td>
</tr>

<tr>
	<td width="100">Jumlah</td>
	<td>:</td>
	<td><input name="qty" type="text" class="input-teks" id="qty" size="50" value="1"></td>
</tr>

<tr>
	<td width="100">Total</td>
	<td>:</td>
	<td><div id="total"></div></td>
</tr>

<tr>
	<td width="100">No. Telpon</td>
	<td>:</td>
	<td><input name="phone" type="text" class="input-teks" id="phone" size="50"></td>
</tr>

<tr>
	<td width="100" valign="top">Alamat</td>
	<td valign="top">:</td>
	<td><textarea name="address" cols="60" rows="6" class="input-teks" id="address"></textarea></td>
</tr>

<tr>
	<td width="100">Kota</td>
	<td>:</td>
	<td><input name="city" type="text" class="input-teks" id="city" size="50"></td>
</tr>


<tr>
	<td width="100" valign="top">Keterangan</td>
	<td valign="top">:</td>
	<td><textarea name="description" cols="60" rows="6" class="input-teks" id="description"></textarea></td>
</tr>


<tr>
	<td width="100"></td>
	<td></td>
	<td>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
		<input type="submit" class="input-tombol"  value="Kirim Pesan"><input type="reset" class="input-tombol" value="Kosongkan Form"></td></tr>
</tbody></table>
</form>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
  $("#qty").keyup(function(){
    let qty =  $('#qty').val();
    let price =  $('#price').val();
       let total = price*qty;
      $('#total').html('<input type="text" disabled="disabled" class="input-teks" size="50" value="'+ total +'"> ');
  });
});
</script>
