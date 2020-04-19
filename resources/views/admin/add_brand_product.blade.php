@extends('admin_layout')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm thương hiệu sản phẩm
            </header>
            @include('flash-message')
            <div class="panel-body">
                <div class="position-center">
                <form role="form" action="{{URL::to('/save-brand-product')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" name="brand_product_name" data-validation="length" 
                            data-validation-error-msg="Tên tối thiểu 10 ký tự" data-validation-length="min10" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea class="form-control" style="resize: none" rows="8" id="ckeditor1" 
                             name="brand_product_desc" placeholder="Mô tả danh mục"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Hiển Thị</label>
                            <select class="form-control input-sm m-bot15" name="brand_product_status">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                            </select> 
                        </div>
                        <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>  
@endsection
