@extends('layout')
@section('content')


<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Sản phẩm mới nhất</h2>
    @foreach ($all_product as $key => $all_pro)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    {{-- <form action="{{URL::to('/save-cart')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" class="{{"cart_product_id_".$all_pro->product_id}}" value="{{$all_pro->product_id}}">
                        <input type="hidden" class="{{"cart_product_name_".$all_pro->product_id}}" value="{{$all_pro->product_name}}">
                        <input type="hidden" class="{{"cart_product_image_".$all_pro->product_id}}" value="{{$all_pro->product_image}}">
                        <input type="hidden" class="{{"cart_product_price_".$all_pro->product_id}}" value="{{$all_pro->product_price}}">
                        <input type="hidden" class="{{"cart_product_qty_".$all_pro->product_id}}" value="1">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}">
                            <img src="{{ asset('public/uploads/product/'.$all_pro->product_image)}}" alt=""
                                style="height:200px" />
                            <input name="productid_hidden" type="hidden" value="{{$all_pro->product_id}}" min="1" />
                            <input name="quantity" type="number" value="1" min="1" hidden />
                            <h2>{{number_format($all_pro->product_price)." VNĐ"}}</h2>
                            <p>{{$all_pro->product_name}}</p>
                        </a>
                        <button type="submit" class="btn btn-fefault add-to-cart" data-product_id="{{$all_pro->product_id}}">
                            <i class="fa fa-shopping-cart"></i>
                            Thêm giỏ hàng
                    </button>
                    </form> --}}
                    <form method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" class="{{"cart_product_id_".$all_pro->product_id}}" value="{{$all_pro->product_id}}">
                        <input type="hidden" class="{{"cart_product_name_".$all_pro->product_id}}" value="{{$all_pro->product_name}}">
                        <input type="hidden" class="{{"cart_product_image_".$all_pro->product_id}}" value="{{$all_pro->product_image}}">
                        <input type="hidden" class="{{"cart_product_price_".$all_pro->product_id}}" value="{{$all_pro->product_price}}">
                        <input type="hidden" class="{{"cart_product_qty_".$all_pro->product_id}}" value="1">
                        
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}">
                            <img src="{{ asset('public/uploads/product/'.$all_pro->product_image)}}" alt=""
                                style="height:200px" />
                            <input name="productid_hidden" type="hidden" value="{{$all_pro->product_id}}" min="1" />
                            <input name="quantity" type="number" value="1" min="1" hidden />
                            <h2>{{number_format($all_pro->product_price)." VNĐ"}}</h2>
                            <p>{{$all_pro->product_name}}</p>
                        </a>
                        <button type="button" class="btn btn-fefault add-to-cart" data-product_id="{{$all_pro->product_id}}">
                            <i class="fa fa-shopping-cart "></i>
                            Thêm giỏ hàng
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
