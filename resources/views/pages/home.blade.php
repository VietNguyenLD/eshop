@extends('layout')
@section('content')
    

<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Sản phẩm mới nhất</h2>
    @foreach ($all_product as $key => $all_pro)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}">
                <form action="{{URL::to('/save-cart')}}" method="post">
                    {{ csrf_field() }}
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ asset('public/uploads/product/'.$all_pro->product_image)}}"
                                alt="" style="height:200px"/>
                            <input name="productid_hidden" type="hidden" value="{{$all_pro->product_id}}" min="1"/>
                            <input name="quantity" type="number" value="1" min="1" hidden/>
                            <h2>{{number_format($all_pro->product_price)." VNĐ"}}</h2>
                            <p>{{$all_pro->product_name}}</p>
                            <button type="submit" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Thêm giỏ hàng
                            </button>
                        </div>
                    </div>
                </form>
            </a>
            
        </div>
    </div>
    @endforeach

</div>
@endsection