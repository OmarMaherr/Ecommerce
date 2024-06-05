@extends('layout.layout')


@section('content')





    <section class="inspired_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>{{$category->name}}</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach($products as $product)

                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                @if($product->images->isNotEmpty())
                                    <img class="img-fluid w-100" src="{{ asset($product->images->first()->image_name) }}" alt="" />
                                @else
                                    <!-- If no images are found, display a placeholder image -->
                                    <img class="img-fluid w-100" src="{{asset('img/logo.png') }}" alt="" />
                                @endif
                                <div class="p_icon">
                                    <a href="{{ route('single_product.show' , [encrypt($product->id)]) }}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <form class="add_to_cart_icon" action="{{ route('wishlist.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="add_to_cart_icon_btn"><i class="ti-heart"></i></button>
                                    </form>

                                    <form class="add_to_cart_icon" action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="add_to_cart_icon_btn"><i class="ti-shopping-cart"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="#" class="d-block">
                                    <h4>{{ $product->name }}</h4>
                                </a>
                                <div class="mt-3">
                                    <span class="mr-4">{{session()->get('current_currency') }} {{ convertPrice($product->price)}}</span>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>
@endsection
