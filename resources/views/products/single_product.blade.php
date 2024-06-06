@extends('layout.layout')


@section('content')
<!--================Single Product Area =================-->
<div class="product_image_area">
  <div class="container">
    <div class="row s_product_inner">
      <div class="col-lg-6">
        <div class="s_product_img">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">

              @if($product->images->isNotEmpty())
              @foreach($product->images as $image)
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="{{ $loop->first ? 'active' : '' }}">
                <img class=" w-100" src="{{ asset($image->image_name) }}" alt="" />
              </li>
              @endforeach
              @endif

            </ol>
            <div class="carousel-inner">
              @if($product->images->isNotEmpty())
              @foreach($product->images as $image)
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img class="d-block w-100 " src="{{ asset($image->image_name) }}" alt="First slide" />
              </div>
              @endforeach
              @else
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('img/default_image.png') }}" alt="First slide" />
              </div>
              @endif

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <div class="s_product_text">
          <h3>{{ $product->name }}</h3>
          <h2>{{session()->get('current_currency') }} {{  convertPrice($product->price)}}</h2>
          <ul class="list">
            <li>
              <a class="active" href="#">
                <span>Category</span> :
                @if($product->category)
                {{ $product->category->name }}
                @else
                No Category
                @endif
              </a>
            </li>
          </ul>
          <p>
            {{ $product->description }}
          </p>
          <form action="{{ route('cart.store') }}" method="POST">

          <div class="product_count">
            <label for="qty">Quantity:</label>
            <input type="text" name="quantity" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty"  />
            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">
              <i class="lnr lnr-chevron-up"></i>
            </button>

            <button class="reduced items-count" type="button">
              <i class="lnr lnr-chevron-down"></i>
            </button>
          </div>
          <div class="card_area" style="display: flex;">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="main_btn">Add to cart</button>
          </form>
            @auth()
            <form action="{{ route('wishlist.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="main_btn icon_btn">
              <i class="lnr lnr lnr-heart"></i>
            </button>
          </form>

            @endauth
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
      </li>
      @if($product->specification->count() > 0)

      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
      </li>

      @endif
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <p>
          {{ $product->description }}
        </p>
      </div>
      @if($product->specification->count() > 0)
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="table-responsive">
          <table class="table">
            <tbody>
            @foreach($product->specification as $specification)

              <tr>
                <td>
                  <h5>{{$specification->key}}</h5>
                </td>
                <td>
                  <h5>{{$specification->value}}</h5>
                </td>
              </tr>

              @endforeach

            </tbody>
          </table>
        </div>
      </div>
      @endif
    </div>
  </div>
</section>
<!--================End Product Description Area =================-->

@endsection
