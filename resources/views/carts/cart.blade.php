@extends('layout.layout')


@section('content')
    @php $subtotal=0; @endphp
    <section class="cart_area">
        <div class="container">
            @guest
                <div class="alert alert-danger" role="alert">
                    You must log in before Checkout
                </div>
            @endguest

            <div class="col-md-12 form-group">
                @include('alerts.success-alert')
            </div>

            <div class="col-md-12 form-group">
                @include('alerts.error-alert')
            </div>
            @if($carts->count() > 0)
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Product start -->
                            @forelse($carts as $cart)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <a href="{{ route('single_product.show' , [encrypt($cart->product->id)]) }}">
                                                    @if ($cart->product->images->isNotEmpty())
                                                        <img style="width: 100%; height: 178px;"
                                                             src="{{ asset($cart->product->images->first()->image_name) }}"
                                                             alt=""/>
                                                    @else
                                                        <img style="width: 100%; height: 74px;"
                                                             src="{{ asset('img/default_image.png') }}"
                                                             alt=""/>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a class="active"
                                                   href="{{ route('single_product.show' , [encrypt($cart->product->id)]) }}">
                                                    <p>{{ $cart->product->name }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{session()->get('current_currency') }} {{ convertPrice($cart->product->price)}}</h5>
                                    </td>

                                    <td>
                                        <h5>{{ $cart->quantity }}</h5>
                                    </td>
                                    <td>

                                        @php $subtotal += $cart->product->price * $cart->quantity; @endphp

                                        <h5>{{session()->get('current_currency') }} {{ convertPrice($cart->product->price * $cart->quantity)}}</h5>

                                    </td>
                                    <td>
                                        <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>
                                        <!-- <button type="button" class="btn btn-danger">Remove</button> -->
                                    </td>
                                </tr>
                                @endforeach
                                <!-- Product end -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>{{session()->get('current_currency') }} {{ convertPrice($subtotal)}}</h5>
                                    </td>
                                    <td></td>

                                </tr>

                                <tr class="out_button_area">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="checkout_btn_inner">
                                            <a class="gray_btn" href="{{ route('home') }}">Continue Shopping</a>

                                            <a class="main_btn" href="{{ route('checkout.index') }}">Proceed to
                                                checkout</a>
                                        </div>
                                    </td>
                                    <td></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="text-center">
                    <h1>Cart is Empty</h1>
                    <div class="checkout_btn_inner">
                        <a class="gray_btn" href="{{ route('home') }}">Continue Shopping</a>
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection
