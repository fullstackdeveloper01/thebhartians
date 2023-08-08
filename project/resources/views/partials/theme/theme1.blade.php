
@extends('layouts.front')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/front/css/category/classic.css') }}">
@endsection
@section('content')

@include('partials.global.subscription-popup')

<header class="ecommerce-header nav-on-banner">
    {{-- Top header currency and Language --}}
    @include('partials.global.top-header')
    {{-- Top header currency and Language  end--}}
    @include('partials.global.responsive-menubar')

</header>
@if($ps->slider == 1)
    <div class="position-relative ss-home-section" >
        <span class="nextBtn"></span>
        <span class="prevBtn"></span>
        <section class="home-slider owl-theme owl-carousel">
            @foreach($sliders as $data)
            <div class="banner-slide-item" style="background: url('{{asset('assets/images/sliders/'.$data->photo)}}') no-repeat center center / cover ;">
                <div class="container">
                    <div class="banner-wrapper-item text-{{ $data->position }}">
                        <div class="banner-content text-dark ">
                            <h5 class="subtitle text-dark slide-h5">{{$data->subtitle_text}}</h5>

                            <h2 class="title text-dark slide-h5">{{$data->title_text}}</h2>

                            <p class="slide-h5">{{$data->details_text}}</p>

                            <!-- <a href="{{$data->link}}" class="cmn--btn ">{{ __('SHOP NOW') }}</a> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
    </div> 
    <div class="position-relative mobile-home-section">
        <span class="nextBtn"></span>
        <span class="prevBtn"></span>
        <section class="home-slider-mobile owl-theme owl-carousel">
            <div class="banner-slide-item" style="background: url('/assets/images/featured/mangalsutra.png') no-repeat center center / cover ;">
                <div class="container">
                    <div class="banner-wrapper-item text-center">
                        <div class="banner-content text-dark ">
                            <!-- <h5 class="subtitle text-dark slide-h5">subtitle_text</h5> -->

                            <!-- <h2 class="title text-dark slide-h5">title_text</h2> -->

                            <!-- <p class="slide-h5">details_text</p> -->

                            <!-- <a href="{{$data->link}}" class="cmn--btn ">{{ __('SHOP NOW') }}</a> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner-slide-item" style="background: url('/assets/images/featured/ear-rings.png') no-repeat center center / cover ;">
                <div class="container">
                    <div class="banner-wrapper-item text-center">
                        <div class="banner-content text-dark ">
                            <!-- <h5 class="subtitle text-dark slide-h5">subtitle_text</h5> -->

                            <!-- <h2 class="title text-dark slide-h5">title_text</h2> -->

                            <!-- <p class="slide-h5">details_text</p> -->

                            <!-- <a href="{{$data->link}}" class="cmn--btn ">{{ __('SHOP NOW') }}</a> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner-slide-item" style="background: url('/assets/images/featured/necklace.png') no-repeat center center / cover ;">
                <div class="container">
                    <div class="banner-wrapper-item text-center">
                        <div class="banner-content text-dark ">
                            <!-- <h5 class="subtitle text-dark slide-h5">subtitle_text</h5> -->

                            <!-- <h2 class="title text-dark slide-h5">title_text</h2> -->

                            <!-- <p class="slide-h5">details_text</p> -->

                            <!-- <a href="{{$data->link}}" class="cmn--btn ">{{ __('SHOP NOW') }}</a> -->
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="banner-slide-item" style="background: url('/assets/images/featured/ear-rings.png') no-repeat center center / cover ;">
                <div class="container">
                    <div class="banner-wrapper-item text-center">
                        <div class="banner-content text-dark ">
                            <!-- <h5 class="subtitle text-dark slide-h5">subtitle_text</h5> -->

                            <!-- <h2 class="title text-dark slide-h5">title_text</h2> -->

                            <!-- <p class="slide-h5">details_text</p> -->

                            <!-- <a href="{{$data->link}}" class="cmn--btn ">{{ __('SHOP NOW') }}</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endif
@if($ps->arrival_section == 1)
        <!--==================== Fashion Banner Section Start ====================-->
        <!--<div class="full-row">
            <div class="container">
                <div class="fashion-banner-wrapper">
                @foreach ($arrivals as $key=>$arrival)

                <div class="row row-cols-lg-2 row-cols-1 justify-content-between">
                    <div class="col">
                        <div class="banner-wrapper hover-img-zoom custom-class-121">
                            <div class="banner-image overflow-hidden transation">
                                <a href="{{ route('front.category') }}"><img class="lazy" data-src="{{ $arrival->photo ?  asset('assets/images/arrival/'.$arrival->photo): "" }}" alt="Banner Image"></a>
                            </div>
                            <div class="banner-content position-absolute">
                                <div class="product-tag" style="font-size: 15px;text-transform: uppercase; color: var(--theme-secondary-color); letter-spacing: 3px;"><span>{{ __('Men Collection') }}</span></div>
                                <h2 style="margin: 10px 0 20px;"><a href="{{ route('front.category') }}" class="text-dark mb-10 d-block">{{ __('New Autumn Arrival 2023') }}</a></h2>
                                <a href="{{ route('front.category') }}" class="btn-link-left-line">{{ __('Shop Now') }}</a>
                            </div>
                        </div>

                    </div>
                    <div class="col hide1">
                        <div class="products-avilable-number fact-counter">
                            @if($loop->first)
                            <div class="mb-30 count wow fadeIn" data-wow-duration="300ms">
                                <div class="counting d-table">
                                    <div>
                                        <span class="count-num" data-speed="3000" data-stop="{{ $products->count() }}">0</span>
                                        <span>+</span>
                                        <span class="title">@lang('Products For You')</span>
                                    </div>
                                </div>
                            </div>
                            @elseif($loop->last)
                            <div class="mb-30 count wow fadeIn counting-bottom" data-wow-duration="300ms">
                                <div class="counting d-table">
                                    <div>
                                        <span class="count-num" data-speed="3000" data-stop="{{ $ratings->count()>0 ? $ratings->count() : '2156' }}">0</span>
                                        <span>+</span>
                                        <span class="title">@lang('Feedback Given By Customer')</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>



                @endforeach
            </div>
            </div>
        </div>-->
        <!--==================== Fashion Banner Section End ====================-->
@endif

<!--==================== Top Products Section Start ====================-->
@if($ps->best_sellers==1)
<div class="full-row">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <span class="text-secondary pb-2 d-table tagline mx-auto text-uppercase text-center">{{ __('Top Products') }}</span>
                <h2 class="main-title mb-4 text-center text-secondary">{{ __('Best Selling Products') }}</h2>

            </div>
        </div>

        <div class="row">
            <div class="col-12">

                 <div class="products product-style-1 owl-mx-15">
                    <div class="four-carousel owl-carousel dot-disable nav-arrow-middle-show e-title-general e-title-hover-primary e-image-bg-light  e-info-center e-title-general e-title-hover-primary e-image-bg-light e-hover-image-zoom e-info-center">
                    @foreach($best_products as $prod)
                        <div class="item">
                            @include('partials.product.home-product')
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!--==================== Top Products Section End ====================-->

@php
   $activeCats = array(); 
   $current_key = 0;
@endphp

<!-- Slider Loop -->
@if($cat_products)

    @foreach($cat_products as $key => $cat_data) 
        @if(!empty($cat_data['products']))
        
        @php
            $current_key = $key;
            $prods = $cat_data['products']; 
            $sliderClassName = 'ajaxContent-'.$cat_data['id'];
            $activeCats[] = '.'.$sliderClassName;
        @endphp
        <div class="full-row bg-white ss-product-section">
            <div class="container-fluid">
                <div class="row offer-product align-items-center">
                    <div class="col-xl-12 col-lg-12 text-center">
                        <h3 class="down-line-secondary text-dark text-uppercase mb-30 pos-rel">
                            <span>{{$cat_data['name']}}</span>
                        </h3>
                    </div> 
                </div>
            </div>
            <div class="container-fluid">
                <span class="nextBtn"></span>
                <span class="prevBtn"></span>
                <div class="showing-products pt-30 border-2 border-light" id="ajaxContent-{{$cat_data['id']}}">
                    @includeIf('partials.product.product-slider-view')
                </div>
            </div>
        </div>
        @php
        break;
        @endphp
        @endif
    @endforeach
    @php
        unset($cat_products[$current_key])
    @endphp

@endif
<!-- SLider Loop -->

<div class="featured-section full-row">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-12 no-gutter">
                <div class="featured-box">
                    <div class="image-wrap">
                        <img src="{{url('/assets/images/featured--/mangalsutra.png')}}" class="img-fluid w-100 h-100">
                    </div>
                    <div class="btn-shop">
                        <a href="{{url('/category/mangal-sutra')}}" class="btn btn-shop">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 no-gutter">
                <div class="featured-box">
                    <div class="image-wrap">
                        <img src="{{url('/assets/images/featured--/ear-rings.png')}}" class="img-fluid w-100 h-100">
                    </div>
                    <div class="btn-shop">
                    <a href="{{url('/category/earring-collection')}}" class="btn btn-shop">Shop Now</a>
                    </div>
                </div>
            </div> 
            <div class="col-xl-6 col-lg-6 col-sm-12 no-gutter">
                <div class="featured-box">
                    <div class="image-wrap">
                        <img src="{{url('/assets/images/featured--/necklace.png')}}" class="img-fluid w-100 h-100">
                    </div>
                    <div class="btn-shop">
                    <a href="{{url('/category/NECKLACES')}}" class="btn btn-shop">Shop Now</a>
                    </div>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 no-gutter">
                <div class="featured-box">
                    <div class="image-wrap">
                        <img src="{{url('/assets/images/featured--/chinchpeti.png')}}" class="img-fluid w-100 h-100">
                    </div>
                    <div class="btn-shop">
                    <a href="{{url('/category')}}" class="btn btn-shop">Shop Now</a>
                    </div>
                </div>
            </div> 
            <div class="col-xl-3 col-lg-3 col-sm-12 no-gutter">
                <div class="featured-box">
                    <div class="image-wrap">
                        <img src="{{url('/assets/images/featured--/thushi.png')}}" class="img-fluid w-100 h-100">
                    </div>
                    <div class="btn-shop">
                        <a href="{{url('/category/thushi-colloection')}}" class="btn btn-shop">Shop Now</a>
                    </div>
                </div>
            </div> 
            <div class="col-xl-3 col-lg-3 col-sm-12 no-gutter">
                <div class="featured-box">
                    <div class="image-wrap">
                        <img src="{{url('/assets/images/featured--/temple-jwellary.png')}}" class="img-fluid w-100 h-100">
                    </div>
                    <div class="btn-shop">
                        <a href="{{url('/category')}}" class="btn btn-shop">Shop Now</a>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>


<!-- SLider Loop -->
@if($cat_products)

    @foreach($cat_products as $key => $cat_data) 
        @if(!empty($cat_data['products']))
        
        @php
            $current_key = $key;
            $prods = $cat_data['products']; 
            $sliderClassName = 'ajaxContent-'.$cat_data['id'];
            $activeCats[] = '.'.$sliderClassName;
        @endphp
        <div class="full-row bg-white  ss-product-section">
            <div class="container-fluid">
                <div class="row offer-product align-items-center">
                    <div class="col-xl-12 col-lg-12 text-center">
                        <h3 class="down-line-secondary text-dark text-uppercase mb-30 pos-rel">
                            <span>{{$cat_data['name']}}</span>
                        </h3>
                        
                    </div> 
                </div>
            </div>
            <div class="container-fluid">
                <span class="nextBtn"></span>
                <span class="prevBtn"></span>
                <div class="showing-products pt-30 border-2 border-light" id="ajaxContent-{{$cat_data['id']}}">
                    @includeIf('partials.product.product-slider-view')
                </div>
            </div>
        </div>
        @php
            break;
        @endphp
        @endif
    @endforeach
    
    @php
        unset($cat_products[$current_key])
    @endphp
    
@endif
<!-- SLider Loop -->

<div class="banner-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-sm-12 no-gutter">
                <img src="{{asset('assets/images/the-bhartians-banner.png')}}" class="img-fluid w-100">
            </div>
        </div>
    </div>
</div>

<!-- SLider Loop -->
@if($cat_products)

    @foreach($cat_products as $key => $cat_data) 
        @if(!empty($cat_data['products']))
        
        @php
            $current_key = $key;
            $prods = $cat_data['products']; 
            $sliderClassName = 'ajaxContent-'.$cat_data['id'];
            $activeCats[] = '.'.$sliderClassName;
        @endphp
        <div class="full-row bg-white  ss-product-section">
            <div class="container-fluid">
                <div class="row offer-product align-items-center">
                    <div class="col-xl-12 col-lg-12 text-center">
                        <h3 class="down-line-secondary text-dark text-uppercase mb-30 pos-rel">
                            <span>{{$cat_data['name']}}</span>
                        </h3>
                        
                    </div> 
                </div>
            </div>
            <div class="container-fluid">
                <span class="nextBtn"></span>
                <span class="prevBtn"></span>
                <div class="showing-products pt-30 border-2 border-light" id="ajaxContent-{{$cat_data['id']}}">
                    @includeIf('partials.product.product-slider-view')
                </div>
            </div>
        </div>
        @php
           
        @endphp
        @endif
    @endforeach
    
    @php
        unset($cat_products[$current_key])
    @endphp
    
@endif
<!-- SLider Loop -->


<!-- Slider Loop -->
@if($cat_products)

    @foreach($cat_products as $key => $cat_data) 
        @if(!empty($cat_data['products']))
        
        @php
            $current_key = $key;
            $prods = $cat_data['products']; 
            $sliderClassName = 'ajaxContent-'.$cat_data['id'];
            $activeCats[] = '.'.$sliderClassName;
        @endphp
        <div class="full-row bg-white  ss-product-section">
            <div class="container-fluid">
                <div class="row offer-product align-items-center">
                    <div class="col-xl-12 col-lg-12 text-center">
                        <h3 class="down-line-secondary text-dark text-uppercase mb-30 pos-rel">
                            <span>{{$cat_data['name']}}</span>
                        </h3>
                    </div> 
                </div>
            </div>
            <div class="container-fluid">
                <span class="nextBtn"></span>
                <span class="prevBtn"></span>
                <div class="showing-products pt-30 border-2 border-light" id="ajaxContent-{{$cat_data['id']}}">
                    @includeIf('partials.product.product-slider-view')
                </div>
            </div>
        </div>
        @php
        break;
        @endphp
        @endif
    @endforeach
    @php
        unset($cat_products[$current_key])
    @endphp

@endif
<!-- SLider Loop -->

<div id="extraData">
    <div class="text-center">
        <img  src="{{asset('assets/images/'.$gs->loader)}}">
    </div>
</div>





    @if(isset($visited))
    @if($gs->is_cookie == 1)
        <div class="cookie-bar-wrap show">
            <div class="container d-flex justify-content-center">
                <div class="col-xl-10 col-lg-12">
                    <div class="row justify-content-center">
                        <div class="cookie-bar">
                            <div class="cookie-bar-text">
                                {{ __('The website uses cookies to ensure you get the best experience on our website.') }}
                            </div>
                            <div class="cookie-bar-action">
                                <button class="btn btn-primary btn-accept">
                                {{ __('GOT IT!') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endif
<!-- Scroll to top -->
<a href="#" class="scroller text-white" id="scroll"><i class="fa fa-angle-up"></i></a>
<!-- End Scroll To top -->
    <style>
    .ss-product-section .owl-dots{
        text-align: center;
    }

    @media (max-width:801px)  {  
        .ss-home-section{
            display: none;
        }
        .mobile-home-section {
            display: block;
        }

    }

    @media (min-width:801px)  {
        .ss-home-section {
            display: block;
        }
        .mobile-home-section {
            display: none;
        }
    }

    </style>
@endsection
@section('script')
	<script>
		let checkTrur = 0;
		$(window).on('scroll', function(){

		if(checkTrur == 0){
			$('#extraData').load('{{route('front.extraIndex')}}');
			checkTrur = 1;
		}
		});

        
           
    var owlP = $('.product-slider-homes').owlCarousel({ 
        loop: true,
        nav: false,
        dots: true,
        items: 6,
        autoplay: true,
        margin: 30,
        animateIn: 'fadeInDown',
        animateOut: 'fadeOutUp',
        mouseDrag: false,
        responsive: {
        0: {
            items: 1
        },
    
        600: {
            items: 2
        },
    
        1024: {
            items: 6
        },
    
        }
    });

    $('.ss-product-section .nextBtn').click(function() {
        owlP.trigger('next.owl.carousel', [300]);
    })
    $('.ss-product-section .prevBtn').click(function() {
        owlP.trigger('prev.owl.carousel', [300]);
    }) 

    setTimeout(() => {
        console.log('img loop')
        $('.owl-stage .owl-item.cloned').each(function(i, obj) {
            //test
            //var img = jQuery(this).find('.product-image').find('img').attr('data-src');
            //jQuery(this).find('.product-image').find('img').attr('src', img);
        });
        
    }, 1000);

    var owl = $('.home-slider').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        items: 1,
        autoplay: true,
        center: true,
        margin: 0,
        animateIn: 'fadeInRight',
        animateOut: 'fadeOutLeft',
        mouseDrag: true,
    });  

    $('.ss-home-section .nextBtn').click(function() {
        owl.trigger('next.owl.carousel', [300]);
    })
    $('.ss-home-section .prevBtn').click(function() {
        owl.trigger('prev.owl.carousel', [300]);
    })

    var owlmobile = $('.home-slider-mobile').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        items: 1,
        autoplay: true,
        center: true,
        margin: 0,
        animateIn: 'fadeInRight',
        animateOut: 'fadeOutLeft',
        mouseDrag: true,
    });  

    $('.mobile-home-section .nextBtn').click(function() {
        owlmobile.trigger('next.owl.carousel', [300]);
    })
    $('.mobile-home-section .prevBtn').click(function() {
        owlmobile.trigger('prev.owl.carousel', [300]);
    })
	</script>
@endsection
