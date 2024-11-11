<div class="col-xxl-9 col-xl-8 col-lg-7 order-lg-2">
    <div class="left-search-box">
        <div class="search-box">
            <input type="search" class="form-control"  wire:model="search"
                placeholder="Recherche....">
        </div>
    </div>

    <div class="row g-4 mt-2">
       
    @if($blogList->count() > 0)
        @foreach($blogList as $itemblogList)
        <div class="col-12">
            <div class="blog-box blog-list wow fadeInUp" data-wow-delay="0.1s">
                <div class="blog-image">
                    <a href="/blog_details/nomblog">
                    @if(!is_null($itemblogList->photo))
                        <img src="{{ URL::asset('Backend/images/Blog/'.$itemblogList->photo) }}" class="blur-up lazyload"
                            alt="">
                            @endif
                    </a>
                    
                </div>

                <div class="blog-contain blog-contain-2">
                    <div class="blog-label">
                        <span class="time"><i data-feather="clock"></i> <span>{{date('j M, Y', strtotime($itemblogList->created_at))}}</span></span>
                        <span class="super"><i data-feather="user"></i> <span>{{$compte_entreprise->nom}} {{$compte_entreprise->prenom}}</span></span>
                    </div>
                    <a href="/blog_details/nomblog">
                        <h3>{{$itemblogList->titre}}.</h3>
                    </a> 
                    @if(!is_null($itemblogList->description))
                    <p> {{ \Illuminate\Support\Str::words( $itemblogList->description  , 10,'...') }} </p>
                    @else
                    <p>Aucune description disponible pour ce blog</p>
                    @endif
                    <button onclick="location.href = '/blog_details/nomblog';" class="blog-button">Voir plus <i class="fa-solid fa-right-long"></i></button>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-12">
            <h5 class="text-dark text-center">Aucun Blog Trouver</h5>
        </div>
        @endif
    </div>

    <nav class="custome-pagination">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0)" tabindex="-1">
                    <i class="fa-solid fa-angles-left"></i>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0)">
                    <i class="fa-solid fa-angles-right"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>