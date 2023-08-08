<div class="row product-style-1 e-title-hover-primary owl-carousel product-slider-homes e-image-bg-light e-hover-image-zoom e-info-center">
   @foreach($prods as $product)
   <div class="cols product-slide-item" >
      <div class="product type-product ">
         <div class="product-wrapper product-wrapper-item">
            <div class="product-image">
               <a href="{{ route('front.product', $product->slug) }}" class="woocommerce-LoopProduct-link"><img class="lazy" data-src="{{ $product->photo ? asset('assets/images/products/'.$product->photo):asset('assets/images/noimage.png') }}" alt="Product Image"></a>
               @if(!empty($product->previous_price))
                  @if (round($product->offPercentage() )>0)
                  <div class="on-sale"> {{ round($product->offPercentage() )}}%</div>
                  @endif
               @endif
               <div class="hover-area slide-h5">
                @if($product->product_type == "affiliate")
                <div class="cart-button buynow">
                   <a  class="add-to-cart-quick button add_to_cart_button" href="javascript:;" data-href="{{ route('product.cart.quickadd',$product->id) }}" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="{{ __('Buy Now') }}" aria-label="{{ __('Buy Now') }}"></a>
                </div>
                @else
                @if($product->emptyStock())
                <div class="closed slide-h5">
                   <a class="cart-out-of-stock button add_to_cart_button" href="#" title="{{ __('Out Of Stock') }}" ><i class="flaticon-cancel flat-mini mx-auto"></i></a>
                </div>
                @else
                <div class="cart-button slide-h5">
                   <a href="javascript:;" data-href="{{ route('product.cart.add',$product->id) }}" class="add-cart button add_to_cart_button" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="{{ __('Add To Cart') }}" aria-label="{{ __('Add To Cart') }}"></a>
                </div>

                <div class="cart-button buynow">
                   <a  class="add-to-cart-quick button add_to_cart_button" href="javascript:;" data-href="{{ route('product.cart.quickadd',$product->id) }}" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="{{ __('Buy Now') }}" aria-label="{{ __('Buy Now') }}"></a>
                </div>
                @endif
                @endif
                @if(Auth::check())
                <div class="wishlist-button slide-h5">
                   <a class="add_to_wishlist  new button add_to_cart_button" id="add-to-wish" href="javascript:;" data-href="{{ route('user-wishlist-add',$product->id) }}" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">{{ __('Wishlist') }}</a>
                </div>
                @else
                <div class="wishlist-button slide-h5">
                   <a class="add_to_wishlist button add_to_cart_button" href="{{ route('user.login') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">{{ __('Wishlist') }}</a>
                </div>
                @endif
                <div class="compare-button slide-h5">
                   <a class="compare button button add_to_cart_button" data-href="{{ route('product.compare.add',$product->id) }}" href="javascrit:;" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Compare" aria-label="Compare">{{ __('Compare') }}</a>
                </div>
             </div>




            </div>
            <div class="product-info slide-h5">
               <h3 class="product-title"><a href="{{ route('front.product', $product->slug) }}">{{ $product->showName() }}</a></h3>
               <div class="product-price">
                  <div class="price">
                     @if(!empty($product->size))
                        <ins>{{ $product->showPrice() }}</ins>
                     @else
                        <ins>{{ $product->setCurrency() }}</ins>
                     @endif
                     
                     @if(!empty($product->previous_price))
                        <del>{{ $product->showPreviousPrice() }}</del>
                     @endif
                  </div>
               </div>
               <!-- <div class="shipping-feed-back slide-h5">
                  <div class="star-rating">
                     <div class="rating-wrap">
                        <p><i class="fas fa-star"></i><span> {{ App\Models\Rating::ratings($product->id) }} ({{ App\Models\Rating::ratingCount($product->id) }})</span></p>
                     </div>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
   </div>
   @endforeach
</div>