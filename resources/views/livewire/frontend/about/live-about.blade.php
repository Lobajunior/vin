@if($apropos && !is_null($apropos->image))  
        <div class="row gx-xl-5 gy-xl-0 g-3 ratio_148_1">
                <div class="col-xl-6 col-12">
                    <div class="row g-sm-4 g-2">
                        <div class="col-6">
                            <div class="fresh-image-2">
                                <div>
                                @if($apropos && !is_null($apropos->image))
                                    <img src="{{ URL::asset('../Backend/images/About/'.$apropos->image) }}"
                                        class="bg-img blur-up lazyload" alt="">
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="fresh-image">
                                <div>
                                @if($apropos && !is_null($apropos->image))
                                    <img src="{{ URL::asset('../Backend/images/About/'.$apropos->image) }}"
                                        class="bg-img blur-up lazyload" alt="">
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-12">
                    <div class="fresh-contain p-center-left">
                        <div>
                            <div class="review-title">
                                <h4>A propos de nous</h4>
                                <h2>Nous sommes JIAM'S coorporation</h2>
                            </div>

                            <div class="delivery-list">
                                <p class="text-content">{!! $apropos->description !!}</p>

                                <ul class="delivery-box">
                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="../Frontend/assets/svg/3/delivery.svg" class="blur-up lazyload" alt="">
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">Free delivery for all orders</h5>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="../Frontend/assets/svg/3/leaf.svg" class="blur-up lazyload" alt="">
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">Only fresh foods</h5>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="../Frontend/assets/svg/3/delivery.svg" class="blur-up lazyload" alt="">
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">Free delivery for all orders</h5>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <img src="../Frontend/assets/svg/3/leaf.svg" class="blur-up lazyload" alt="">
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">Only fresh foods</h5>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endif


