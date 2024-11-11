<div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
            aria-controls="panelsStayOpen-collapseOne">
            Produits Recents
        </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-headingOne">
        <div class="accordion-body pt-0">
            <div class="recent-post-box">
                @if($produit_recent->count() > 0)
                @foreach($produit_recent as $itemproduit_recent)
                <div class="recent-box">
                    <a href="{{route('produit_details_index',$itemproduit_recent->slug)}}" class="recent-image">
                        @if(!is_null($itemproduit_recent->photo))
                            <img src="{{ URL::asset('../Backend/images/Produit/'.$itemproduit_recent->photo) }}"
                                class="img-fluid blur-up lazyload" alt="">
                            @endif
                    </a>

                    <div class="recent-detail">
                        <a href="{{route('produit_details_index',$itemproduit_recent->slug)}}">
                            <h5 class="recent-name">{{$itemproduit_recent->libelle}}</h5>
                        </a>
                        <h6>{{date('j M, Y', strtotime($itemproduit_recent->created_at))}}<i data-feather="thumbs-up"></i></h6>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>