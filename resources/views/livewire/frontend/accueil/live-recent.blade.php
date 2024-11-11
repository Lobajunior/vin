
@if($produit_recent->count() > 0)
<div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Recemment ajouter</h3>
                                </div>
                                @foreach($produit_recent as $key => $produit_recents)
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="{{route('produit_details_index',$produit_recents->slug)}}" class="top-selling-image">
                                        @if(!is_null($produit_recents->photo))
                                        <img src="{{ URL::asset('../Backend/images/Produit/'.$produit_recents->photo) }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                        @endif
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="{{route('produit_details_index',$produit_recents->slug)}}">
                                            <h5>{{$produit_recents->libelle}}</h5>
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
                                        <h6> {{$produit_recents->prix}} FCFA</h6>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
</div>
@endif

