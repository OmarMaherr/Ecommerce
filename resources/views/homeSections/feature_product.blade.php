<div class="container">
    <div class="row">
    </div>
</div>


<section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>Featured product</span></h2>
                </div>
            </div>
        </div>

        <div class="row">

            @foreach($feature_product as $product)

                <div class="col-md col-sm">
                    <div class="product-grid">
                        <div class="product-content">
                            <h3 class="title"><a
                                    href="{{ route('single_product.show' , [encrypt($product->id)]) }}">{{ $product->name }}</a>
                            </h3>
                            <div
                                class="price"> {{session()->get('current_currency') }} {{ convertPrice($product->price)}}</div>

                            <ul class="product-links">
                                <li>
                                    <form class="add_to_cart_icon" action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <a onclick="this.closest('form').submit(); return false;">
                                            <i class="fa fa-shopping-bag"></i></a>
                                    </form>
                                </li>
                                <li>
                                    <form class="add_to_cart_icon" action="{{ route('wishlist.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <a onclick="this.closest('form').submit(); return false;">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ route('single_product.show' , [encrypt($product->id)]) }}"><i
                                            class="fa fa-eye"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-image">
                            <a href="{{ route('single_product.show' , [encrypt($product->id)]) }}" class="image">
                                @if($product->images->isNotEmpty())
                                    <img class="pic-1" src="{{ asset($product->images->first()->image_name) }}">
                                    <img class="pic-2" src="{{ asset($product->images->first()->image_name) }}">
                                @else
                                    <img class="pic-1" src="{{asset('img/default_image.png') }}">
                                    <img class="pic-2" src="{{asset('img/default_image.png') }}">

                                @endif

                            </a>
                        </div>
                    </div>
                </div>

            @endforeach


        </div>
    </div>
</section>
