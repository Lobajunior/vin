    @if($produitBestReview->count() > 0)
    <div>
    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Les mieux notés</h3>
                                </div>

                                @foreach($produitBestReview->take(4) as $key => $itemproduit)
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="{{route('produit_details_index',$itemproduit->slug)}}" class="top-selling-image">
                                    @if(!is_null($itemproduit->photo))
                                        <img src="{{ URL::asset('../Backend/images/Produit/'.$itemproduit->photo) }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    @endif
                                    </a>

                                    <div class="top-selling-detail">
                                    <a href="{{route('produit_details_index',$itemproduit->slug)}}">
                                            <h5>{{ $itemproduit->libelle }}</h5>
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
                                        <h6> {{$itemproduit->prix}} FCFA</h6>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
        </div>
        @endif
