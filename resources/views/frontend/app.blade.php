<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
<meta name="author" content="" /> 
<meta name="keywords" content=""> 
<meta name="description" content=""> 
  <meta name="csrf-token" content="{{ Session::token() }}"> 
<title>Lowo Ireng | Costum Modification</title>
<link href="{{ asset('images/icone.png') }}" rel="shortcut icon" />


<link href="{{ asset('css/frontend/style.css?v=4') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/frontend/ddsmoothmenu.css?v=1') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/frontend/jquery.simpledialog.0.1.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/jquery.fancybox-1.3.4.css') }}" media="screen" />

<script type="text/javascript" src="{{ asset('js/frontend/jquery-1.4.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/frontend/jquery.jcarousel.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/frontend/vtip.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/frontend/jquery.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/frontend/skrip.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/frontend/flexdropdown.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/frontend/jquery.fancybox-1.3.4.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/jquery.treeview.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/demo.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/jquery.simpledialog.0.1.js') }}"></script>

<script type="text/javascript">
		$(document).ready(function() {
			$("a[rel=example_group]").fancybox({
			
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
		});
</script>
<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

$(document).ready( function()
	{	
		$('#lofslidecontent45').lofJSidernews( { interval:4000,
												 easing:'easeInOutQuad',
												duration:1000,
												auto:true } );						
	});
	function slidePordukBaru()
	{
	    akhir = $('ul#produkbaru li:last').hide().remove();
	    $('ul#produkbaru').prepend(akhir);
        $('ul#produkbaru li:first').slideDown("slow");
	}
	function slidePordukLaris()
	{
	    akhir = $('ul#produklaris li:last').hide().remove();
	    $('ul#produklaris').prepend(akhir);
        $('ul#produklaris li:first').slideDown("slow");
	}
	setInterval(slidePordukBaru, 5000);
	setInterval(slidePordukLaris, 7000);
	
	
</script>

</head>

<body >
<div class="cleaner_h5"></div>
@include('frontend.header')
@include('frontend.menu')
@include('frontend.banner')


<div class="cleaner_h0"></div>
@include('frontend.content')
<div class="cleaner_h0"></div>

@include('frontend.footer')
</body>
</html>
