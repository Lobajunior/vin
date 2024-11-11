<div>
    @if(isset($produitDjassa) && !is_null($produitDjassa) )
     <!-- Produits of DJASSA Start -->
    <section>
        <div class="container-fluid-lg">


        @if(!is_null($produitDjassa))
            <div class="row">
                <div class="col-12">
                    <div class="home-contain hover-effect">
                        <img src="../Frontend/assets/images/cake/banner/12.webp" class="bg-img blur-up lazyload" alt="">
                        <div class="home-detail p-center position-relative text-center">
                            <div>
                                <h3 class="text-danger text-uppercase fw-bold mb-0">
                                    Un Bonus de folie
                                </h3>
                                <h2 class="theme-color text-pacifico fw-normal mb-0 super-sale text-center">
                                   Sur nos
                                </h2>
                                <h2 class="home-name text-uppercase">SAVON</h2>
                                <h3 class="text-pacifico fw-normal text-content text-center">
                                    www.teinte ebene.com
                                </h3>
                                <ul class="social-icon">
                                    <li>
                                        <a href="https://www.instagram.com/">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://www.facebook.com/">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://twitter.com/">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://www.whatsapp.com/">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif


            
                    <div class="row row-cols-xxl-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 no-arrow mt-3">
                        @foreach($produitDjassa as $itemproduitDjassa)
                        <div>
                            <div class="product-box product-white-bg wow fadeIn">
                                <div class="product-image" style="padding: 0px!important;">
                                    <a href="{{route('produit_details_index', $itemproduitDjassa->slug) }}">
                                    @if(!is_null($itemproduitDjassa->photo))
                                        <img src="{{ URL::asset('../Backend/images/Produit/'.$itemproduitDjassa->photo) }}" class="img-fluid blur-up lazyload"
                                            alt="">
                                            @endif
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="{{ route('comparer_index') }}">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <livewire:frontend.tooltip.liked id="{{$itemproduitDjassa->id}}"/>

                                    </ul>
                                </div>
                                <div class="product-detail position-relative">
                                    <a href="{{route('produit_details_index', $itemproduitDjassa->slug) }}">
                                        <h6 class="name">{{$itemproduitDjassa->libelle}}</h6>
                                    </a>


                                    <h6 class="price theme-color">{{$itemproduitDjassa->prix}} FCFA</h6>

                                <livewire:frontend.panier.live-addcar-threeboutton id="{{$itemproduitDjassa->id}}"/>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
        </div>
    </section>
    <!-- Produits of DJASSA End -->
    @endif
</div>
