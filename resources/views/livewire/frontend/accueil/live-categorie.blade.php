<div>

@if($listCategorie->count() > 0)
<section class="category-section-3">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Achats par Catégorie</h2>
            </div>

   <div class="category-slider-2 product-wrapper no-arrow fadeInUp">
   @if(isset($listCategorie))
    @foreach($listCategorie as $listCategories)
         <div>
                            <div class="category-box-list">
                                <a href="{{ route('category_details_index',$listCategories->slug) }}" class="category-name">
                                    <h4 class="text-lowercase"> {{Illuminate\Support\Str::limit($listCategories->libelle , 14, '...')}}</h4>

                                </a>
                                <div class="category-box-view">
                                    <a href="{{ route('category_details_index',$listCategories->slug) }}">
                                    @if(!is_null($listCategories->logo) && $listCategories->logo != 'logoCat.jpg')
                                        <img src="{{ URL::asset('../Backend/images/Categorie/'.$listCategories->logo) }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    @endif
                                    </a>
                                    <button onclick="location.href = '/category_details/{{$listCategories->slug}}';" class="btn shop-button">
                                        <span>Voir plus</span>
                                        <i class="fas fa-angle-right"></i>
                                    </button>
                                </div>
                            </div>
         </div>
    @endforeach
    @endif
    </div>


    </div>
</section>
@endif

</div>
