<div wire:poll.2000ms>
@if(Cart::content() && Cart::Content()->count() > 0)
<div class="onhover-div" >
    <ul class="cart-list">
@foreach(Cart::content()->take(2) as $key => $cart)
        <li class="product-box-contain">
            <div class="drop-cart">
                <a href="{{route('produit_details_index',$cart->options->slug)}}" class="drop-image">
                    <img src="{{URL::asset('../Backend/images/Produit/'.$cart->options->image)}}"
                        class="blur-up lazyload" alt="">
                </a>

                <div class="drop-contain">
                    <a href="{{route('produit_details_index',$cart->options->slug)}}">
                        <h5>{{ \Illuminate\Support\Str::words($cart->name,3,'...') }}</h5>
                    </a>
                    <h6><span>{{$cart->qty}} x</span> {{$cart->price * $cart->qty}} F</h6>
                    
                </div>
            </div>
        </li>
        
        @endforeach                                                    
    </ul>

    <div class="price-box">
        <h5>Total :</h5>
        <h4 class="theme-color fw-bold">{{Cart::subtotal()}} F</h4>
    </div>

    <div class="button-group">
        <a href="{{ route('panier_index') }}" class="btn btn-sm cart-button">allez au panier</a>
        <a href="/finalisez/checkout" class="btn btn-sm cart-button theme-bg-color
        text-white">Finalisez</a>
    </div>
</div>
@endif
</div>