
<div>
<!-- Blog Section Start -->
@if($listBlog->count() > 0)
<section class="section-lg-space">
        <div class="container-fluid-lg">
            <div class="about-us-title text-center">
                <h4 class="text-content">Nos blog</h4>
                <h2 class="center">Nos Derniers Blog</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-5 ratio_87">
                        @foreach($listBlog as $itemlistBlog)
                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <div class="blog-image">
                                        <a href="blog-detail.html" class="rounded-3">
                                            <img src="{{ URL::asset('Backend/images/Blog/'.$itemlistBlog->photo) }}" class="bg-img blur-up lazyload"
                                                alt="">
                                        </a>
                                    </div>
                                </div>

                                <a href="blog-detail.html" class="blog-detail d-block">
                                    @foreach($itemlistBlog->categorieblog()->get() as $catBlog)
                                    <h6 class="text-danger">{{$catBlog->libelle}}</h6>
                                    @endforeach
                                    <h5>{{$itemlistBlog->titre}}</h5>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
    <!-- Blog Section End -->
    </div>