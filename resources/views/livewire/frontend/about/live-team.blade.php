
@if($teamEquipe->count() > 0)
<section class="team-section section-lg-space">
        <div class="container-fluid-lg">
            <div class="about-us-title text-center">
                <h4 class="text-content">Notre Equipe</h4>
                <h2 class="center">Nos Membres a JIAM'S</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-user product-wrapper">



    @foreach($teamEquipe as $itemteamEquipe)
    <div>
                            <div class="team-box">
                                <div class="team-iamge">
                                    <img src="{{ URL::asset('../Backend/images/Team/'.$itemteamEquipe->photo) }}" class="img-fluid blur-up lazyload"
                                        alt="">
                                </div>

                                <div class="team-name">
                                    <h3>{{$itemteamEquipe->nom}} {{$itemteamEquipe->prenom}}</h3>
                                    <h5>{{$itemteamEquipe->profession}}</h5>
                                    <p>{{$itemteamEquipe->email}}</p>
                                    <ul class="team-media">
                                        <li>
                                            <a href="https://www.facebook.com/" class="fb-bg">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://in.pinterest.com/" class="pint-bg">
                                                <i class="fa-brands fa-pinterest-p"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://twitter.com/" class="twitter-bg">
                                                <i class="fa-brands fa-twitter"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://www.instagram.com/" class="insta-bg">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
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
