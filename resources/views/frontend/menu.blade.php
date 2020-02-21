<div id="menu">
<div id="menu-kiri">
<ul>
<a href="{{ url('/') }}" title="Beranda - Grosir Sandal Online"><li><img src="http://arkadiaapps.loc/asset/images/icon-home.png" class="menu-img" border="0" />Beranda</li></a>

<a href="{{ url('about') }}" title="Profil Kami "><li><img src="http://arkadiaapps.loc/asset/images/icon-about.png" class="menu-img" border="0" />Tentang Kami</li></a>

<a href="{{ url('info') }}" title="Cara Belanja | Grosir Sandal Online"><li><img src="http://arkadiaapps.loc/asset/images/icon-how-to.png" class="menu-img" border="0" />Cara Belanja</li></a>

<a href="{{ url('contact') }}" title="Hubungi Kami | Grosir Sandal Online"><li><img src="http://arkadiaapps.loc/asset/images/icon-contact.png" class="menu-img" border="0" />Hubungi Kami</li></a>


</ul>
</div>
<div id="menu-kanan"><form method="post" action="{{ url('search') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
<input type="text" class="input-teks" size="16" value="Cari Produk..." onblur="if(this.value=='') this.value='Cari Produk...';" onfocus="if(this.value=='Cari Produk...') this.value='';" name="cari"  /> <input type="submit" value="Cari" class="input-tombol" /></form>
</div>
</div>