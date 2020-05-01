@extends('admin_layout')
@section('admin_content')


<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm phương thức vận chuyển
            </header>
            @include('flash-message')
            <div class="panel-body">
                <div class="position-center">
                    <form >
                        @csrf
                        <div class="form-group">
                            <label>Chọn thành phố</label>
                            <select class="form-control input-sm m-bot15 choose city" name="city" id="city">
                                <option value="">-- Chọn tỉnh thành phố --</option>
                                @foreach ($city as $key => $val )
                                    <option value="{{$val->matp}}">{{$val->name_city}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Chọn quận huyện</label>
                            <select class="form-control input-sm m-bot15 province choose" name="province" id="province">
                                
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>Chọn phường xã</label>
                            <select class="form-control input-sm m-bot15 wards" name="wards" id="wards">
                                
                            </select> 
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phí vận chuyển</label>
                            <input type="text" name="fee_ship" 
                             class="form-control fee-ship" id="exampleInputEmail1" placeholder="Phí vận chuyển">
                        </div>
                        <button type="button" name="add_delivery" class="btn btn-info add_delivery">Thêm phí vận chuyển</button>
                    </form>
                </div><br>
                <div id="load_feeship">

                </div>
            </div>
        </section>
    </div>
</div>
@endsection
