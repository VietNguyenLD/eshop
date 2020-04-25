@extends('layout')
@section('content')

<section id="cart_items">
    <div class="container-fluid">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/trang-chu') }}">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá sản phẩm</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Thành tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @php
                            $total = 0;
                    @endphp
                    @foreach(Session::get('cart') as $key => $value )
                        @php
                            $subtotal = $value['product_price'] * $value['product_qty'];
                            $total+=$subtotal;
                        @endphp
                        <tr>
                            <td class="cart_product">
                                <img src="{{asset('public/uploads/product/'.$value['product_image'])}}" alt="{{$value['product_name']}}"
                                style="width: 80px;">
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$value['product_name']}}</h4>
                                <p>
                                </p>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($value['product_price'],0,',','.').' VNĐ'}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action=""
                                        method="post">
                                        
                                        <input class="cart_quantity_input" style="width: 40px" type="number"
                                            name="cart_quantity" min="1" value="{{$value['product_qty']}}">
                                        <input type="submit" value="Cập nhật" name="update_qty"
                                            class="btn btn-default btn-sm">
                                    </form>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    {{number_format($subtotal,0,',','.').' VNĐ'}}
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete"
                                    href=""><i
                                        class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--/#cart_items-->
<section id="do_action">
    <div class="container-fluid">
        <div class="heading">
            <h3>Cám ơn bạn đã mua hàng tai SHOP</h3>
            <p>Chúc bạn mua hàng vui vẻ - Mong bạn sẽ tiếp tục mua hàng =))</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <iframe width="440" height="284" src="https://www.youtube.com/embed/l-g3XOyl4T0" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng
                            <span></span>
                        </li>
                        <li>Thuế
                            <span></span>
                        </li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Tiền sau giảm
                            <span></span>
                        </li>
                    </ul>
                    
                    <a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Thanh toán</a>
                    
                    <a class="btn btn-default check_out" href="{{ URL::to('/login-checkout') }}">Thanh toán</a>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#do_action-->


@endsection
