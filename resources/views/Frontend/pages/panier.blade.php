@extends('../Frontend/layouts/app')


@section('title')
    Mon panier
@endsection


@section('content')


  <!-- Cart Section Start -->
  <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <livewire:frontend.panier.live-panier />
        </div>
    </section>
    <!-- Cart Section End -->

@endsection
