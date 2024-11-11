<div>
    <div
                        class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                        @foreach($productItem as $key => $parameters)
                        <div>
                            <div class="product-box-3 h-100 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="{{route('produit_details_index',$parameters->slug)}}">
                                            <img src="{{ URL::asset('../Backend/images/Produit/'.$parameters->photo) }}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>

                                       
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <div class="product-detail">
                                    @foreach($parameters->souscategorie()->get() as $souscatofproduct)
                                        <span class="span-name">{{\Illuminate\Support\Str::words($souscatofproduct->libelle,2,'...')}}</span>
                                        @endforeach
                                        <a href="{{route('produit_details_index',$parameters->slug)}}">
                                            <h5 class="name">{{\Illuminate\Support\Str::words($parameters->libelle,3,'...')}}</h5>
                                        </a>
                                        <p class="text-content mt-1 mb-2 product-content">Cheesy feet cheesy grin brie.
                                            Mascarpone cheese and wine hard cheese the big cheese everyone loves smelly
                                            cheese macaroni cheese croque monsieur.</p>
                                        <div class="product-rating mt-2">
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
                                        </div>
                                        <h6 class="unit">250 ml</h6>
                                        <h5 class="price"><span class="theme-color">{{$parameters->prix}} FCFA</span> 
                                        </h5>
                                        <livewire:frontend.panier.live-addcar-fourboutton id="{{$parameters->id}}"/>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    


</div>
