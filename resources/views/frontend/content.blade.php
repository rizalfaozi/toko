<div id="content">
@include('frontend.leftsidebar')

<div id="content-center">
<div class="cleaner_h20"></div>
@if(Request::segment(1) =="about")
	@include('frontend.profile')
@elseif(Request::segment(1) =="info")
	@include('frontend.info')
@elseif(Request::segment(1) =="contact")
	@include('frontend.contact')
@elseif(Request::segment(1) =="detail")	
    @include('frontend.detailproduct')
@elseif(Request::segment(1) =="order")
	@include('frontend.order')
@elseif(Request::segment(1) =="detberita")
	@include('frontend.detberita') 
@elseif(Request::segment(1) =="konfirmasi")
	@include('frontend.konfirmasi')     
@elseif(Request::segment(1) =="search")
	@include('frontend.searchproduct')
@else
	@include('frontend.contentproduct')
@endif
</div>

@include('frontend.rightsidebar')
</div>
