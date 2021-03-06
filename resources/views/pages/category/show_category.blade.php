@extends('layout')
@section('content')
    

<div class="features_items">
    <!--features_items-->
    @foreach ( $category_name as $name )
    <h2 class="title text-center">{{$name->category_name}}</h2>
    @endforeach
    
    @foreach ($category_by_id as $key => $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                <form action="{{URL::to('/save-cart')}}" method="post">
                    {{ csrf_field() }}
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ asset('public/uploads/product/'.$product->product_image)}}"
                                alt="" style="height:200px"/>
                            <input name="productid_hidden" type="hidden" value="{{$product->product_id}}" min="1"/>
                            <input name="quantity" type="number" value="1" min="1" hidden/>
                            <h2>{{number_format($product->product_price)." VNĐ"}}</h2>
                            <p>{{$product->product_name}}</p>
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