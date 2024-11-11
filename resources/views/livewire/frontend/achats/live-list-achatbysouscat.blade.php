<div>
    @foreach($sousCatCible as $sousCatCiblesItem)
        @if($sousCatCiblesItem->produit()->count() > 2)
                <div class="title d-block px-4">
                        <h2 class="text-theme font-sm">{{$sousCatCiblesItem->libelle}}</h2>
                        <p>Pour plus de produits ( {{$sousCatCiblesItem->libelle}} ) <a href="shop-left-sidebar.html" class="shop-button">Voir Plus <i class="fa-solid fa-right-long ms-2"></i></a></p>
                    </div>

                    <div
                        class="row row-cols-xxl-6 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 section-b-space px-4">
        @foreach($sousCatCiblesItem->produit()->get() as $productSoucat)
        @if($productSoucat->is_djassa == 0)
                        <div>
                            <div class="product-box product-white-bg wow fadeIn">
                                <div class="product-image">
                                    <a href="{{route('produit_details_index',$productSoucat->slug)}}">
                                        <img src="{{ URL::asset('../Backend/images/Produit/'.$productSoucat->photo) }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <livewire:frontend.tooltip.liked id="{{$productSoucat->id}}"/>

                                    </ul>
                                </div>
                                <div class="product-detail position-relative">
                                    <a href="{{route('produit_details_index',$productSoucat->slug)}}">
                                        <h6 class="name">
                                            {{$productSoucat->libelle}}
                                        </h6>
                                    </a>
                                    <h6 class="price theme-color">{{$productSoucat->prix}} FCFA</h6>

                                    <livewire:frontend.panier.live-addcar-threeboutton id="{{$productSoucat->id}}"/>

                                </div>
                            </div>
                        </div>
                        @endif
        @endforeach
                    </div>
                @endif
        @endforeach

</div>
