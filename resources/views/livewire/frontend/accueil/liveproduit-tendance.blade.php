@if($produitTendance->count() > 0)
<div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Produits en tendances</h3>
                                </div>

                                 @foreach($produitTendance as $key => $produitTendances)
                                 
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="{{route('produit_details_index',$produitTendances->slug)}}" class="top-selling-image">
                                    @if(!is_null($produitTendances->photo))
                                        <img src="{{ URL::asset('../Backend/images/Produit/'.$produitTendances->photo) }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    @endif
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="{{route('produit_details_index',$produitTendances->slug)}}">
                                            <h5>{{ $produitTendances->libelle }}</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star"   class="@if($sum_rating_produit[$key] >= 1) fill @endif"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"  class="@if($sum_rating_produit[$key] >= 2) fill @endif"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"  class="@if($sum_rating_produit[$key] >= 3) fill @endif"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"  class="@if($sum_rating_produit[$key] >= 4) fill @endif"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"  class="@if($sum_rating_produit[$key] >= 5) fill @endif"></i>
                                                </li>
                                            </ul>
                                            <span>({{$sum_rating_produit[$key]}})</span>
                                        </div>
                                        <h6> {{$produitTendances->prix}} FCFA</h6>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
</div>
@endif
