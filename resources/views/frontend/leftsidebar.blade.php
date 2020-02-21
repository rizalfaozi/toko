<div id="content-left">
<div id="sub-content-title">Produk Terlaris </div>

<div id="sub-content-center-privat">
<ul id="produklaris">

@foreach($propuler as $row)

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
<div id="sub-content-title">Hot Line Service</div>
<div id="sub-content-center">
	<p align="center" style="margin:0px auto; padding:3px;"><img src="http://arkadiaapps.loc/asset/images/hot-line-contact.png" /></p>
	<p align="center" style="margin:0px auto; padding:3px;"><img src="http://arkadiaapps.loc/asset/images/hot-line-email.png" /></p>
</div>
<div id="sub-content-footer"></div>

</div>