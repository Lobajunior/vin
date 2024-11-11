<div>
@if($produits_offer_soixante_dix->count() > 0 )
    <!-- Offer Section Start -->
    <section class="offer-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="offer-box hover-effect">
                        <h2>70% oFF <span> DE RÉDUCTION SUR LES PRODUITS</span> </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Offer Section End -->


    <!-- Product Section 60% Start -->
    <section class="section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="search-product product-wrapper">

                        @foreach($produits_offer_soixante_dix as $product)
                        <div>
                            <div class="product-box-3 h-100">
                                <div class="product-header">
                                    <div class="product-image" style="padding: 10px!important;">
                                        <a href="{{route('produitPromo_details_index', $product->slug) }}">
                                             @if(!is_null($product->photo))
                                                <img src="{{ URL::asset('../Backend/images/Produit/'.$product->photo) }}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                @endif
                                        </a>

                                        <ul class="product-option">
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

                                            <livewire:frontend.tooltip.liked id="{{$product->id}}"/>

                                        </ul>
                                    </div>
                                </div>

                                <div class="product-footer">
                                    <div class="product-detail">
                                    @foreach($product->souscategorie()->get() as $souscatofproduct)
                                        <span class="name text-title" style="text-color: light-blue;">{{$souscatofproduct->libelle}}</span>
                                    @endforeach
                                        <a href="{{route('produitPromo_details_index', $product->slug) }}">
                                            <h5 class="name">{{\Illuminate\Support\Str::words($product->libelle,3,'...')}}</h5>
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
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                            </ul>
                                            <span>(5.0)</span>
                                        </div>
                                        <h6 class="unit">500 G</h6>
                                        <h5 class="price"><span class="theme-color">{{ number_format($product->PricePromoter,0,',',' ')}} </span> <del>{{$product->prix}} FCFA</del>
                                        </h5>
                                        <livewire:frontend.panier.live-addcart-promo id="{{$product->id}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

@endif
</div>

