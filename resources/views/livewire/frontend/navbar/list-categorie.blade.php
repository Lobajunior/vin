<div>

<ul class="category-list">
    @foreach($Listcategorie as $itemListcategorie)
                                    <li class="onhover-category-list">
                                        <a href="{{ route('category_details_index',$itemListcategorie->slug) }}" class="category-name">
                                            <h6 style="width: 90%!important;font-family: Pacifico,cursive; text-transform: lowercase;">{{ $itemListcategorie->libelle}}
                                            <span class="title-leaf" style="margin-top: 0px!important;">
                                                <svg class="icon-width" style="height: 10px!important; width: 8px!important;">
                                                    <use xlink:href="../Frontend/assets/svg/leaf.svg#leaf"></use>
                                                 </svg>
                                             </span></h6>
                                            <i class="fa-solid fa-angle-right"></i>
                                            
                                        </a>

                                        @if($itemListcategorie->souscategorie()->count() > 3)
                                        <div class="onhover-category-box">
                                            <div class="list-1">
                                                
                                                <ul>
                                                    @foreach($itemListcategorie->souscategorie()->take(10)->get() as $souscat )
                                                    <li>
                                                        <a href="{{ route('category_details_index',$itemListcategorie->slug) }}">{{ $souscat->libelle}}</a>
                                                    </li>
                                                    @endforeach
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        @endif

                                    </li>
@endforeach
                                </ul>

</div>
