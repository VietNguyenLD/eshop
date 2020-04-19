@extends('layout')
@section('content')
    

<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Kết quả tìm kiếm</h2>
    @foreach ($search_product as $key => $search_pro)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$search_pro->product_id)}}">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset('public/uploads/product/'.$search_pro->product_image)}}"
                            alt="" style="height:200px"/>
                        <h2>{{number_format($search_pro->product_price)." VNĐ"}}</h2>
                        <p>{{$search_pro->product_name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endforeach
    <div>
        <span>{{ $search_product->render() }}</span>
    </div>
        
</div>
@endsection