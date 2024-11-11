<div>
    

 <!-- Contact Box Section Start -->
 <section class="contact-box-section">
        <div class="container-fluid-lg">
            <div class="row g-lg-5 g-3">
           
                <div class="col-lg-6">
                    <div class="left-sidebar-box">
                    <form action="{{ route('register') }}" method="POST">
                @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-image">
                                    <img src="{{ asset('../Frontend/assets/images/inner-page/contact-us.png') }}"
                                        class="img-fluid blur-up lazyloaded" alt="">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="contact-title">
                                    <h3>Informations personnelles </h3>
                                </div>

                                <div class="contact-detail">
                                    <div class="row g-3 mb-3">
                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box" style="padding: 6%!important; border-radius: 5px">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Nom</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <div class="custom-input">
                                                        <input type="text" wire:model.debounce.2000ms="nom" name="nom" class="form-control" id="exampleFormControlInput"
                                                            placeholder="Entrer un Nom Name">
                                                    </div>
                                                </div>
                                                @error('nom') <span class="text-description text-danger">{{$message}} </span> @enderror
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box" style="padding: 8%!important;border-radius: 5px">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-circle-user"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Prenoms</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <div class="custom-input">
                                                            <input type="text" wire:model.debounce.2000ms="prenom"  name="prenom" class="form-control" 
                                                                placeholder="Entrer un/des prenom(s)">
                                                        </div>
                                                </div>
                                                @error('prenom') <span class="text-description text-danger">{{$message}} </span> @enderror
                                            </div>
                                        </div>

                                        <div class="col-xxl-12 col-lg-12 col-sm-12">
                                            <div class="contact-detail-box" style="padding: 6%!important;border-radius: 5px">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Email</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <div class="custom-input">
                                                        <input type="email" class="form-control"  wire:model.debounce.2000ms="email"  name="email" id="exampleFormControlInput2"
                                                            placeholder="Enter Email Address">
                                                    </div>
                                                </div>
                                                @error('email') <span class="text-description text-danger">{{$message}} </span> @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="title d-xxl-none d-block">
                        <h2>Autres Informations</h2>
                    </div>
                    <div class="right-sidebar-box"  style="padding: 5%!important; border-radius: 5px">
                        <div class="row">
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput" class="form-label">Contact</label>
                                    <div class="custom-input">
                                        <input type="text" wire:model.debounce.2000ms="contact"  name="contact" class="form-control" 
                                            placeholder="Enter votre contact">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                     @error('contact') <span class="text-description text-danger">{{$message}} </span> @enderror
                                </div>
                            </div>

                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput1" class="form-label">Ville</label>
                                    <div class="custom-input">
                                        <input type="text" wire:model.debounce.2000ms="ville"  name="ville" class="form-control" 
                                            placeholder="Entrer Votre Ville">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                @error('ville') <span class="text-description text-danger">{{$message}} </span> @enderror
                                </div> 
                            </div>

                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label  class="form-label">Adresse (FACULTATIF)</label>
                                    <div class="custom-input">
                                        <input type="text" wire:model.debounce.2000ms="adresse"  name="adresse" class="form-control"
                                            placeholder="Enter votre adresse ">
                                        <i class="fa-solid fa-location"></i>
                                    </div>
                                    @error('adresse') <span class="text-description text-danger">{{$message}} </span> @enderror
                                </div>
                            </div>

                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlInput3" class="form-label">Profession (FACULTATIF)</label>
                                    <div class="custom-input">
                                        <input type="text" wire:model.debounce.2000ms="profession"  name="profession" class="form-control"
                                            placeholder="Enter votre profession ">
                                            <i class="fa-brands fa-discord"></i>
                                    </div>
                                    @error('profession') <span class="text-description text-danger">{{$message}} </span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label  class="form-label">Mot de passe</label>
                                    <div class="custom-input">
                                        <input type="password" wire:model.debounce.2000ms="password"  name="password" class="form-control"
                                            placeholder="Enter votre Mot de passe ">
                                        <i class="fa-solid fa-eye-low-vision"></i>
                                    </div>
                                    @error('password') <span class="text-description text-danger">{{$message}} </span> @enderror
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="mb-md-4 mb-3 custom-form">
                                    <label for="exampleFormControlTextarea" class="form-label">Confirmation de Mot de passe</label>
                                    <div class="custom-input">
                                        <input type="password" wire:model.debounce.2000ms="confirm_password"  name="confirm_password" class="form-control"
                                            placeholder="confirm_passwords ">
                                        <i class="fa-solid fa-eye-low-vision"></i>
                                    </div>
                                    @error('confirm_password') <span class="text-description text-danger">{{$message}} </span> @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-animation btn-md fw-bold ms-auto">Enregistrer</button>
                    </form>
                    </div>
                </div>
            
            </div>
        </div>
    </section>
    <!-- Contact Box Section End -->




</div>
