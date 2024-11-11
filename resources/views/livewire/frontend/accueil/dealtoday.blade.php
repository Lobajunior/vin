    <div class="deal-offer-box">
        <ul class="deal-offer-list">
            @if(isset($dealoftodays))
            @foreach($dealoftodays as $Itemdealoftodays)
                <li class="list-1">
                    <div class="deal-offer-contain">
                        <a href="shop-left-sidebar.html" class="deal-image">
                        @if(!is_null($Itemdealoftodays->photo))
                            <img src="{{ URL::asset('../Backend/images/Produit/'.$Itemdealoftodays->photo) }}"
                                class="img-fluid blur-up lazyload" alt="">
                            @endif
                        </a>

                        <a href="shop-left-sidebar.html" class="deal-contain">
                            <h5>{{$Itemdealoftodays->libelle}}</h5>
                            <h6>{{ number_format($Itemdealoftodays->PricePromoter,0,',',' ')}} <del>{{$Itemdealoftodays->prix}}</del> <span>FCFA</span></h6>
                        </a>
                    </div>
                </li>
            @endforeach
            @else
            <li class="list-1">
                    <div class="deal-offer-contain">
                        <a href="shop-left-sidebar.html" class="deal-image">
                            <img src="{{ asset('../Frontend/assets/images/vegetable/product/10.png') }}" class="blur-up lazyload"
                                alt="">
                        </a>

                        <a href="shop-left-sidebar.html" class="deal-contain">
                            <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                            <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                        </a>
                    </div>
                </li>
            @endif
        </ul>
    </div>