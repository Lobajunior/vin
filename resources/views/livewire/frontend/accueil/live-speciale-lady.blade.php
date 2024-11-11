@if($produitSpecialeLadies->count() > 0)
 <!-- Mode Femmes Start -->
 <section style="padding-top: 1%!important;">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="banner-contain hover-effect">
                        <img src="../Frontend/assets/images/banner2.jpg" class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details p-center p-sm-4 p-3 text-white text-center">
                            <div>
                                <h3 class="lh-base fw-bold text-white">
                                    SPÉCIALE FEMME
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Mode Femmes End -->



        <!-- Produuits Mode femme Start -->
    <section style="padding-top: 0px!important;">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="row row-cols-xxl-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 no-arrow mt-3">


                @foreach($produitSpecialeLadies as $produitLady)
                        <div>
                            <div class="product-box product-white-bg wow fadeIn">
                                <div class="product-image">
                                    <a href="{{route('produit_details_index',$produitLady->slug)}}">
                                         @if(!is_null($produitLady->photo) )
                                        <img src="{{ URL::asset('../Backend/images/Produit/'.$produitLady->photo) }}" class="img-fluid blur-up lazyload"
                                            alt="">
                                        @endif
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="aperçu">
                                            <a href="#moreinfoBox" data-bs-toggle="modal">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="{{ route('comparer_index') }}">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <livewire:frontend.tooltip.liked id="{{$produitLady->id}}"/>

                                    </ul>
                                </div>
                                <div class="product-detail position-relative">
                                    <a href="{{route('produit_details_index',$produitLady->slug)}}">
                                        <h6 class="name">{{$produitLady->libelle}}</h6>
                                    </a>

                                    <h6 class="price theme-color">{{$produitLady->prix}} FCFA</h6>

                                    <livewire:frontend.panier.live-addcar-threeboutton id="{{$produitLady->id}}"/>

                                </div>
                            </div>
                        </div>
              
                    

            <!-- Deal Box Modal Start -->
            <div class="modal fade theme-modal deal-modal" id="moreinfoBox" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div>
                                <h5 class="modal-title w-100" id="deal_today">Plus d'info</h5>
                                <p class="mt-1 text-content">Recommended deals for you.</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Deal Box Modal End -->    

@endforeach




            </div>
        </div>
    </div>
</section>

@endif

