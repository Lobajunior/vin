    <div class="row g-sm-3 g-2"  wire:poll.1000ms>
        @foreach($produitFav as $itemproduitFav)
        <div class="col-xxl-2 col-lg-3 col-md-4 col-6 product-box-contain">
            <div class="product-box-3 h-100">
                <div class="product-header">
                    <div class="product-image">
                        <a href="{{route('produit_details_index',$itemproduitFav->slug)}}">
                        @if(!is_null($itemproduitFav->photo))
                            <img src="{{ URL::asset('../Backend/images/Produit/'.$itemproduitFav->photo) }}"
                                class="img-fluid blur-up lazyload" alt="">
                            @endif
                        </a>

                        <div class="product-header-top">
                            <button class="btn wishlist-button close_button" wire:click="deletedFavoris({{$itemproduitFav->id}})">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-footer">
                    <div class="product-detail">
                    @foreach($itemproduitFav->souscategorie()->get() as $souscatofproduct)
                        <span class="span-name">{{$souscatofproduct->libelle}}</span>
                        @endforeach
                        <a href="{{route('produit_details_index',$itemproduitFav->slug)}}">
                            <h5 class="name">{{$itemproduitFav->libelle}}</h5>
                        </a>
                    
                        <h5 class="price">
                            <span class="theme-color">{{$itemproduitFav->prix}} FCFA</span>
                            
                        </h5>

                        <div class="add-to-cart-box bg-white mt-2">
                            <button class="btn btn-add-cart addcart-button">Ajouter
                                <span class="add-icon bg-light-gray">
                                    <i class="fa-solid fa-plus"></i>
                                </span>
                            </button>
                            <div class="cart_qty qty-box">
                                <div class="input-group bg-white">
                                    <button type="button" class="qty-left-minus bg-gray" data-type="minus"
                                        data-field="">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                    <input class="form-control input-number qty-input" type="text"
                                        name="quantity" value="0">
                                    <button type="button" class="qty-right-plus bg-gray" data-type="plus"
                                        data-field="">
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