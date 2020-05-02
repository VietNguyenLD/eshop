@extends('admin_layout')
@section('admin_content')

    

<div class="table-agile-info">
    <div class="panel panel-default">

        <div class="panel-heading">
            Thông tin khách hàng
        </div>
        <div class="table-responsive">
            @include('flash-message')
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_by_id as $order)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                        </td>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->customer_phone}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {{-- {{ $all_order->links() }} --}}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div><br><br>
<div class="table-agile-info">
    <div class="panel panel-default">

        <div class="panel-heading">
            Thông tin vận chuyển
        </div>
        <div class="table-responsive">
            @include('flash-message')
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên người vận chuyển</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_by_id as $order)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                        </td>
                        <td>{{$order->shipping_name}}</td>
                        <td>{{$order->shipping_phone}}</td>
                        <td>{{$order->shipping_address}}</td>
                    
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {{-- {{ $all_order->links() }} --}}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div><br><br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin Sản phẩm
        </div>
        <div class="table-responsive">
            @include('flash-message')
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng tiền</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_by_id as $order)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                        </td>
                        <td>{{$order->product_name}}</td>
                        <td>{{$order->product_sales_quantity}}</td>
                        <td>{{number_format($order->product_price,0,',','.').' VNĐ'}}</td>
                        <td>{{number_format($order->order_total,0,',','.').' VNĐ'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {{-- {{ $all_order->links() }} --}}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection
