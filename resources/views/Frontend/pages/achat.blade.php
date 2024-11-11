

@extends('../Frontend/layouts/app')


@section('title')
    Achetez
@endsection


@section('content')


    <!-- Product Section Start -->
    <section class="product-section pt-0">
        <div class="container-fluid p-0">
            <div class="custom-row">
                    <div class="section-b-space">
                        <div class="row g-md-4 g-3">
                            <div class="col-xxl-12 col-xl-12 col-md-12">
                                <div class="banner-contain hover-effect">
                                    <img src="../Frontend/assets/images/banner6.jpg" class="bg-img blur-up lazyload"
                                        alt="">
                                    <div class="banner-details p-center-left p-sm-5 p-4">
                                        <div>
                                            <h2 class="text-kaushan fw-normal orange-color">C'est repartit</h2>
                                            <h3 class="mt-2 mb-3 text-white">PRENEZ UNE JOURNÉE!</h3>
                                            <p class="text-content banner-text text-white opacity-75 d-md-block d-none">
                                                In publishing and graphic design, Lorem ipsum is a placeholder text
                                                commonly used to demonstrate.</p>
                                            <button onclick="location.href = '#achats';"
                                                class="btn btn-animation btn-sm mend-auto">Achetez maintenant <i
                                                    class="fa-solid fa-arrow-right icon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="achats"></div>
                  <livewire:frontend.achats.live-list-achatbysouscat />

                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->


@endsection