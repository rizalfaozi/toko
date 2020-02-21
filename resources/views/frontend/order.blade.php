<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;">
	<a href="">Beranda</a> &gt; Order &gt; {{ $product->name }}</div>



<h1>Form Pemesanan Produk {{ $product->name }}</h1>

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
		<input  type="text" disabled="disabled" class="input-teks" size="50" value="{{ $product->name }}">
        <input name="product_id" type="hidden" class="input-teks" id="product_id" size="50" value="{{ $product->id }}">

        <input name="product_name" type="hidden" class="input-teks" id="produk_name" size="50" value="{{ $product->name }}">
	</td>
</tr>

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