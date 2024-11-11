<div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table">
                                <tbody wire:poll.2000ms>
                                @if(Cart::content() && Cart::Content()->count() > 0)
                                @foreach(Cart::content() as $cart)
                                    <tr class="product-box-contain">
                                        <td class="product-detail">
                                            <div class="product border-0">
                                                <a href="{{route('produit_details_index',$cart->options->slug)}}" class="product-image">
                                                    <img src="{{URL::asset('../Backend/images/Produit/'.$cart->options->image)}}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </a>
                                                <div class="product-detail">
                                                    <ul>
                                                        <li class="name">
                                                            <a href="{{route('produit_details_index',$cart->options->slug)}}">{{ \Illuminate\Support\Str::words($cart->name,2,'...') }}</a>
                                                        </li>

                                                        

                                                        <li class="text-content"><span
                                                                class="text-title">Quantity :</span>{{$cart->qty}}</li>

                                                        <li>
                                                            <h5 class="text-content d-inline-block">Prix :</h5>
                                                            <span>{{number_format($cart->price,0,',',' ')}} F</span>
                                                            
                                                        </li>

                                                        <li>
                                                            <h5 class="saving theme-color">Total:{{$cart->price * $cart->qty}} </h5>
                                                        </li>

                                                        <li class="quantity-price-box">
                                                            <div class="cart_qty">
                                                                <div class="input-group">
                                                                <button type="button" wire:click="DQCART({{$cart->id}})" class="btn qty-left-minus"
                                                                    data-type="minus" data-field="">
                                                                    <i class="fa fa-minus ms-0"  aria-hidden="true"></i>
                                                                </button>
                                                                <input class="form-control input-number qty-input" type="number"
                                                                    value="{{$cart->qty}}">
                                                                <button type="button" wire:click="UCART({{$cart->id}})" class="btn qty-right-plus"
                                                                    data-type="plus" data-field="">
                                                                    <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                                </button>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <h5>Total: {{number_format($cart->price * $cart->qty,0,',',' ')}} FCFA</h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="price">
                                            <h4 class="table-title text-content">Prix</h4>
                                            <h5>{{number_format($cart->price,0,',',' ')}} F</h5>
                                            <h6 class="theme-color"> TT : {{number_format($cart->price * $cart->qty,0,',',' ')}} F</h6>
                                        </td>

                                        <td class="quantity">
                                            <h4 class="table-title text-content">Qty</h4>
                                            <div class="quantity-price">
                                                <div class="cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" wire:click="DQCART({{$cart->id}})" class="btn qty-left-minus"
                                                            data-type="minus" data-field="">
                                                            <i class="fa fa-minus ms-0"  aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="number"
                                                            value="{{$cart->qty}}">
                                                        <button type="button" wire:click="UCART({{$cart->id}})" class="btn qty-right-plus"
                                                            data-type="plus" data-field="">
                                                            <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="subtotal">
                                            <h4 class="table-title text-content">Total</h4>
                                            <h5>{{number_format($cart->price * $cart->qty,0,',',' ')}} FCFA</h5>
                                        </td>

                                        <td class="save-remove">
                                            <h4 class="table-title text-content">Action</h4>
                                            <a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a>
                                            <a class="remove close_button" href="#"  wire:click="DeleteProd({{$cart->id}})">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>
                                        <h6 class="text-center text-warning"> Aucun produit dans votre panier</h6>
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Coût Total</h3>
                        </div>

                        <div class="summery-contain">
                            <div class="coupon-cart">
                                <h6 class="text-content mb-2">Appliquer un Coupon</h6>
                                <div class="mb-3 coupon-box input-group">
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter Coupon Code Here...">
                                    <button class="btn-apply">Valider</button>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <h4>Prix total (HTT)</h4>
                                    <h4 class="price">{{Cart::subtotal()}}</h4>
                                </li>

                                <li>
                                    <h4>Coupon </h4>
                                    <h4 class="price">(-) 0.00</h4>
                                </li>

                                <li class="align-items-start">
                                    <h4>TVA</h4>
                                    <h4 class="price text-end">{{Cart::tax()}}</h4>
                                </li>
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total (FCFA)</h4>
                                <h4 class="price theme-color">{{Cart::subtotal()}}</h4>
                            </li>
                        </ul>

                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                @if(Cart::content() && Cart::Content()->count() > 0)
                                    <button onclick="location.href = '/finalisez/checkout';"
                                        class="btn btn-animation proceed-btn fw-bold" >Passez la commande</button>
                                @else
                                <button onclick="location.href = '#';" disabled
                                        class="btn btn-animation proceed-btn fw-bold" >Passez la commande</button>
                                @endif
                                </li>

                                <li>
                                    <button onclick="location.href = '/produits';"
                                        class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Retour a l'achat</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>