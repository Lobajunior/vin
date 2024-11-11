


<!-- Product Section Start -->
<section>
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Les plus demandés</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="../Frontend/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="product-border border-row">
                <div class="slider-6_2 no-arrow">


                @foreach($produitMoreAsk as $key => $produits)
            <div>
                <div class="row m-0">
                    <div class="col-12 px-0">
                        <div class="product-box wow fadeIn">
                            <div class="product-image">
                                <a href="{{route('produit_details_index',$produits->slug)}}">
                                    @if(!is_null($produits->photo))
                                    <img src="{{ URL::asset('../Backend/images/Produit/'.$produits->photo) }}"
                                        class="img-fluid blur-up lazyload" alt="">
                                    @endif
                                </a>
                                <ul class="product-option justify-content-around">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#view">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="{{ route('comparer_index') }}">
                                            <i data-feather="refresh-cw"></i>
                                        </a>
                                    </li>

                                    <livewire:frontend.tooltip.liked id="{{$produits->id}}"/>
                                </ul>
                            </div>
                            <div class="product-detail">
                                <a href="{{route('produit_details_index',$produits->slug)}}">
                                    <h6 class="name name-2 h-100">{{$produits->libelle}}</h6>
                                </a>

                                <div class="product-rating mt-2">
                                    <ul class="rating">
                                        <li>
                                            <i data-feather="star"   class="@if($sum_rating_produit[$key] >= 1 || $sum_rating_produit[$key] == 0) fill @endif"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"  class="@if($sum_rating_produit[$key] >= 2 || $sum_rating_produit[$key] == 0) fill @endif"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"  class="@if($sum_rating_produit[$key] >= 3 || $sum_rating_produit[$key] == 0) fill @endif"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"  class="@if($sum_rating_produit[$key] >= 4) fill @endif"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"  class="@if($sum_rating_produit[$key] >= 5) fill @endif"></i>
                                        </li>
                                    </ul>
                                    <span>(@if($sum_rating_produit[$key] == 0 ) 3 @else {{$sum_rating_produit[$key]}} @endif)</span>
                                </div>

                                <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                <div class="counter-box">
                                    <h6 class="sold theme-color">{{$produits->prix}} FCFA</h6>

                                    <livewire:frontend.panier.live-addcar-twoboutton id="{{$produits->id}}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-12 px-0">
                        <div class="product-box wow fadeIn" data-wow-delay="0.1s">
                            <div class="product-image">
                                <a href="{{route('produit_details_index',$produits->slug)}}">
                                    <img src="../Frontend/assets/images/veg-2/product/12.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>
                                <ul class="product-option justify-content-around">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#view">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="{{ route('comparer_index') }}">
                                            <i data-feather="refresh-cw"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-detail">
                                <a href="{{route('produit_details_index',$produits->slug)}}">
                                    <h6 class="name name-2 h-100">Sandwich Cookies</h6>
                                </a>

                                <div class="product-rating mt-2">
                                    <ul class="rating">
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"></i>
                                        </li>
                                    </ul>
                                    <span>(34)</span>
                                </div>

                                <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                <div class="counter-box">
                                    <h6 class="sold theme-color">$ 80.00</h6>

                                    <div class="addtocart_btn">
                                        <button class="add-button addcart-button btn buy-button text-light">
                                            <span>Add</span>
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                        <div class="qty-box cart_qty">
                                            <div class="input-group">
                                                <button type="button" class="btn qty-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                    name="quantity" value="1">
                                                <button type="button" class="btn qty-right-plus"
                                                    data-type="plus" data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>



            @endforeach



</div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

