@extends('layout.layout')


@section('content')


<!--================Home Banner Area =================-->
@include('homeSections.home_banner')
<!--================End Home Banner Area =================-->

<!--================ Start feature Area =================-->
@include('homeSections.feature_area')
<!--================ End feature Area =================-->

<!--================ Feature Product Area =================-->
@include('homeSections.feature_product')
<!--================ End Feature Product Area =================-->

<!--================ New Product Area =================-->
@include('homeSections.new_product_area')
<!--================ End New Product Area =================-->

<!--================ Inspired Product Area =================-->
@include('homeSections.inspired_product_area')
<!--================ End Inspired Product Area =================-->


@endsection
