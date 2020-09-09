<!doctype html>
<script type="text/javascript">
      window.print();
</script>
<html>
<head>
    <meta charset="utf-8">
    <title>Report Lowo Ireng</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0" border='0'>
            <tr class="top">
                <td colspan="6">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                               <!--  Report #: 123<br> -->
                               <!--  Created: January 1, 2015<br>
                                Due: February 1, 2015 -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            
          
            
            <tr class="heading">
                 <td>Kode Pesanan</td>
        <td>Produk</td>
        <td>Jumlah</td>
        <td>Harga</td>
        <td>Total</td>
        <td>Status</td>
            </tr>
            
           @foreach($reports as $row)
             <?php 
             $products = DB::table('products')->where('id',$row->product_id)->first();
             $order = DB::table('stock_orders')->where('id',$products->product_id)->first();
             $total = (int) $row->price * (int) $row->qty;
              ?>
            <tr class="item">
                <td>
                   {{ $row->id }}
                </td>
                 <td>
                   {{ $order->name }}
                </td>
                <td>
                   {{ $row->qty }}
                </td>
                <td>
                  Rp {{ number_format($row->price,2,',','.') }}
                </td>
                <td>
                  Rp {{ number_format($total,2,',','.') }}
                </td>

                 <td>
                   @if($row->status ==0) Pending @else Terkirim @endif
                </td>
            </tr>
           @endforeach 
            
          
            
            <tr class="total">
                <td></td>
                 <td></td>
                  <td></td>
                   <td></td>
                    <td></td>
                <td>
                   Total: Rp {{ number_format($total,2,',','.') }}
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
