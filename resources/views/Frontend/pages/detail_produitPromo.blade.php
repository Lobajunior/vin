@extends('../Frontend/layouts/app')


@section('title')
    {{$produitpromoInfos->libelle}}
@endsection


@section('content')

 <!-- Product Left Sidebar Start -->
 <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                    <div class="row g-4">
                        <div class="col-xl-6 wow fadeInUp">
                            <div class="product-left-box">
                                <div class="row g-2">
                                    <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                        <div class="product-main-2 no-arrow">
                                            <div>
                                                <div class="slider-image">
                                                @if(!is_null($produitpromoInfos->photo))
                                                    <img src="{{ URL::asset('../Backend/images/Produit/'.$produitpromoInfos->photo) }}" id="img-1"
                                                        data-zoom-image="{{ URL::asset('../Backend/images/Produit/'.$produitpromoInfos->photo) }}"
                                                        class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                                @else
                                                    <img src="../Frontend/assets/images/product/category/1.jpg" id="img-1"
                                                        data-zoom-image="../Frontend/assets/images/product/category/1.jpg"
                                                        class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                                @endif
                                                </div>
                                            </div>

                                            @if(!is_null($produitpromoInfos->images_secondaires))
                                            @foreach($produitpromoInfos->images_secondaires as $secondPictures)
                                            <div>
                                                <div class="slider-image">
                                                    <img src="{{ URL::asset('../Backend/images/Produit/'.$secondPictures) }}"
                                                        data-zoom-image="{{ URL::asset('../Backend/images/Produit/'.$secondPictures) }}"
                                                        class="img-fluid image_zoom_cls-1 blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                        <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                            <div>
                                                <div class="sidebar-image">
                                                @if(!is_null($produitpromoInfos->photo))
                                                    <img src="{{ URL::asset('../Backend/images/Produit/'.$produitpromoInfos->photo) }}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                @endif
                                                </div>
                                            </div>

                                            @if(!is_null($produitpromoInfos->images_secondaires))
                                            @foreach($produitpromoInfos->images_secondaires as $secondPictures)
                                            <div>
                                                <div class="sidebar-image">
                                                    <img src="{{ URL::asset('../Backend/images/Produit/'.$secondPictures) }}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif

                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="right-box-contain">
                                <h6 class="offer-top">{{$produitpromoInfos->nb_promo}}% de reduction</h6>
                                <h2 class="name">{{$produitpromoInfos->libelle}}</h2>
                                <div class="price-rating">
                                    <h3 class="theme-color price">{{ number_format($produitpromoInfos->PricePromoter,0,',',' ')}} FCFA <del class="text-content">{{$produitpromoInfos->prix}}</del> <span
                                            class="offer theme-color">({{$produitpromoInfos->nb_promo}}% off)</span></h3>
                                    <div class="product-rating custom-rate">
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
                                    </div>
                                </div>

                                <div class="procuct-contain">
                                    <p>{!! substr($produitpromoInfos->description,0,100) !!}
                                    </p>
                                </div>

                                <div class="product-packege">
                                    <div class="product-title">
                                        <h4>Vues par :</h4>
                                    </div>
                                    <ul class="select-packege">
                                        <li>
                                            <a href="javascript:void(0)" class="active">@if(!is_null($produitpromoInfos->nb_view) ) {{$produitpromoInfos->nb_view}} @else 0 @endif  personnes</a>
                                        </li>
                                    </ul>
                                </div>

                                <livewire:frontend.panier.live-addcart-promo3 id="{{$produitpromoInfos->id}}"/>
                                

                                <div class="buy-box">
                                    <a >
                                    <livewire:frontend.tooltip.liked id="{{$produitpromoInfos->id}}"/>
                                        <span>Ajouter aux favoris</span>
                                    </a>

                                    <a href="compare.html">
                                        <i data-feather="shuffle"></i>
                                        <span>Comparer</span>
                                    </a>
                                </div>

                                <div class="pickup-box">
                                    <div class="product-title">
                                        <h4>Bref Informations</h4>
                                    </div>

                                    <div class="pickup-detail">
                                        <h4 class="text-content">Lollipop cake chocolate chocolate cake dessert jujubes.
                                            Shortbread sugar plum dessert powder cookie sweet brownie.</h4>
                                    </div>

                                    <div class="product-info">
                                        <ul class="product-info-list product-info-list-2">
                                            <li>Type : <a href="javascript:void(0)">{{$produitpromoInfos->type}}</a></li>
                                            <li>date : <a href="javascript:void(0)">{{date('j M, Y', strtotime($produitpromoInfos->created_at))}}</a></li>
                                            <li>Stocks : <a href="javascript:void(0)">@if($produitpromoInfos->qte_stock <= 5) Limiter @else {{$produitpromoInfos->qte_stock}} @endif</a></li>
                                            <li>Categorie :
                                            @foreach($produitpromoInfos->souscategorie()->get() as $SouscategorieProduits)
                                            <a href="javascript:void(0)">{{$SouscategorieProduits->libelle}}</a> </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="paymnet-option">
                                    <div class="product-title">
                                        <h4>Methode de paiements</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="../Frontend/assets/images/product/payment/1.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="../Frontend/assets/images/product/payment/2.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="../Frontend/assets/images/product/payment/3.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="../Frontend/assets/images/product/payment/4.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="../Frontend/assets/images/product/payment/5.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="product-section-box">
                                <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" type="button" role="tab"
                                            aria-controls="description" aria-selected="true">Descriptions</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                            data-bs-target="#info" type="button" role="tab" aria-controls="info"
                                            aria-selected="false">infos supplementaires</button>
                                    </li>


                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                            data-bs-target="#review" type="button" role="tab" aria-controls="review"
                                            aria-selected="false">Notes</button>
                                    </li>
                                </ul>

                                <div class="tab-content custom-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-description">
                                            <div class="nav-desh">
                                                <p>{!! $produitpromoInfos->description !!}</p>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                                        <div class="table-responsive">
                                            <table class="table info-table">
                                                <tbody>
                                                @if(!is_null($produitpromoInfos->couleur))
                                                    <tr>
                                                        <td>Couleurs</td>
                                                        <td>
                                                        @foreach($produitpromoInfos->couleur as $couleurCible)
                                                            {{$couleurCible}}
                                                        @endforeach
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <td>Type</td>
                                                        <td>{{$produitpromoInfos->type}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom</td>
                                                        <td>{{$produitpromoInfos->libelle}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Categorie</td>
                                            @foreach($produitpromoInfos->souscategorie()->get() as $SouscategorieProduits)
                                                        <td>
                                                                {{$SouscategorieProduits->libelle}}
                                                        </td>
                                                @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td>Prix</td>
                                                        <td>{{$produitpromoInfos->prix}} FCFA</td>
                                                    </tr>
                                                    @if(!is_null($produitpromoInfos->pointure))
                                                    <tr>
                                                        <td>Pointures</td>
                                                        <td>
                                                        @foreach($produitpromoInfos->pointure as $pointureCible)
                                                            {{$pointureCible}}
                                                        @endforeach
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if(!is_null($produitpromoInfos->taille))
                                                    <tr>
                                                        <td>Tailles</td>
                                                        <td>
                                                        @foreach($produitpromoInfos->taille as $tailleCible)
                                                            
                                                        {{$tailleCible}},
                                                    
                                                        @endforeach
                                                    </td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <td>Stock</td>
                                                        <td>{{$produitpromoInfos->qte_stock}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    

                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                        <div class="review-box">
                                            <livewire:frontend.produits.live-rating id='{{$produitpromoInfos->id}}' />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                    <div class="right-sidebar-box">
                        <div class="vendor-box">
                            <div class="verndor-contain">
                                <div class="vendor-image">
                                    <img src="../Frontend/assets/images/product/vendor.png" class="blur-up lazyload" alt="">
                                </div>

                                <div class="vendor-name">
                                    <h5 class="fw-500">Noodles Co.</h5>

                                    <div class="product-rating mt-1">
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
                                        <span>(36 Reviews)</span>
                                    </div>

                                </div>
                            </div>

                            <p class="vendor-detail">JIAMS & Compagnie est une entreprise Africaine
                                qui offre un services radieux et Open source pour ses clients
                            <div class="vendor-list">
                                <ul>
                                    <li>
                                        <div class="address-contact">
                                            <i data-feather="map-pin"></i>
                                            <h5>Address: <span class="text-content">Rivera palmeraie, Y4</span></h5>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="address-contact">
                                            <i data-feather="headphones"></i>
                                            <h5>Contact Seller: <span class="text-content">(+225)-07-58-29-35-71</span></h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Trending Product -->
                        <div class="pt-25">
                            <div class="category-menu">
                                <h3>Produits en Tendances</h3>

                                <ul class="product-list product-right-sidebar border-0 p-0">
                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="../Frontend/assets/images/vegetable/product/23.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Meatigo Premium Goat Curry</h6>
                                                    </a>
                                                    <span>450 G</span>
                                                    <h6 class="price theme-color">$ 70.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="../Frontend/assets/images/vegetable/product/24.png"
                                                    class="blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Dates Medjoul Premium Imported</h6>
                                                    </a>
                                                    <span>450 G</span>
                                                    <h6 class="price theme-color">$ 40.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="../Frontend/assets/images/vegetable/product/25.png"
                                                    class="blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Good Life Walnut Kernels</h6>
                                                    </a>
                                                    <span>200 G</span>
                                                    <h6 class="price theme-color">$ 52.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="mb-0">
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="../Frontend/assets/images/vegetable/product/26.png"
                                                    class="blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Apple Red Premium Imported</h6>
                                                    </a>
                                                    <span>1 KG</span>
                                                    <h6 class="price theme-color">$ 80.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Banner Section -->
                        <div class="ratio_156 pt-25">
                            <div class="home-contain">
                                <img src="../Frontend/assets/images/vegetable/banner/8.jpg" class="bg-img blur-up lazyload"
                                    alt="">
                                <div class="home-detail p-top-left home-p-medium">
                                    <div>
                                        <h6 class="text-yellow home-banner">Seafood</h6>
                                        <h3 class="text-uppercase fw-normal"><span
                                                class="theme-color fw-bold">Freshes</span> Produits</h3>
                                        <h3 class="fw-light">every hour</h3>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn btn-animation btn-md fw-bold mend-auto">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Left Sidebar End -->

    <!-- Releted Product Section Start -->
    <section class="product-list-section section-b-space">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>D'autres Produits</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="../Frontend/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-6_1 product-wrapper">
                        @foreach($produitIFSouscat as $productOfTheSouscat)
                        <div>
                            <div class="product-box-3 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="{{route('produit_details_index',$productOfTheSouscat->slug)}}">
                                            <img src="{{ URL::asset('../Backend/images/Produit/'.$productOfTheSouscat->photo) }}"
                                                class="img-fluid blur-up lazyload" alt="SELONTOI {{$productOfTheSouscat->libelle}}">
                                        </a>

                                        <ul class="product-option">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
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
                                </div>

                                <div class="product-footer">
                                    <div class="product-detail">
                                        <span class="span-name">Cake</span>
                                        <a href="{{route('produit_details_index',$productOfTheSouscat->slug)}}">
                                            <h5 class="name">{{$productOfTheSouscat->libelle}}</h5>
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
                                        @foreach($produitpromoInfos->souscategorie()->get() as $SouscategorieProduits)
                                        <h6 class="unit">{{$SouscategorieProduits->libelle}}</h6>
                                        @endforeach
                                        <h5 class="price"><span class="theme-color">{{$productOfTheSouscat->prix}} FCFA</span> 
                                        </h5>
                                        <div class="add-to-cart-box bg-white">
                                            <button class="btn btn-add-cart addcart-button">Ajouter
                                                <span class="add-icon bg-light-gray">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                            </button>
                                            <div class="cart_qty qty-box">
                                                <div class="input-group bg-white">
                                                    <button type="button" class="qty-left-minus bg-gray"
                                                        data-type="minus" data-field="">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="0">
                                                    <button type="button" class="qty-right-plus bg-gray"
                                                        data-type="plus" data-field="">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
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
    <!-- Releted Product Section End -->



@endsection
