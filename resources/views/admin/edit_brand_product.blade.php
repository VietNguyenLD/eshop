@extends('admin_layout')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật thương hiệu sản phẩm
            </header>
            @include('flash-message')
            <div class="panel-body">
                @foreach( $edit_brand_product as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{ URL::to('/update-brand-product/'.$edit_value->brand_id)}}"
                        method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1"
                                value="{{$edit_value->brand_name}}" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea class="form-control" style="resize: none" rows="7" id="exampleInputPassword1"
                            name="brand_product_desc" placeholder="Mô tả danh mục">{{$edit_value->brand_desc}}</textarea>
                        </div>

                        <button type="submit" name="edit_brand_product" class="btn btn-info">Cập nhật danh
                            mục</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
