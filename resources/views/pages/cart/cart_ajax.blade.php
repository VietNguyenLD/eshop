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
            @include('flash-message')
            <form action="{{URL::to('/update-cart')}}" method="post">
                @csrf
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
                        $tax = 0;
                        @endphp
                        @if(Session::get('cart') == true)
                        @foreach(Session::get('cart') as $key => $value )
                        @php
                        $subtotal = $value['product_price'] * $value['product_qty'];
                        $total+=$subtotal;
                        $tax = 0.02*$total;
                        @endphp
                        <tr>
                            <td class="cart_product">
                                <img src="{{asset('public/uploads/product/'.$value['product_image'])}}"
                                    alt="{{$value['product_name']}}" style="width: 80px;">
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
                                    <input class="cart_quantity_input" style="width: 40px" type="number"
                                        name="cart_qty[{{$value['session_id']}}]" min="1"
                                        value="{{$value['product_qty']}}">
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    {{number_format($subtotal,0,',','.').' VNĐ'}}
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete"
                                    href="{{URL::to('/delete-sp/'.$value['session_id'])}}"><i
                                        class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        @if(Session::get('cart') == true)
                        <tr>
                            <td><input type="submit" value="Cập nhật" name="update_qty"
                                    class="btn btn-default check_out"></td>
                        </tr>
                        @else
                        <tr colspan="5"><center>
                            <td>
                                <span>Làm ơn thêm sản phẩm vào giỏ hàng</span>
                            </td>
                        </center></tr>
                        @endif
                    </tbody>
                </table>

            </form>
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
                <div class="total_area">
                    <ul>
                        @if(Session::get('cart'))
                        @if(Session::get('coupon'))
                        @foreach ( Session::get('coupon') as $key => $val )
                            @if($val['coupon_condition'] == 1)
                            @php
                            $money_coupon = $subtotal*$val['coupon_money']/100;
                            $total = $subtotal+$tax-$money_coupon;
                            @endphp
                            <li>Mã giảm
                                <span>{{$val['coupon_money'].' %'}}</span>
                            </li>
                            <li>Tổng giảm
                               
                                <span>{{number_format($money_coupon,0,',','.'). ' VNĐ'}}</span>
                            </li>
                            @else
                            @php
                            $money_coupon = $val['coupon_money'];
                            $total = $subtotal+$tax-$money_coupon;
                            @endphp
                            <li>Mã giảm
                                <span>{{number_format($val['coupon_money'],0,',','.'). ' VNĐ'}}</span>
                            </li>
                            <li>Tổng giảm
                                 <span>{{number_format($val['coupon_money'],0,',','.'). ' VNĐ'}}</span>
                            </li>

                            @endif
                        @endforeach
                        @endif
                        @endif
                       
                    </ul>
                    <form action="{{url('/check-coupon')}}" method="POST">
                        @csrf
                        <input type="text" class="form-control code-coupon" name="coupon" placeholder="Nhập mã giảm giá">
                        <input type="submit" class="btn btn-default check_out" name="check_coupon" value="Tính mã giảm giá"> 
                    </form>
                </div>
                
            </div>        
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        @if(Session::get('cart'))
                        <li>Tổng
                            <span>{{number_format($subtotal,0,',','.').' VNĐ'}}</span>
                        </li>
                        <li>Thuế
                            <span>{{number_format($tax,0,',','.').' VNĐ'}}</span>
                        </li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Tiền sau giảm
                            <span>{{number_format($total,0,',','.').' VNĐ'}}</span>
                        </li>
                        @else
                        <li>Tổng
                            <span>{{number_format(0,0,',','.').' VNĐ'}}</span>
                        </li>
                        <li>Thuế
                            <span>{{number_format(0,0,',','.').' VNĐ'}}</span>
                        </li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Tiền sau giảm
                            <span>{{number_format(0,0,',','.').' VNĐ'}}</span>
                        </li>
                        @endif
                    </ul>
                    <div class="buttons d-flex justify-content-center">
                        @if(Session::get('customer_id') && Session::get('shipping_id')==false)
                        <a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Thanh toán</a>
                        @elseif(Session::get('customer_id') && Session::get('shipping_id')==true)
                        <a class="btn btn-default check_out" href="{{ URL::to('/payment') }}">Thanh toán</a>
                        @else
                        <a class="btn btn-default check_out" href="{{ URL::to('/login-checkout') }}">Thanh toán</a>
                        @endif
                        
                        @if(Session::get('cart') == true)
                        <a class="btn btn-default check_out" href="{{ URL::to('/delete-all-product-cart') }}">Xoá tất
                            cả</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--/#do_action-->


@endsection
