<div class="top-header font-400 d-none d-lg-block py-1 text-general" style="background-color:#fee3c9;">
    <div class="container-fluid">
       <div class="row align-items-center">
          <div class="col-lg-6 sm-mx-none">
             <div class="d-flex align-items-center text-general">
                <i class="flaticon-phone-call flat-mini me-2 text-general"></i>
                <span class="text-dark"> {{ $ps->phone }}</span>
                <div class="nt-social border_true black_false d-flex align-items-center">
                    <a href="https://www.facebook.com/TheBhartians" target="_blank" class="facebook cb ttip_nt tooltip_bottom_right">
                        <span class="tt_txt"></span><i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/thebhartians" target="_blank" class="twitter cb ttip_nt tooltip_bottom_right">
                        <span class="tt_txt"></span><i class="fa fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/thebhartians/" target="_blank" class="instagram cb ttip_nt tooltip_bottom_right">
                        <span class="tt_txt"></span><i class="fa fa-instagram"></i>
                    </a>
                    <a href="https://www.pinterest.com/thebhartians/" target="_blank" class="ttip_nt tooltip_bottom_right">
                        <span class="tt_txt"></span><i class="fa fa-pinterest" aria-hidden="true"></i>
                    </a>
                    <p class="mail mb-0 top-header-email ml-5">
                        <a class="email-info" href="tel:+91 77108 48489">+91 77108 48489</a> /<a class="email-info" href="tel:+91 77380 55377">+91 77380 55377</a><!--<a href="mailto:info@bhartians.com" class="email-info">info@bhartians.com</a>-->
                    </p>
                </div>
             </div>
          </div>
          <div class="col-lg-6 text-right">
              <p class="mb-0 blink">24x7 Customer Care Support</p>
             <!--<ul class="top-links text-general ms-auto  d-flex justify-content-end">
                <li class="my-account-dropdown">
                   <div class="language-selector nice-select">
                      <i class="fas fa-globe-americas text-dark"></i>
                      <select name="language" class="language selectors nice">
                      @foreach(DB::table('languages')->get() as $language)
                      <option value="{{route('front.language',$language->id)}}" {{ Session::has('language') ? ( Session::get('language') == $language->id ? 'selected' : '' ) : (DB::table('languages')->where('is_default','=',1)->first()->id == $language->id ? 'selected' : '') }} >
                      {{$language->language}}
                      </option>
                      @endforeach
                      </select>
                   </div>
                </li>
                <li class="my-account-dropdown">
                   <div class="currency-selector nice-select">
                      <span class="text-dark">{{ Session::has('currency') ? DB::table('currencies')->where('id','=',Session::get('currency'))->first()->sign   : DB::table('currencies')->where('is_default','=',1)->first()->sign }}</span>
                      <select name="currency" class="currency selectors nice">
                      @foreach(DB::table('currencies')->get() as $currency)
                      <option value="{{route('front.currency',$currency->id)}}" {{ Session::has('currency') ? ( Session::get('currency') == $currency->id ? 'selected' : '' ) : (DB::table('currencies')->where('is_default','=',1)->first()->id == $currency->id ? 'selected' : '') }}>
                      {{$currency->name}}
                      </option>
                      @endforeach
                      </select>
                   </div>
                </li>-->
                @if($gs->reg_vendor == 1)
                <!-- <div class=" align-items-center text-general sell">
                   @if(Auth::check())
                   @if(Auth::guard('web')->user()->is_vendor == 2)
                    <a href="{{ route('vendor.dashboard') }}" class="sell-btn "> {{ __('Sell') }}</a> 
                   @else
                   <a href="{{ route('user-package') }}" class="sell-btn "> {{ __('Sell') }}</a>
                   @endif
                </div> -->
                @else
                <!-- <div class=" align-items-center text-general">
                   <a href="{{ route('vendor.login') }}" class="sell-btn "> {{ __('Sell') }}</a>
                </div> -->
                @endif
                @endif
             </ul>
          </div>
       </div>
    </div>
 </div>
