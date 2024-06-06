@extends('layout.layout')


@section('content')
@php $subtotal=0; @endphp
<section class="cart_area">
  <div class="container">

    <div class="col-md-12 form-group">
      @include('alerts.success-alert')
    </div>

    <div class="col-md-12 form-group">
      @include('alerts.error-alert')
    </div>
      @if($wishlists->count() > 0)

      <div class="cart_inner">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Price</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <!-- Product start -->
            @foreach($wishlists as $wishlist)
            <tr>
              <td>
                <div class="media">
                  <div class="d-flex">
                    <a href="{{ route('single_product.show' , [encrypt($wishlist->product->id)]) }}">
                      @if ($wishlist->product->images->isNotEmpty())
                      <img style="width: 100%; height: 178px;" src="{{ asset($wishlist->product->images->first()->image_name) }}" alt="" />
                      @else
                            <img style="width: 100%; height: 74px;"
                                 src="{{ asset('img/default_image.png') }}"
                                 alt=""/>
                      @endif
                    </a>
                  </div>
                  <div class="media-body">
                    <a class="active" href="{{ route('single_product.show' , [encrypt($wishlist->product->id)]) }}">
                      <p>{{ $wishlist->product->name }}</p>
                    </a>
                  </div>
                </div>
              </td>
              <td>
                <h5>{{session()->get('current_currency') }} {{ convertPrice($wishlist->product->price)}}</h5>
              </td>



              <td style="    display: flex;
    justify-content: space-around;">


                <form action="{{ route('cart.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">

                  <button type="submit" class="btn btn-success">Add To Cart</button>
                </form>


                <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Remove</button>
                </form>


                <!-- <button type="button" class="btn btn-danger">Remove</button> -->
              </td>
            </tr>
            @endforeach
            <!-- Product end -->



          </tbody>
        </table>
      </div>
          @else
              <div class="text-center">
                  <h1>Wishlist is Empty</h1>
                  <div class="checkout_btn_inner">
                      <a class="gray_btn" href="{{ route('home') }}">Continue Shopping</a>
                  </div>
              </div>
          @endif
    </div>
  </div>
</section>


@endsection
