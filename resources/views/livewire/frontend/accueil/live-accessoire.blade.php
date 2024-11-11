@if($produitAccessoire->count() > 0)
@foreach($produitAccessoire as $itemproduitAccessoire)
<div>
        <div class="product-box product-box-bg wow fadeInUp">
            <div class="product-image">
                <a href="{{route('produit_details_index',$itemproduitAccessoire->slug)}}">
                @if(!is_null($itemproduitAccessoire->photo))
                    <img src="{{ URL::asset('../Backend/images/Produit/'.$itemproduitAccessoire->photo) }}"
                        class="img-fluid blur-up lazyload" alt="">
                        @endif
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

                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                        <a href="wishlist.html" class="notifi-wishlist">
                            <i data-feather="heart"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="product-detail">
                <a href="{{route('produit_details_index',$itemproduitAccessoire->slug)}}">
                    <h6 class="name">
                     {{\Illuminate\Support\Str::limit($itemproduitAccessoire->libelle,20,'...')}}
                    </h6>
                </a>

                <h5 class="sold text-content">
                    <span class="theme-color price">{{$itemproduitAccessoire->prix}} FCFA</span>
                </h5>

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
                            <i data-feather="star"></i>
                        </li>
                    </ul>

                    <h6 class="theme-color">In Stock</h6>
                </div>

                <livewire:frontend.panier.live-addcar-fourboutton id="{{$itemproduitAccessoire->id}}"/>

            </div>
        </div>
</div>
@endforeach

@else
<div>
    <h5 class="text-warning text-centered">Aucun Accessoire pour l'instant</h5>
</div>
@endif
