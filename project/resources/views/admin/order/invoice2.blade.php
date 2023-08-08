@extends('layouts.admin')

@section('content')
<div class="content-area">
    <div class="mr-breadcrumb">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">{{ __('Order Invoice') }} <a class="add-btn" href="javascript:history.back();"><i
                            class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                    </li>
                    <li>
                        <a href="javascript:;">{{ __('Orders') }}</a>
                    </li>
                    <li>
                        <a href="javascript:;">{{ __('Invoice') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="order-table-wrap">
        <div class="invoice-wrap">
            <div class="invoice__title">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="invoice__logo text-left">
                           <!-- <img src="{{ asset('assets/images/'.$gs->invoice_logo) }}" alt="woo commerce logo"> -->
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a class="btn  add-newProduct-btn print" href="{{route('admin-order-print2',$order->id)}}"
                        target="_blank"><i class="fa fa-print"></i> {{ __('Print Invoice') }}</a>
                    </div>
                </div>
            </div>
            <br> 
            <div class="row invoice__metaInfo">
           @if($order->dp == 0)
                <div class="col-lg-6">
                        <div class="invoice__shipping"> 

                            @if($order->dp == 0)
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
                            @else
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
 
                            @endif

                        </div>
                </div>

            @endif
 
            </div> 
             
        </div>
    </div>
</div>
<!-- Main Content Area End -->
</div>
</div>
</div>

@endsection