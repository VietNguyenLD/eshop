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
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Hình ảnh</td>
                                <td class="description">Tên sản phẩm</td>
                                <td class="price">Giá</td>
                                <td class="quantity">Số lượng</td>
                                <td class="total">Tổng tiền</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($content as $key=>$v_content )
                                <tr>
                                    <td class="cart_product">
                                        <a href=""><img
                                                src="{{ URL::to('public/uploads/product/'.$v_content->options->image) }}"
                                                width="50" alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{ $v_content->name }}</a></h4>
                                        <p>{{ 'Mã sản phẩm: '.$v_content->id }}
                                        </p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ number_format($v_content->price).' VNĐ' }}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <form action="{{ URL::to('/update-cart-quantity') }}"
                                                method="post">
                                                {{ csrf_field() }}
                                                <input class="cart_quantity_input" style="width: 40px" type="number"
                                                    name="cart_quantity" min="1" value="{{ $v_content->qty }}">
                                                <input type="hidden" value="{{ $v_content->rowId }}" name="rowId_cart"
                                                    class="form-control">
                                                <input type="submit" value="Cập nhật" name="update_qty"
                                                    class="btn btn-primary btn-sm">
                                            </form>
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">
                                            <?php
                                            $sub_total = $v_content->price*$v_content->qty;
                                            echo (number_format($sub_total).' VNĐ');
                                        ?>
                                        </p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete"
                                            href="{{ URL::to('/delete-cart/'.$v_content->rowId) }}"><i
                                                class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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