@extends('../Frontend/layouts/app')


@section('title')
    Comparez
@endsection


@section('content')

    <!-- Compare Section Start -->
    <section class="compare-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table compare-table">
                            <tbody>
                                <tr>
                                    <th>Product</th>
                                    <td>
                                        <a class="text-title" href="product-left-thumbnail.html">Daily Shine Shampoo</a>
                                    </td>
                                    <td>
                                        <a class="text-title" href="product-left-thumbnail.html">Intence Repair
                                            Shampoo</a>
                                    </td>
                                    <td>
                                        <a class="text-title" href="product-left-thumbnail.html">Anti Dandruff
                                            Solution</a>
                                    </td>
                                    <td>
                                        <a class="text-title" href="product-left-thumbnail.html">Repair & Shine
                                            Shampoo</a>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Images</th>
                                    <td>
                                        <a href="product-left-thumbnail.html" class="compare-image">
                                            <img src="../Frontend/assets/images/inner-page/compare/1.png"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="product-left-thumbnail.html" class="compare-image">
                                            <img src="../Frontend/assets/images/inner-page/compare/2.png"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="product-left-thumbnail.html" class="compare-image">
                                            <img src="../Frontend/assets/images/inner-page/compare/3.png"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="product-left-thumbnail.html" class="compare-image">
                                            <img src="../Frontend/assets/images/inner-page/compare/4.png"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Hair Type</th>
                                    <td class="text-content">Normal</td>
                                    <td class="text-content">Oily</td>
                                    <td class="text-content">Dry</td>
                                    <td class="text-content">Normal</td>
                                </tr>

                                <tr>
                                    <th>Item Form</th>
                                    <td class="text-content">Gel</td>
                                    <td class="text-content">Liquid</td>
                                    <td class="text-content">Gel</td>
                                    <td class="text-content">Gel</td>
                                </tr>

                                <tr>
                                    <th>Price</th>
                                    <td class="price text-content">$20.23</td>
                                    <td class="price text-content">$26.90</td>
                                    <td class="price text-content">$12.23</td>
                                    <td class="price text-content">$15.85</td>
                                </tr>

                                <tr>
                                    <th>Availability</th>
                                    <td class="text-content">In Stock</td>
                                    <td class="text-content">In Stock</td>
                                    <td class="text-content">In Stock</td>
                                    <td class="text-content">In Stock</td>
                                </tr>

                                <tr>
                                    <th>Rating</th>
                                    <td>
                                        <div class="compare-rating">
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
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span class="text-content">(20 Raring)</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="compare-rating">
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
                                            <span class="text-content">(25 Raring)</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="compare-rating">
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
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                            </ul>
                                            <span class="text-content">(50 Raring)</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="compare-rating">
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
                                            <span class="text-content">(30 Raring)</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Weight</th>
                                    <td class="text-content">5.00kg</td>
                                    <td class="text-content">1.00kg</td>
                                    <td class="text-content">0.75kg</td>
                                    <td class="text-content">0.50kg</td>
                                </tr>

                                <tr>
                                    <th>Purchase</th>
                                    <td>
                                        <button onclick="location.href = 'cart.html';"
                                            class="btn btn-animation btn-sm w-100">Add To Cart</button>
                                    </td>
                                    <td>
                                        <button onclick="location.href = 'cart.html';"
                                            class="btn btn-animation btn-sm w-100">Add To Cart</button>
                                    </td>
                                    <td>
                                        <button onclick="location.href = 'cart.html';"
                                            class="btn btn-animation btn-sm w-100">Add To Cart</button>
                                    </td>
                                    <td>
                                        <button onclick="location.href = 'cart.html';"
                                            class="btn btn-animation btn-sm w-100">Add To Cart</button>
                                    </td>
                                </tr>

                                <tr>
                                    <th></th>
                                    <td>
                                        <a href="javascript:void(00" class="text-content remove_column"><i
                                                class="fa-solid fa-trash-can me-2"></i> Remove</a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(00" class="text-content remove_column"><i
                                                class="fa-solid fa-trash-can me-2"></i> Remove</a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(00" class="text-content remove_column"><i
                                                class="fa-solid fa-trash-can me-2"></i> Remove</a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(00" class="text-content remove_column"><i
                                                class="fa-solid fa-trash-can me-2"></i> Remove</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Compare Section End -->

@endsection
