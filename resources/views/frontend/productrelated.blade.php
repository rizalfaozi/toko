<h1>Produk Lainnya Dengan Kategori "{{ $category }}"</h1>

@foreach($prorelated as $row)
<form method="post" action="http://arkadiaapps.loc/keranjang/tambah_barang">
<input type="hidden" name="kode_produk" value="SDL100009">
<input type="hidden" name="banyak" value="1">
<input type="hidden" name="harga" value="12000">
<input type="hidden" name="nama_produk" value="Sandal Anak Gaul Kuning">
<div style="border:1px solid #CCCCCC; margin-bottom:10px; padding:5px; width:152px; float:left; margin-right:6px; -moz-border-radius: 5px; -webkit-border-radius: 5px; z-index: 6666669 ;">
<p style="text-align:center; height:40px; margin:0px auto;"><strong>{{ $row->name }}</strong></p>
<p style="text-align:center; margin:0px auto;">
	<img src="{{ url($row->photo) }}" width="100"><br>Rp {!!  number_format($row->price,2,',','.')  !!}
</p>
	<div style="width:152px; margin:0px auto; padding:0px;">
		<input type="submit" class="tombol-beli" value="">
		<a href="http://arkadiaapps.loc/produk/detail/sdl100009-sandal-anak-gaul-kuning" class="vtip" title="Sandal Anak Gaul Kuning - Harga Rp.12.000,00">
			<img src="http://arkadiaapps.loc/asset/images/bar-detail.png" border="0" style="float:right;">
		</a>
	</div>
	<p></p>
</div>
</form>
@endforeach

