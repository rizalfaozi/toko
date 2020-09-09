
@if(Request::segment(3) != "edit")

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama Produk:') !!}
    <select class="form-control" id="product_id" name="product_id">
        <option value="0">Pilih Produk</option>

         @foreach($stock_order as $row)
           <?php $brand_id = DB::table('brands')->where(['id'=>$row->brand_id])->first()->name;?>
           <?php $sub_brand_id = DB::table('brands')->where(['id'=>$row->sub_brand_id])->first()->name;?>
             <option value="{{ $row->id }}">{{ $row->name }} - {{ $brand_id }} - {{ $sub_brand_id }}</option>
         @endforeach
       
    
    </select>
</div>

<div class="form-group col-sm-6">
  
  {!! Form::label('brand_id', 'Brand:') !!}
   <input id="brand_id" type="hidden" name="brand_id" >
   <input id="brand_name" class="form-control" name="brand_name" disabled>

</div>

<!-- Brand Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_brand_id', 'Sub Brand:') !!}
     <input id="sub_brand_id" type="hidden" name="sub_brand_id">
    <input id="sub_brand_name" class="form-control" name="sub_brand_name" disabled>
</div>



@else

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama Produk:') !!}
    <select class="form-control" id="product_id" name="product_id">
        <option value="0">Pilih Produk</option>

         @foreach($stock_order as $row)
          <?php $brand_id = DB::table('brands')->where(['id'=>$row->brand_id])->first()->name;?>
           <?php $sub_brand_id = DB::table('brands')->where(['id'=>$row->sub_brand_id])->first()->name;?>
             

            @if(isset($product) ? $product->product_id == $row->id : true)
            <option value="{{ $row->id }}" selected>{{ $row->name }} - {{ $brand_id }} - {{ $sub_brand_id }}</option>
           @else
             <option value="{{ $row->id }}">{{ $row->name }} - {{ $brand_id }} - {{ $sub_brand_id }}</option>

           @endif
           
         @endforeach
       
    
    </select>
</div>


<!-- Brand Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand_id', 'Brand:') !!}
    <input id="brand_id" type="hidden" name="brand_id">
    <input class="form-control" id="brand_name" name="brand_name" disabled>
</div>

<!-- Brand Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_brand_id', 'Sub Brand:') !!}
     <input id="sub_brand_id" type="hidden" name="sub_brand_id">
    <input id="sub_brand_name" class="form-control" name="sub_brand_name" disabled>
</div>



@endif



<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Harga:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Motif Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stok', 'Stok:') !!}
    <input type="text" class="form-control" name="stock_id" id="stock_id" disabled="disabled">
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Deskripsi:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('noted', 'Noted:') !!}
    {!! Form::textarea('noted', null, ['class' => 'form-control']) !!}
</div>

<!-- Motif Field -->
<div class="form-group col-sm-6">
    {!! Form::label('theme', 'Motif:') !!}
    {!! Form::text('theme', null, ['class' => 'form-control']) !!}
</div>

<!-- Warna Field -->
<div class="form-group col-sm-6">
    {!! Form::label('warna', 'Warna:') !!}
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>

<!-- Ephoto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}
</div>

@if(Request::segment(3) == "edit")

@if(isset($product) ? $product->photo != "" : true )
<div class="form-group col-sm-12">
<img src="{!! url($product->photo) !!}" width="140" height="115">
</div>
@endif


@endif


@if(Request::segment(3) == "edit")
<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', '* Status:') !!}<br>
     {{ Form::radio('status', 1, isset($products) ? $products->status == 1 : true) }} Publish<br>
    {{ Form::radio('status', 0, isset($products) ? $products->status == 0 : false) }} Unpublish
</div>

@else

<div class="form-group col-sm-6">
    {!! Form::label('status', '* Status:') !!}<br>
    <input type="radio" name="status" id="status" value="1"> Publish<br>
    <input type="radio" name="status" id="status" value="0"> Unpublish
</div>

@endif
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('product.index') !!}" class="btn btn-default">Batal</a>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
    var url = $(location).attr('href').split("/").splice(0, 6).join("/");
    var segments = url.split( '/' );
    var id = segments[4];
    var action = segments[5];
    
    if(action =="edit")
    {
       let product_id = $('#product_id').val();   
       getbrand(product_id,action);
      //console.log(product_id);
       
       //getsubselected(id,brand_id); 
       // let sub_brand_id = $('#sub_brand_id').val();
       // console.log(sub_brand_id);
        //getstok(sub_brand_id,action);
    }

        // let selected =""; 
        // selected  += '<option value="0">Pilih Sub Brand</option>';
        // $('#sub_brand_id').attr('disabled','disabled').html(selected);  
       
    
     $('#product_id').on('change', function() {
        getbrand(this.value,action);
         //console.log(this.value);
      });
   

    // $('#brand_id').on('change', function() {
    //  getsub(this.value,action);
    // });

    // $('#sub_brand_id').on('change', function() {
    //     getstok(this.value,action);
    // });

 }); 

function getstok(stock_id,action){

if(action !="edit")
{
    var url = "../product/stock/"+stock_id;
}else{
    var url = "../stock/"+stock_id;
}

    $.ajax({
      type:"GET",  
        url:url,
       
        dataType: "json",
        cache: false,
        success: function(respons){
        
         $('#stock_id').val(respons);
              
       },
        error: function (respons) {
          alert("Gagal load data");
            
          }
    });
}


function getbrand(brand_id,action){

if(action !="edit")
{
   var url = "../product/brands/"+brand_id;
}else{
  var url = "../brands/"+brand_id;
}

  $.ajax({
      type:"GET",  
        url: url,
       
        dataType: "json",
        cache: false,
        success: function(respons){
            $('#brand_id').val(respons['id']);
            $('#brand_name').val(respons['name']);  
            getsub(brand_id,action);    
       },
        error: function (respons) {
          alert("Gagal load data");
            
          }
      });


}





function getsub(brand_id,action){
    
if(action !="edit")
{
   var url = "../product/subkategori/"+brand_id; 
}else{
   var url = "../subkategori/"+brand_id; 
}  

  $.ajax({
      type:"GET",  
        url:url,
        dataType: "json",
        cache: false,
        success: function(respons){
         
            $('#sub_brand_id').val(respons['id']);
            $('#sub_brand_name').val(respons['name']);
             getstok(respons['id'],action);  
       },
        error: function (respons) {
          alert("Gagal load data");
            
          }
      });
}


</script>