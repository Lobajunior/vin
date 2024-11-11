<div>

                    <ul class="category-list custom-padding custom-height">

                    @foreach($filtreByCategorie as $itemfiltreByCategorie)
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <a href="{{ route('category_details_index',$itemfiltreByCategorie->slug) }}">
                                                  
                                                           <span class="name">{{$itemfiltreByCategorie->libelle}}</span>
                                                            <!-- <span class="number">( {{$itemfiltreByCategorie->souscategorie()->count()}} )</span> -->
                                                            
                                                        </a>
                                                    </div>
                                                </li>
                    @endforeach


                                            </ul>


</div>
