@if($best_categorie->count() > 0)

<section>
    <div class="container-fluid-lg">

            <div class="title">
                <h2>Meilleurs Catégorie</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="../Frontend/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>


        <div class="row">
            <div class="col-12">


                <div class="slider-4-1 ratio_65 no-arrow product-wrapper">
                    @foreach($best_categorie as $itembest_categorie)
                    <div>
                        <div class="product-slider wow fadeInUp">
                        @if(!is_null($itembest_categorie->banner) && $itembest_categorie->banner != 'banner.jpg')
                            <a href="/category_details/{{$itembest_categorie->slug}}" class="product-slider-image">
                                <img src="{{ URL::asset('../Backend/images/Categorie/'.$itembest_categorie->banner) }}" class="w-100 blur-up lazyload rounded-3"
                                    alt="">
                            </a>
                            @endif

                            <div class="product-slider-detail">
                                <div>
                                    <a href="/category_details/{{$itembest_categorie->slug}}" class="d-block">
                                        <h3 class="text-title">{{\Illuminate\Support\Str::words($itembest_categorie->libelle,3,'...')}}</h3>
                                    </a>
                                    <h5>{{\Illuminate\Support\Str::words($itembest_categorie->description,4,'...')}}</h5>
                                    <button onclick="location.href = '/category_details/{{$itembest_categorie->slug}}';"
                                        class="btn btn-animation product-button btn-sm">Voir plus <i
                                            class="fa-solid fa-arrow-right icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>  



            </div>
        </div>
    </div>
</section>
@endif