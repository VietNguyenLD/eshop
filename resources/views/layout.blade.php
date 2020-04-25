<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--- Seo ---->
    <meta name="description" content="Cửa hàng Linh kiện phụ kiện máy tính laptop">
    <meta name="keywords" content="Laptop PC">
    <meta name="robots" content="INDEX.FOLLOW">
    <link rel="canonical" href="http://banhang.abc/">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="">
    <!--- Seo  --->
    <meta property="og:url" content="http://banhang.abc/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Shop IT - Chuyễn các loại máy tính" />
    <meta property="og:description" content="Cửa hàng Linh kiện phụ kiện máy tính laptop" />
    <meta property="og:image" content="{{asset('frontend/images/product-details/rating.png')}}" />

    <!-- -->
    <title>Shop IT - Chuyễn các loại máy tính</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/sweetalert.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('frontend/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('frontend/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('frontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('frontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('frontend/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +84 373638358</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i>thocoqtv@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/viet.jonny.14/"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ URL::to('/trang-chu') }}"><img
                                    src="{{ asset('frontend/images/home/logo.png') }}"
                                    alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                    if($customer_id != NULL && $shipping_id!= NULL){
                                ?>
                                <li><a href="{{ URL::to('/payment') }}"><i
                                            class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php
                                    }else{
                                ?>
                                <li><a href="{{ URL::to('/login-checkout') }}"><i
                                            class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php } ?>
                                {{-- <li><a href="{{ URL::to('/show-cart') }}"><i
                                            class="fa fa-shopping-cart"></i> Giỏ hàng</a></li> --}}
                                <li><a href="{{ URL::to('/gio-hang') }}"><i
                                            class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id){
                                ?>
                                <li><a href="{{ URL::to('/logout-checkout') }}"><i
                                            class="fa fa-lock"></i> Đăng Xuất</a></li>
                                <?php
                                    }else{
                                ?>
                                <li><a href="{{ URL::to('/login-checkout') }}"><i
                                            class="fa fa-lock"></i> Đăng nhập</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ URL::to('/trang-chu') }}" class="active">Trang
                                        Chủ</a></li>
                                <li class="dropdown"><a href="#">Sản Phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach ($brand_product as $key=>$brand_pro )
                                        <li><a
                                            href="{{ URL::to('/thuong-hieu-san-pham/'.$brand_pro->brand_id) }}">
                                            <span class="pull-right"></span>{{ $brand_pro->brand_name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{ URL::to('/tim-kiem') }}" method="GET">
                            {{-- {{ csrf_field() }} --}}
                            <div class="search_box pull-right">
                                <input type="text" name="keywords_submit" placeholder="Nhập tên sản phẩm" />
                                <input type="submit" name="search_items" value="Tìm kiếm"
                                    class="btn btn-primary btn-sm">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>IT</span>-SHOP</h1>
                                    <h2>Chào mừng đến với IT-SHOP</h2>
                                    <p>Cam kết hàng chính hãng - Hệ thống chăm sóc khách hàng ưu việt </p>

                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('public/uploads/product/mac-201923.jpg') }}"
                                        class="girl img-responsive" alt="" height="400px" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>IT</span>-SHOP</h1>
                                    <h2>Chào mừng đến với IT-SHOP</h2>
                                    <p>Cam kết hàng chính hãng - Hệ thống chăm sóc khách hàng ưu việt </p>

                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('public/uploads/product/lenovo80v.jpg') }}"
                                        class="girl img-responsive" alt="" height="400px" />
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>IT</span>-SHOP</h1>
                                    <h2>Chào mừng đến với IT-SHOP</h2>
                                    <p>Cam kết hàng chính hãng - Hệ thống chăm sóc khách hàng ưu việt </p>

                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('public/uploads/product/dell86.jpg') }}"
                                        class="girl img-responsive" alt="" height="400px" />

                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            @foreach($category_product as $key => $cate_product )
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a
                                                href="{{ URL::to('/danh-muc-san-pham/'.$cate_product->category_id) }}">{{ $cate_product->category_name }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--/category-products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                @foreach($brand_product as $key=>$brand_pro)
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a
                                                href="{{ URL::to('/thuong-hieu-san-pham/'.$brand_pro->brand_id) }}">
                                                <span class="pull-right">10</span>{{ $brand_pro->brand_name }}</a>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                        <!--/brands_products-->
                        
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    @yield('content')
                </div>
            </div>
        </div>
        
    </section>

    <footer id="footer">
        <!--Footer-->

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/sweetalert.js') }}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0">
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script> 
    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                var id = $(this).data('product_id');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{
                        cart_product_id:cart_product_id,
                        cart_product_name:cart_product_name,
                        cart_product_image:cart_product_image,
                        cart_product_price:cart_product_price,
                        cart_product_qty:cart_product_qty,
                        _token:_token},
                    success:function(){
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });
                        }

                });
            });
        });
    </script>

</body>

</html>
