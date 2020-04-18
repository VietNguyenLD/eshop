@extends('admin_layout')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
            </header>
            @include('flash-message')
            <div class="panel-body">
                <div class="position-center">
                <form role="form" action="{{URL::to('/save-product')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gía sản phẩm</label>
                            <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Hình ảnh sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea class="form-control" style="resize: none" rows="7" id="ckeditor1"
                             name="product_desc" placeholder="Mô tả sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea class="form-control" style="resize: none" rows="7" id="exampleInputPassword1" 
                             name="product_content" placeholder="Nội dung sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="product_category">
                                @foreach ($cate_product as $key => $cate )
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>Thương hiệu sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="product_brand">
                                @foreach ($brand_product as $key => $brand)
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>Hiển Thị</label>
                            <select class="form-control input-sm m-bot15" name="product_status">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                            </select> 
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>  
@endsection
