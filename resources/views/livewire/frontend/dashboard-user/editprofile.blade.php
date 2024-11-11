    <div wire:ignore.self class="tab-pane fade show" id="pills-profile" role="tabpanel"
        aria-labelledby="pills-profile-tab">
        <div class="dashboard-profile">
            <div class="title">
                <h2>Mon Profile</h2>
                <span class="title-leaf">
                    <svg class="icon-width bg-gray">
                        <use xlink:href="../Frontend/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>

            <div class="profile-detail dashboard-bg-box">
                <div class="dashboard-title">
                    <h3>Nom du profile</h3>
                </div>
                <div class="profile-name-detail">
                    <div class="d-sm-flex align-items-center d-block">
                        <h3>{{ Auth::user()->prenom}} {{ Auth::user()->nom}}</h3>
                        <div class="product-rating profile-rating">
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
                    </div>

                    <a href="javascript:void(0)" data-bs-toggle="modal"
                        data-bs-target="#edit-profile">Edit</a>
                </div>

                <div class="location-profile">
                    <ul>
                        <li>
                            <div class="location-box">
                                <i data-feather="map-pin"></i>
                                <h6>{{ Auth::user()->adresse}}</h6>
                            </div>
                        </li>

                        <li>
                            <div class="location-box">
                                <i data-feather="mail"></i>
                                <h6>{{ Auth::user()->email}}</h6>
                            </div>
                        </li>

                    </ul>
                </div>

                <div class="profile-description">
                    <p>Residences can be classified by and how they are connected to
                        neighbouring residences and land. Different types of housing tenure can
                        be used for the same physical type.</p>
                </div>
            </div>

            <div class="profile-about dashboard-bg-box">
                <div class="row">
                    <div class="col-xxl-7">
                        <div class="dashboard-title mb-3">
                            <h3>A propos de moi</h3>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Genre :</td>
                                        <td>{{ Auth::user()->genre}}</td>
                                    </tr>
                                    <tr>
                                        <td>Birthday :</td>
                                        <td>{{ date('d/m/Y', strtotime(Auth::user()->birth_date)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Numéros de téléphone :</td>
                                        <td>
                                            <a href="tel:{{ Auth::user()->phone}}"> +225 {{ Auth::user()->phone}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Adresse :</td>
                                        <td>{{ Auth::user()->adresse}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="dashboard-title mb-3">
                            <h3>{{ Auth::user()->email}}</h3>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Email :</td>
                                        <td>
                                            <a href="javascript:void(0)">{{ Auth::user()->email}}
                                               </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>profession :</td>
                                        @if(!is_null(Auth::user()->profession))
                                        <td>
                                            <a href="javascript:void(0)">{{ Auth::user()->profession}}
                                               </a>
                                        </td>
                                        @else
                                        <td>
                                           Non specifier
                                        </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-xxl-5">
                        <div class="profile-image">
                            <img src="../Frontend/assets/images/inner-page/dashboard-profile.png"
                                class="img-fluid blur-up lazyload" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>







        <!-- Edit Profile Modal Start -->
        <div wire:ignore.self class="modal fade theme-modal" id="edit-profile" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Modifier mes Infos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent='changeUser'>
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Nom</label>
                                <input type="text" class="form-control" wire:model.lazy='nom' placeholder="Nom...">
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Prenoms</label>
                                <input type="text" class="form-control" wire:model.lazy='prenom' placeholder="Prenoms...">
                            </div>
                            <div class="mb-3">
                                <label for="emailAddress" class="form-label">Email</label>
                                <input type="email" class="form-control" wire:model.lazy='email' placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="established" class="form-label">Contacts</label>
                                <input type="text" class="form-control" wire:model.lazy='contact' placeholder="contact">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">genre</label>
                                <input type="text" class="form-control"  placeholder="Grocery">
                            </div>
                            <div class="mb-3">
                                <label for="street" class="form-label">adresse</label>
                                <input type="text" class="form-control" wire:model.lazy='adresse' placeholder="Google searchBar">
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">profession</label>
                                <input type="text" class="form-control" wire:model.lazy='profession' placeholder="107 Veltri Drive">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-animation btn-md fw-bold"
                            data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn theme-bg-color btn-md fw-bold text-light"
                            >Sauvegarder</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Profile Modal End -->


    </div>

    
