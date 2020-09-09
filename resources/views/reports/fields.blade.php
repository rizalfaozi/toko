@if(Request::segment(3) != "edit")

<!-- Produk Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Produk:') !!}
    <select name="product_id" class="form-control" id="product_id">
        <option value="0">Pilih Produk</option>
       @if(!empty($product))
        @foreach($product as $row)
          <?php 
            $order = DB::table('stock_orders')->where('id',$row->product_id)->first();
            $brand = DB::table('brands')->where('id',$order->brand_id)->first();
            $sub_brand = DB::table('brands')->where('id',$order->sub_brand_id)->first();
         
          ?>
             <option value="{{ $row->id }}">{{ $order->name }} - {{ $brand->name }} - {{ $sub_brand->name  }} </option>
          
        @endforeach
       @endif 
    </select>
</div>

@else

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama Produk:') !!}
    <select class="form-control" id="product_id" name="product_id">
        <option value="0">Pilih Produk</option>
             

         @foreach($product as $row)
          <?php $order = DB::table('stock_orders')->where('id',$row->product_id)->first();
            $brand_id = DB::table('brands')->where(['id'=>$row->brand_id])->first()->name;
            $sub_brand_id = DB::table('brands')->where(['id'=>$row->sub_brand_id])->first()->name;?>
             

            @if(isset($product) ? $report->product_id == $row->id : true)
            <option value="{{ $row->id }}" selected>{{ $order->name }} - {{ $brand_id }} - {{ $sub_brand_id }}</option>
           @else
             <option value="{{ $row->id }}">{{ $order->name }} - {{ $brand_id }} - {{ $sub_brand_id }}</option>

           @endif
            
           
           
         @endforeach
       
    
    </select>
</div>

@endif

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', 'Jumlah:') !!}
    {!! Form::number('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Harga:') !!}
    <input type="text" name="price_name" id="price_name" class="form-control" disabled>
    <input type="hidden" name="price" id="price" class="form-control" >
</div>

<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    <input type="text" name="total" id="total" class="form-control" disabled>
    
</div>

<div class="form-group col-sm-6">
    {!! Form::label('total', 'Stock:') !!}
    <input type="text" name="stock" id="stock" class="form-control" disabled>
    
</div>



<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}<br>
     {{ Form::radio('status', 0, isset($admins) ? $admins->status == 0 : true) }} Proses<br>
    {{ Form::radio('status', 1, isset($admins) ? $admins->status == 1 : false) }} Terjual<br>
    {{ Form::radio('status', 2, isset($admins) ? $admins->status == 2 : false) }} Retur
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('reports.index') !!}" class="btn btn-default">Batal</a>
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
       getPrice(product_id,action);
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
        getPrice(this.value,action);
         //console.log(this.value);
      });
   
      $('#qty').on('change', function() {
          let price = $('#price').val();
          let qty = this.value;
          let total = price*qty;
          $('#total').val(total);
          
      });
    

 }); 

function getPrice(product_id,action){

if(action !="edit")
{
    var url = "../reports/price/"+product_id;
}else{
    var url = "../price/"+product_id;
}

    $.ajax({
      type:"GET",  
        url:url,
        dataType: "json",
        cache: false,
        success: function(respons){
        
          $('#qty').val(1);
          $('#price').val(respons['price']);   
          $('#price_name').val(respons['price']);

          $('#stock').val(respons['stock']); 

          let total = respons['price']*1;
          $('#total').val(total);
         


       },
        error: function (respons) {
          alert("Gagal load data");
            
          }
    });
}



</script>