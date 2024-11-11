
        <div class="row g-4">
            <div class="col-xl-6">
                <div class="review-title">
                    <h4 class="fw-500">Avis des clients</h4>
                </div>

                <div class="d-flex">
                    <div class="product-rating">
                        <ul class="rating">
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star" class="fill"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                            <li>
                                <i data-feather="star"></i>
                            </li>
                        </ul>
                    </div>
                    <h6 class="ms-3">4.2 Of 5</h6>
                </div>

                <div class="rating-box">
                    <ul>
                        <li>
                            <div class="rating-list">
                                <h5>5 étoiles</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{$cinq_etoile_pourcent}}%" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100">
                                        {{$cinq_etoile_pourcent}}%
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="rating-list">
                                <h5>4 étoiles</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{$quatre_etoile_pourcent}}%" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100">
                                        {{$quatre_etoile_pourcent}}%
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="rating-list">
                                <h5>3 étoiles</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{$trois_etoile_pourcent}}%" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100">
                                        {{$trois_etoile_pourcent}}%
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="rating-list">
                                <h5>2 étoiles</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{$deux_etoile_pourcent}}%" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100">
                                        {{$deux_etoile_pourcent}}%
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="rating-list">
                                <h5>1 étoiles</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{$one_etoile_pourcent}}%" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100">
                                        {{$one_etoile_pourcent}}%
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="review-title">
                    <h4 class="fw-500">Ajouter une notes</h4>
                </div>

                <!-- Formulaire qui Note  -->
                <div class="row g-4">

                        <div class="col-10 mx-auto" >
                            <div class="product-rating" wire:ignore>
                                <ul class="rating" >
                                    <li>
                                        <i data-feather="star"  style="width:40px!important; height:20px!important;" class="@if($etoiles >= 1) fill @endif"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" style="width:40px!important; height:20px!important;" class="@if($etoiles >= 2) fill @endif"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" style="width:40px!important; height:20px!important;" class="@if($etoiles >= 3) fill @endif"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" style="width:40px!important; height:20px!important;" class="@if($etoiles >= 4) fill @endif"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" style="width:40px!important; height:20px!important;" class="@if($etoiles >= 5) fill @endif"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-7 mx-auto" style="margin-top: 3%!important;">
                            <input class="text-dark" wire:model.lazy="etoiles"  type="range" min="0"  max="5" > 
                        </div>


                        <div class="col-12">
                            <div class="form-floating theme-form-floating">
                                <textarea class="form-control" wire:model.lazy='details'
                                    placeholder="Laissez un commentaire ici"
                                    id="floatingTextarea2"
                                    style="height: 130px"></textarea>
                                <label for="floatingTextarea2">Ecrivez votre
                                    Commentaire</label>
                            </div>
                        </div>


                        <div class="col-6 mx-auto">
                            <div class="form-floating theme-form-floating">
                            <button wire:click='createRating'
                                class="btn btn-animation btn-md fw-bold btn-success mend-auto">Valider</button>
                            </div>
                        </div>

                </div>

            </div>

            <!-- <div class="col-12">
                <div class="review-title">
                    <h4 class="fw-500">Customer questions & answers</h4>
                </div>

                <div class="review-people">
                    <ul class="review-list">
                        <li>
                            <div class="people-box">
                                <div>
                                    <div class="people-image">
                                        <img src="../Frontend/assets/images/review/1.jpg"
                                            class="img-fluid blur-up lazyload"
                                            alt="">
                                    </div>
                                </div>

                                <div class="people-comment">
                                    <a class="name"
                                        href="javascript:void(0)">Tracey</a>
                                    <div class="date-time">
                                        <h6 class="text-content">14 Jan, 2022 at
                                            12.58 AM</h6>

                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star"
                                                        class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"
                                                        class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"
                                                        class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="reply">
                                        <p>Icing cookie carrot cake chocolate cake
                                            sugar plum jelly-o danish. Dragée dragée
                                            shortbread tootsie roll croissant muffin
                                            cake I love gummi bears. Candy canes ice
                                            cream caramels tiramisu marshmallow cake
                                            shortbread candy canes cookie.<a
                                                href="javascript:void(0)">Reply</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="people-box">
                                <div>
                                    <div class="people-image">
                                        <img src="../Frontend/assets/images/review/2.jpg"
                                            class="img-fluid blur-up lazyload"
                                            alt="">
                                    </div>
                                </div>

                                <div class="people-comment">
                                    <a class="name"
                                        href="javascript:void(0)">Olivia</a>
                                    <div class="date-time">
                                        <h6 class="text-content">01 May, 2022 at
                                            08.31 AM</h6>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star"
                                                        class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"
                                                        class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"
                                                        class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="reply">
                                        <p>Tootsie roll cake danish halvah powder
                                            Tootsie roll candy marshmallow cookie
                                            brownie apple pie pudding brownie
                                            chocolate bar. Jujubes gummi bears I
                                            love powder danish oat cake tart
                                            croissant.<a
                                                href="javascript:void(0)">Reply</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="people-box">
                                <div>
                                    <div class="people-image">
                                        <img src="../Frontend/assets/images/review/3.jpg"
                                            class="img-fluid blur-up lazyload"
                                            alt="">
                                    </div>
                                </div>

                                <div class="people-comment">
                                    <a class="name"
                                        href="javascript:void(0)">Gabrielle</a>
                                    <div class="date-time">
                                        <h6 class="text-content">21 May, 2022 at
                                            05.52 PM</h6>

                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star"
                                                        class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"
                                                        class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"
                                                        class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="reply">
                                        <p>Biscuit chupa chups gummies powder I love
                                            sweet pudding jelly beans. Lemon drops
                                            marzipan apple pie gingerbread macaroon
                                            croissant cotton candy pastry wafer.
                                            Carrot cake halvah I love tart caramels
                                            pudding icing chocolate gummi bears.
                                            Gummi bears danish cotton candy muffin
                                            marzipan caramels awesome feel. <a
                                                href="javascript:void(0)">Reply</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>