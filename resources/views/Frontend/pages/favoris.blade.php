@extends('../Frontend/layouts/app')


@section('title')
    Mes favoris
@endsection


@section('content')

 <!-- Wishlist Section Start -->
    <section class="wishlist-section section-b-space">
        <div class="container-fluid-lg">
            <livewire:frontend.dashboard-user.page-favoris />
        </div>
    </section>
    <!-- Wishlist Section End -->

@endsection
