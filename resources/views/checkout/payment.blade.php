@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container-fluid">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>
        <?php
            $content = Cart::content();
        ?>
        <section id="cart_items">
            <div class="container-fluid">
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
        <h4 style="margin: 40px 0; font-size: 20px">Chọn hình thức thanh toán</h4>
        <form action="{{ URL::to('/order-place')}}" method="POST">
            @csrf
            <div class="payment-options">
                <span>
                    <label><input name="payment_option" type="checkbox" value="1"> Trả bằng ATM</label>
                </span>
                        @if(Session::get('cart'))
                        @if(Session::get('coupon'))
                        @foreach ( Session::get('coupon') as $key => $val )
                            @if($val['coupon_condition'] == 1)
                            @php
                            $money_coupon = $subtotal*$val['coupon_money']/100;
                            $total = $subtotal+$tax-$money_coupon;
                            @endphp   
                            <input type="hidden" name="total" value="{{$total}}">
                            @else
                            @php
                            $money_coupon = $val['coupon_money'];
                            $total = $subtotal+$tax-$money_coupon;
                            @endphp
                            <input type="hidden" name="toltal" value="{{$total}}">
                            @endif
                        @endforeach
                        @endif
                        @endif
                        {{-- @php
                            foreach(Session::get('cart') as $key => $value ) {
                                echo '<pre>';
                                print_r($value);
                                echo '</pre>';
                            }
                            
                        @endphp --}}
                <span>
                    <label><input name="payment_option" type="checkbox" value="2"> Nhận tiền mặt</label>
                </span>
                <span>
                    <label><input name="payment_option" type="checkbox" value="3"> Thẻ ghi nợ</label>
                </span>
                <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
            </div>
        </form>
        
    </div>
</section> <!--/#cart_items-->

@endsection