<div id="content-center">
<div style="padding:5px; border:1px solid #ccc; margin-bottom:10px;"><a href="{!! url('') !!}">Beranda</a> > <a href="#">  {{ $sliderdet->name }} </a> </div>
<h1>{{ $sliderdet->name }}</h1>
<p>
	{{ $sliderdet->description }}
</p>

<p>
<img style="width: 100%;" src="{{ url($sliderdet->foto) }}">
</p>	
</div>
