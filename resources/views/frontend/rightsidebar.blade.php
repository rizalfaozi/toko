<div id="content-right">




<div class="cleaner_h10"></div>
<div id="sub-content-title">Produk Terbaru </div>
<div id="sub-content-center-privat">
<ul id="produkbaru">

@foreach($proterbaru as $row)

<li>
<div id="list-produk">
<p style="text-align:center; margin:0px auto; height:35px;"><strong>{{ $row->name }}</strong></p><p style="text-align:center; margin:0px auto;"><img src="{{ url($row->photo) }}" width="100" class="vtip" title="Sandal Anak Gaul Kuning - Harga Rp.12.000,00" /><br />{!!  "Rp " . number_format($row->price,2,',','.');  !!}<div style="width:152px; margin:0px auto; padding:0px;"><input type="submit" class="tombol-beli" value="" ><a href="http://arkadiaapps.loc/produk/detail/sdl100016-sandal-anak-gaul-kuning" class="vtip" title="Sandal Anak Gaul Kuning - Harga Rp.12.000,00"><img src="http://arkadiaapps.loc/asset/images/bar-detail.png" border=0 style="float:right;" /></a></div>
</p>
</div>
</li>

@endforeach

</ul>
</div>
<div id="sub-content-footer"></div>





<div class="cleaner_h10"></div>
<div id="sub-content-title">Jasa Pengiriman Barang</div>
<div id="sub-content-center">
	<p align="center" style="margin:0px auto; padding:3px;"><a href="http://www.tiki-online.com/" target="_blank"><img src="http://arkadiaapps.loc/asset/images/tiki.png" border="0" /></a></p>
	<p align="center" style="margin:0px auto; padding:3px;"><a href="http://www.esl-express.com/" target="_blank"><img src="http://arkadiaapps.loc/asset/images/sl.png" border="0" /></a></p>
	<p align="center" style="margin:0px auto; padding:3px;"><a href="http://www.jne.co.id/" target="_blank"><img src="http://arkadiaapps.loc/asset/images/jne.png" border="0" /></a></p>
</div>
<div id="sub-content-footer"></div>



</div>