<!-- Name Field -->
<div style="float:left;width:100%;">
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama Barang:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
</div>
<!-- Stock Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('stock_id', 'Bahan:') !!}<br>


 @foreach($stock as $row)   
   <div style="margin: 13px 0px;">


    <input class="pull-left" type="hidden" name="kode{{ $row->id }}" value="{{ $row->id }}">
    <div class="pull-left" style="width: 70px;padding: 0px 7px;"> {{ $row->name }} </div>  
    <input class="pull-left" style="padding: 0px 0px;" type="number" name="size{{ $row->id }}"> <br>
   </div> 
  

@endforeach
</div>

<div style="float:left;width:100%;">
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

</div>


<!-- Brand Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_brand_id', 'Sub Brand:') !!}
    <select id="sub_brand_id" class="form-control" name="sub_brand_id">
        

    
    </select>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mixes.index') !!}" class="btn btn-default">Batal</a>
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
  var url = "../mixes/subkategori/"+brand_id;  
}else{
  var url = "../subkategori/"+brand_id;  
  
}  

$.ajax({
      type:"GET",  
        url: url,
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