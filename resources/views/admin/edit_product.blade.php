@extends('admin_layout')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            @include('flash-message')
            <div class="panel-body">
                <div class="position-center">
                @foreach ($edit_product as $pro )
                <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" 
                            value="{{$pro->product_name}}" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gía sản phẩm</label>
                            <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" 
                            value="{{$pro->product_price}}" placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" 
                                placeholder="Hình ảnh sản phẩm">
                            <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" width="100px" height="100px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea class="form-control" style="resize: none" rows="7" id="ckeditor1" 
                             name="product_desc" placeholder="Mô tả sản phẩm">{{$pro->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea class="form-control" style="resize: none" rows="7" id="ckeditor2" 
                             name="product_content" placeholder="Nội dung sản phẩm">{{$pro->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="product_category">
                                @foreach ($cate_product as $key => $cate )
                                    @if ($cate->category_id == $pro->category_id)
                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>Thương hiệu sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="product_brand">
                                @foreach ($brand_product as $key => $brand)
                                    @if ($brand->brand_id == $pro->brand_id)
                                        <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>Hiển Thị</label>
                            <select class="form-control input-sm m-bot15" name="product_status">
                                @if($pro->product_status == 0)
                                    <option selected value="0">Ẩn</option>
                                @elseif($pro->product_status == 1)
                                    <option selected value="1">Hiện</option>
                                @endif
                            </select> 
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>  
@endsection
