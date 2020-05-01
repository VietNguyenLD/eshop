@extends('admin_layout')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục sản phẩm
            </header>
            @include('flash-message')
            <div class="panel-body">
                <div class="position-center">
                <form role="form" action="{{URL::to('/save-coupon')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên mã giảm giá</label>
                            <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1" placeholder="Tên mã giảm giá">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mã giảm giá</label>
                            <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1" placeholder="Mã giảm giá">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Số lượng mã</label>
                            <input type="text" name="coupon_times" class="form-control" id="exampleInputEmail1" placeholder="Số lượng mã">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tính năng mã</label>
                            <select class="form-control input-sm m-bot15" name="coupon_condition">
                                <option value="0">-----Chọn-----</option>
                                <option value="1">Giảm theo phần trăm</option>
                                <option value="2">Giảm theo tiền</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nhập số % hoặc tiền giảm</label>
                            <input type="text" name="coupon_money" class="form-control" id="exampleInputEmail1" placeholder="Nhập số % hoặc tiền giảm">
                        </div>
                        <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã giảm giá</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>  
@endsection
