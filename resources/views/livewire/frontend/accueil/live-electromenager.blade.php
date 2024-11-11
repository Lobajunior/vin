@if($ElectromenagerCategorie->count() > 0)
<section class="product-section-3">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Electroménager</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-border border-row">
                        <div class="slider-6_2 no-arrow">
 
 
 
 @foreach($ElectromenagerCategorie as $ElectromenagerCategorieItem)
 @foreach($ElectromenagerCategorieItem->souscategorie()->get() as $SouscatSmallElectromenager)
@foreach($SouscatSmallElectromenager->produit()->get() as $productSmallElectromenager)
<div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="{{route('produit_details_index',$productSmallElectromenager->slug)}}">
                                            @if(!is_null($productSmallElectromenager->photo))
                                            <img src="{{ URL::asset('../Backend/images/Produit/'.$productSmallElectromenager->photo) }}"
                                                class="img-fluid blur-up lazyload" alt="">
                                            @endif
                                        </a>
                                        <ul class="product-option justify-content-around">
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

                                            <livewire:frontend.tooltip.liked id="{{$productSmallElectromenager->id}}"/>

                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="{{route('produit_details_index',$productSmallElectromenager->slug)}}">
                                            <h6 class="name name-2 h-100">{{$productSmallElectromenager->libelle}}</h6>
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
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">{{$productSmallElectromenager->prix}} FCFA</h6>

                                            <livewire:frontend.panier.live-addcar-twoboutton id="{{$productSmallElectromenager->id}}"/>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
    @endforeach
 @endforeach
 @endforeach




 
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endif