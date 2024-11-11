@if($produitSpecialeBoys->count() > 0)
<!-- Mode Homme Start -->
<section style="padding-top: 1%!important;">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="banner-contain hover-effect">
                        <img src="../Frontend/assets/images/banner1.jpg" class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details p-center p-sm-4 p-3 text-white text-center">
                            <div>
                                <h3 class="lh-base fw-bold text-white">
                                    SPÉCIALE HOMME 
                                </h3>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Mode Homme End -->


    <!-- Produuits Mode homme Start -->
    <section style="padding-top: 4%!important;">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                <div class="row row-cols-xxl-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 no-arrow mt-3">
                    

                    @foreach($produitSpecialeBoys as $produitHomme)
                    <div>
                        <div class="product-box-3 h-100">
                            <div class="product-header">
                                <div class="product-image">
                                    <a href="{{route('produit_details_index',$produitHomme->slug)}}">
                                        @if(!is_null($produitHomme->photo) )
                                        <img src="{{ URL::asset('../Backend/images/Produit/'.$produitHomme->photo) }}"
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

                                        <livewire:frontend.tooltip.liked id="{{$produitHomme->id}}"/>

                                    </ul>
                                </div>
                            </div>

                            <div class="product-footer">
                                <div class="product-detail">
                                        @foreach($produitHomme->souscategorie()->get() as $souscatofproduct)
                                    <span class="span-name">{{\Illuminate\Support\Str::words($souscatofproduct->libelle,3,'...')}}</span>
                                @endforeach
                                    <a href="{{route('produit_details_index',$produitHomme->slug)}}">
                                        <h5 class="name">{{\Illuminate\Support\Str::words($produitHomme->libelle,3,'...')}}</h5>
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
                                    <h5 class="price"><span class="theme-color">{{$produitHomme->prix}} FCFA</span>
                                    </h5>

                                    <livewire:frontend.panier.live-addcar-fourboutton id="{{$produitHomme->id}}"/>

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
@endif
