
    @if($listCategorieFoo->count() > 0)
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-title">
                            <h4>Categories</h4>
                        </div>

                        <div class="footer-contain">
                            <ul>
                                @foreach($listCategorieFoo as $item)
                                <li>
                                    <a href="{{ route('category_details_index',$item->slug) }}" class="text-content text-lowercase">{{$item->libelle}}</a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
    @endif

