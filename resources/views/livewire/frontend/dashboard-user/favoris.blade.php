    <div class="row g-sm-4 g-3" wire:poll.1000ms>
        @foreach($produitFav as $itemproduitFav)
        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
            <div class="product-box-3 theme-bg-white h-100">
                <div class="product-header">
                    <div class="product-image">
                        <a href="{{route('produit_details_index',$itemproduitFav->slug)}}">
                            @if(!is_null($itemproduitFav->photo))
                            <img src="{{ URL::asset('../Backend/images/Produit/'.$itemproduitFav->photo) }}"
                                class="img-fluid blur-up lazyload" alt="">
                            @endif
                        </a>

                        <div class="product-header-top" wire:ignore.self>
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
                        <p class="text-content mt-1 mb-2 product-content">Vous pouvez voir la description de se produit en affichant les details.</p>
                    
                        <h5 class="price">
                            <span class="theme-color">{{$itemproduitFav->prix}} FCFA</span>
                        </h5>
                        <div class="add-to-cart-box mt-2">
                            <button class="btn btn-add-cart addcart-button"
                                tabindex="0">Ajouter
                                <span class="add-icon">
                                    <i class="fa-solid fa-plus"></i>
                                </span>
                            </button>
                            <div class="cart_qty qty-box">
                                <div class="input-group">
                                    <button type="button" class="qty-left-minus"
                                        data-type="minus" data-field="">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                    <input class="form-control input-number qty-input"
                                        type="text" name="quantity" value="0">
                                    <button type="button" class="qty-right-plus"
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