@extends('layout')
@section('content')
    

<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Sản phẩm mới nhất</h2>
    @foreach ($all_product as $key => $all_pro)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset('public/uploads/product/'.$all_pro->product_image)}}"
                            alt="" style="height:200px"/>
                        <h2>{{number_format($all_pro->product_price)." VNĐ"}}</h2>
                        <p>{{$all_pro->product_name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </a>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection