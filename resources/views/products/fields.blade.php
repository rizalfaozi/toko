<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama Produk:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


@if(Request::segment(3) == "edit")

<!-- Brand Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand_id', 'Brand:') !!}
    <select class="form-control" id="brand_id" name="brand_id">
        <option value="0">Pilih Brand</option>

         @foreach($brands as $row)
           @if(isset($product) ? $product->brand_id == $row->id : true)
            <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
           @else
             <option value="{{ $row->id }}">{{ $row->name }}</option>

           @endif
         @endforeach
       
    
    </select>
</div>

@else

<div class="form-group col-sm-6">
    {!! Form::label('brand_id', 'Brand:') !!}
    <select class="form-control" id="brand_id" name="brand_id">
        <option value="0">Pilih Brand</option>

         @foreach($brands as $row)
         
             <option value="{{ $row->id }}">{{ $row->name }}</option>

          
         @endforeach
       
    
    </select>
</div>

@endif

<!-- Brand Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_brand_id', 'Sub Brand:') !!}
    <select id="sub_brand_id" class="form-control" name="sub_brand_id">
        

    
    </select>
</div>


<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Harga:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
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
    <input type="radio" name="status" value="1"> Publish<br>
    <input type="radio" name="status" value="0"> Unpublish<br>
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
  
       let brand_id = $('#brand_id').val(); 
       getsubselected(id,brand_id); 
    }

        // let selected =""; 
        // selected  += '<option value="0">Pilih Sub Brand</option>';
        // $('#sub_brand_id').attr('disabled','disabled').html(selected);  
       
    

   

   $('#brand_id').on('change', function() {
     getsub(this.value,action);
    });

 }); 

 function getsub(brand_id,action){
    
if(action !="edit")
{

     $.ajax({
      type:"GET",  
        url:"../subkategori/"+brand_id,
       
        dataType: "json",
        cache: false,
        success: function(respons){
         let selected ="";   
         let jml = respons.length;
            $('#sub_brand_id').prop("disabled", false);
          selected  += '<option value="0">Pilih Sub Brand</option>';
          for(let a = 0; a < jml; a++)
          {
      
            
            selected  += '<option value="'+ respons[a]['id'] +'">'+ respons[a]['name'] +'</option>';
         }   

         $('#sub_brand_id').html(selected);
              
       },
        error: function (respons) {
          alert("Gagal load data");
            
          }
      });
}else{

     $.ajax({
      type:"GET",  
        url:"../../subkategori/"+brand_id,
       
        dataType: "json",
        cache: false,
        success: function(respons){
         let selected ="";   
         let jml = respons.length;
            $('#sub_brand_id').prop("disabled", false);
          selected  += '<option value="0">Pilih Sub Brand</option>';
         for(i=0; i<jml; i++)
         {
            
            selected  += '<option value="'+ respons[i]['id'] +'">'+ respons[i]['name'] +'</option>';
         }   

         $('#sub_brand_id').html(selected);
              
       },
        error: function (respons) {
          alert("Gagal load data");
            
          }
      });


 }  
}


function getsubselected(produkid,brand_id){

   $.ajax({
      type:"GET",  
        url:"../../subkategoriselect/"+ produkid +"/"+brand_id,
       
        dataType: "json",
        cache: false,
        success: function(respons){
         let selected ="";   
         let jml = respons['data'].length;
            $('#sub_brand_id').prop("disabled", false);
          selected  += '<option value="0">Pilih Sub Brand</option>';
         for(i=0; i<jml; i++)
         {

           if(respons['produk'] == respons['data'][i]['id'])
           {

             selected  += '<option value="'+ respons['data'][i]['id'] +'" selected="selected">'+ respons['data'][i]['name'] +'</option>';
           }else{
             selected  += '<option value="'+ respons['data'][i]['id'] +'" >'+ respons['data'][i]['name'] +'</option>';
           }
            
         }   

         $('#sub_brand_id').html(selected);
              
       },
        error: function (respons) {
          alert("Gagal load data");
            
          }
      });

}
</script>