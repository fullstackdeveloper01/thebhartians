<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{$seo->meta_keys}}">
        <meta name="author" content="GeniusOcean">

        <title>{{$gs->title}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('assets/print/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/print/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/print/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/print/css/style.css')}}">
  <link href="{{asset('assets/print/css/print.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}"> 
  <style type="text/css">
@page { size: auto;  margin: 0mm; }
@page {
  size: A4;
  margin: 0;
}
@media print {
  html, body {
    width: 210mm;
    height: 287mm;
  }

html {

}
::-webkit-scrollbar {
    width: 0px;  /* remove scrollbar space */
    background: transparent;  /* optional: just make scrollbar invisible */
}
  </style>
</head>
<body onload="window.print();">
    <div class="invoice-wrap"> 
            <div class="invoice__metaInfo" style="margin-top:0px;">
                @if($order->dp == 0)
                <div class="col-lg-6">
                        <div class="invoice__orderDetails" style="margin-top:5px;">
                                <h4><strong>{{ $order->shipping_name == null ? $order->customer_name : $order->shipping_name}}</strong></h4> 
                                <span><strong>{{ __('Address') }} :</strong> 
                                {{ $order->shipping_address == null ? $order->customer_address : $order->shipping_address }},<br>
                                    {{ $order->shipping_city == null ? $order->customer_city : $order->shipping_city }}
                                {{ $order->shipping_zip == null ? $order->customer_zip : $order->shipping_zip }},<br>
                                {{ $order->shipping_country == null ? $order->customer_country : $order->shipping_country }} 
                                </span><br>
                                <span><strong>{{  __('Mobile No.')}} :</strong> {{ $order->shipping_phone == null ? $order->customer_phone : $order->shipping_phone }}</span><br> 
                                <span><strong>{{  __('Order ID')}} :</strong> {{ $order->order_number }}</span><br>
                                <span><strong>{{ __('Invoice No.') }} :</strong> {{ sprintf("%'.08d", $order->id) }}</span><br>
                                <span><strong>{{ __('Order Date') }} :</strong> {{ date('d-M-Y H:i',strtotime($order->created_at)) }}</span><br>
                        </div>
                </div>
                @else
                <div class="col-lg-6" style="width:50%;">
                        <div class="invoice__orderDetails" style="margin-top:5px;">
                            <h4><strong>{{ $order->customer_name }}</strong></h4> 
                            <span><strong>{{ __('Address') }} :</strong>  
                                {{ $order->customer_address }},<br>
                                    {{ $order->customer_city }}
                                {{ $order->customer_zip }},<br>
                                {{ $order->customer_country }} 
                            </span><br>
                            <span><strong>{{  __('Mobile No.')}} :</strong> {{ $order->customer_phone }}</span><br> 
                            <span><strong>{{  __('Order ID')}} :</strong> {{ $order->order_number }}</span><br>
                            <span><strong>{{ __('Invoice No.') }} :</strong> {{ sprintf("%'.08d", $order->id) }}</span><br>
                            <span><strong>{{ __('Order Date') }} :</strong> {{ date('d-M-Y H:i',strtotime($order->created_at)) }}</span><br>
                        </div>
                </div>
                @endif
            </div>
 
        </div>
<!-- ./wrapper -->

<script type="text/javascript">
    (function($) {
		"use strict";

setTimeout(function () {
        window.close();
      }, 500);

    })(jQuery);

</script>

</body>
</html>
