
<div id="banner">

<div id="lofslidecontent45" class="lof-slidecontent"> 
<div  class="preload"><div></div></div> 
 <!-- MAIN CONTENT --> 
<div class="lof-main-outer"> 
  	<ul class="lof-main-wapper"> 
        @foreach($slider as $row) 
			<li><img src="{{ url($row->foto) }}" /></li>
			
	    @endforeach
	
	</ul> 
    </div>          
    <div class="lof-navigator-outer"> 
	
  	<ul class="lof-navigator"> 
    @foreach($slider as $row)    
	<li> 
        <div><img src="{{ url($row->foto_crop) }}" height="20"/>
        <h3>{{ substr($row->name, 0, 20) }} ...</h3> 
		<span class=tanggal>{{  substr($row->description, 0, 80)  }} ... <a href="{{ url('detberita/'.$row->id) }}">Detail</a></span> 
        </div> 
    </li>
	@endforeach		
		</ul> 
    </div> 
</div> 



</div>


<div id="menu-bawah">
<div id="smoothmenu1" class="ddsmoothmenu">
<ul>
    @foreach($kategori as $row)
    <li>
        <a href="">{{ $row->name }}</a>
        <ul>
              @foreach(DB::table('brands')->where(['setting'=>'submenu','menu_id'=>$row->id])->get() as $rowi)
            <li>
               <a href="">{{ $rowi->name }}</a>  
            </li>
              @endforeach  
         </ul>       
    </li> 
    @endforeach   
</ul>
</div>
</div>
</div>

<script type="text/javascript">
function mycarousel_initCallback(carousel)
{ 
carousel.buttonNext.bind('click', function() {
carousel.startAuto(0);
});
carousel.buttonPrev.bind('click', function() {
carousel.startAuto(0);
});
carousel.clip.hover(function() {
carousel.stopAuto();
}, function() {
carousel.startAuto();
});
};

jQuery(document).ready(function() {
jQuery('#hs').jcarousel({
visible: 7,
scroll: 1,
wrap: 'circular',
auto: 2,
animation: 1000,
initCallback: mycarousel_initCallback
 });
});
</script>
<div id="slider-banner">
    <div id="wrap"> 

        <ul id="hs" class="jcarousel-skin-tango-hs"> 
   @foreach($productslide as $slider)  

   <?php $name = DB::table('stock_orders')->where('id',$slider->product_id)->first()->name; ?>   
<li>
  <a href="{{ url('detail/'.$slider->id) }}" class="vtip" title="{{ $name }} - Harga  Rp {!!  number_format($slider->price,2,',','.')  !!}">
    <img src="{{ url($slider->photo) }}" alt="{{ $name }}">
    <br />{{ $name }}<br>Harga Rp {!!  number_format($slider->price,2,',','.');  !!}
  </a>
  </li>

@endforeach
              </ul> 
    </div> 
</div>