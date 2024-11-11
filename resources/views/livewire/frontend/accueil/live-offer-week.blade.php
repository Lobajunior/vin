<div>

@if($produits_offer_week->count() > 0)

   <!-- Banner Speciale offer -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="offer-box hover-effect">
                        <img src="../Frontend/assets/images/veg-2/banner/3.jpg" class="bg-img blur-up lazyload" alt="">
                        <div class="offer-contain p-4">
                            <div class="offer-detail">
                                <h2 class="text-dark">Speciales offres <span class="text-danger fw-bold">de la
                                        Semaine!</span></h2>
                                <p class="text-content">Speciales offres sur ce décompte, Allez y!</p>
                            </div>
                            <div class="offer-timing">
                                <div class="time" id="clockdiv-1" data-hours="1" data-minutes="2" data-seconds="3">
                                    <ul>
                                        <li>
                                            <div class="counter">
                                                <div class="days">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div class="hours">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div class="minutes">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div class="seconds">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Offer Section End -->


    <section class="product-section-3">
        <div class="container-fluid-lg">

            <div class="row">
                <div class="col-12">
                    <div class="slider-7_1 arrow-slider img-slider">
                    @foreach($produits_offer_week as $product)
                        <div>
                            <div class="product-box-4 wow fadeInUp" style="border: 0.02em #ccc solid; box-shadow:  -0.2rem  0 .4rem ;">
                                <div class="product-image product-image-2">
                                    <a href="{{route('produitPromo_details_index', $product->slug) }}">
                                        @if(!is_null($product->photo))
                                        <img src="{{ URL::asset('../Backend/images/Produit/'.$product->photo) }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                        @endif
                                    </a>

                                    <ul class="option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i class="iconly-Show icli"></i>
                                            </a>
                                        </li>
                                        <livewire:frontend.tooltip.liked id="{{$product->id}}"/>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="{{ route('comparer_index') }}">
                                                <i class="iconly-Swap icli"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail">
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
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"></i>
                                        </li>
                                    </ul>
                                    <a href="{{route('produitPromo_details_index', $product->slug) }}">
                                        <h5 class="name text-title">{{$product->libelle}}</h5>
                                    </a>
                                    <h5 class="price theme-color">{{ number_format($product->PricePromoter,0,',',' ')}} <del>{{$product->prix}} F</del></h5>

                                    <livewire:frontend.panier.live-addcart-promo2 id="{{$product->id}}"/>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
@endif

</div>
