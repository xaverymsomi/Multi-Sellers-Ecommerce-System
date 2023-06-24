<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: #024e5a;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: #024e5a; font-size: 26px;"><strong>OBC-MULTISHOP</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               Online-Business-Center Head Office
               Email:admin@gmail.com <br>
               Mob: 0699826006 <br>
               Morogoro,Mzumbe 01 :#306 Changarawe <br>
              
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;"></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{ $order->name }} <br>
           <strong>Email:</strong> {{ $order->email }} <br>
           <strong>Phone:</strong> {{ $order->phone }} <br>
            
           <strong>Address:</strong> {{ $order->address }} <br>
           <strong>Post Code:</strong> {{ $order->post_code }}
         </p>
        </td>
        <td>
            @php
                $reg = $order->region->division_name;
                $dist = $order->district->district_name;
                $provi = $order->state->state_name;
            @endphp
          <p class="font">
            <h3><span style="color: #024e5a;">Invoice:</span> #{{ $order->invoice_number }}</h3>
            Order Date: {{ $order->order_date }} / {{ $reg }} / {{ $dist }} / {{ $provi }} <br>
             Delivery Date: {{ $order->delivered_date }} <br>
            Payment Type : {{ $order->payment_method }} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Products</h3>


  <table width="100%">
    <thead style="background-color: #024e5a; color:#FFFFFF;">
      <tr class="font">
        <th>Image</th>
        <th>Product Name</th>
        <th>Size</th>
        <th>Color</th>
        <th>Code</th>
        <th>Quantity</th>
        <th>Seller</th>
        <th>Total </th>
      </tr>
    </thead>
    <tbody>

     @foreach ($orderItems as $item)
         
     <tr class="font">
        <td align="center">
            <img src="{{ public_path($item->product->product_image) }}" height="50px;" width="50px;" alt="">
        </td>
        <td align="center">{{ $item->product->product_name }}</td>
        @if ($item->size == NULL)
        <td align="center">
            No size
        </td>
        @else 
        <td align="center">{{ $item->size }}</td>
        @endif
        @if ($item->color == NULL)
        <td align="center">No color</td>
        @else
        <td align="center">{{ $item->color }}</td>
        @endif
        <td align="center">{{ $item->product->product_code }}</td>
        <td align="center">{{ $item->quantity }}</td>
        @if ($item->seller_id == NULL)
        <td align="center">Owner</td>
        @else
        <td align="center">{{ $item->product->seller->name }}</td>
        @endif
        <td align="center">{{ $item->price * $item->quantity  }}/=</td>
      </tr>

     @endforeach
      
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: #024e5a;">Subtotal:</span>{{ $order->amount }}/=</h2>
            <h2><span style="color: #024e5a;">Total:</span>{{ $order->amount }}/=</h2>
            {{-- <h2><span style="color: #024e5a;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Thanks For Buying Products..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5 style="color: #024e5a">Authority Signature:</h5>
    </div>
</body>
</html>