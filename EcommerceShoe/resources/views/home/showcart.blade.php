<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
	  <style>
        body{margin-top:20px;}
        select.form-control:not([size]):not([multiple]) {
            height: 44px;
        }
        select.form-control {
            padding-right: 38px;
            background-position: center right 17px;
            background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNv…9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K);
            background-repeat: no-repeat;
            background-size: 9px 9px;
        }
        .form-control:not(textarea) {
            height: 44px;
        }
        .form-control {
            padding: 0 18px 3px;
            border: 1px solid #dbe2e8;
            border-radius: 22px;
            background-color: #fff;
            color: #606975;
            font-family: "Maven Pro",Helvetica,Arial,sans-serif;
            font-size: 14px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .shopping-cart,
        .wishlist-table,
        .order-table {
            margin-bottom: 20px
        }

        .shopping-cart .table,
        .wishlist-table .table,
        .order-table .table {
            margin-bottom: 0
        }

        .shopping-cart .btn,
        .wishlist-table .btn,
        .order-table .btn {
            margin: 0
        }

        .shopping-cart>table>thead>tr>th,
        .shopping-cart>table>thead>tr>td,
        .shopping-cart>table>tbody>tr>th,
        .shopping-cart>table>tbody>tr>td,
        .wishlist-table>table>thead>tr>th,
        .wishlist-table>table>thead>tr>td,
        .wishlist-table>table>tbody>tr>th,
        .wishlist-table>table>tbody>tr>td,
        .order-table>table>thead>tr>th,
        .order-table>table>thead>tr>td,
        .order-table>table>tbody>tr>th,
        .order-table>table>tbody>tr>td {
            vertical-align: middle !important
        }

        .shopping-cart>table thead th,
        .wishlist-table>table thead th,
        .order-table>table thead th {
            padding-top: 17px;
            padding-bottom: 17px;
            border-width: 1px
        }

        .shopping-cart .remove-from-cart,
        .wishlist-table .remove-from-cart,
        .order-table .remove-from-cart {
            display: inline-block;
            color: #ff5252;
            font-size: 18px;
            line-height: 1;
            text-decoration: none
        }

        .shopping-cart .count-input,
        .wishlist-table .count-input,
        .order-table .count-input {
            display: inline-block;
            width: 100%;
            width: 86px
        }

        .shopping-cart .product-item,
        .wishlist-table .product-item,
        .order-table .product-item {
            display: table;
            width: 100%;
            min-width: 150px;
            margin-top: 5px;
            margin-bottom: 3px
        }

        .shopping-cart .product-item .product-thumb,
        .shopping-cart .product-item .product-info,
        .wishlist-table .product-item .product-thumb,
        .wishlist-table .product-item .product-info,
        .order-table .product-item .product-thumb,
        .order-table .product-item .product-info {
            display: table-cell;
            vertical-align: top
        }

        .shopping-cart .product-item .product-thumb,
        .wishlist-table .product-item .product-thumb,
        .order-table .product-item .product-thumb {
            width: 130px;
            padding-right: 20px
        }

        .shopping-cart .product-item .product-thumb>img,
        .wishlist-table .product-item .product-thumb>img,
        .order-table .product-item .product-thumb>img {
            display: block;
            width: 100%
        }

        @media screen and (max-width: 860px) {
            .shopping-cart .product-item .product-thumb,
            .wishlist-table .product-item .product-thumb,
            .order-table .product-item .product-thumb {
                display: none
            }
        }

        .shopping-cart .product-item .product-info span,
        .wishlist-table .product-item .product-info span,
        .order-table .product-item .product-info span {
            display: block;
            font-size: 13px
        }

        .shopping-cart .product-item .product-info span>em,
        .wishlist-table .product-item .product-info span>em,
        .order-table .product-item .product-info span>em {
            font-weight: 500;
            font-style: normal
        }

        .shopping-cart .product-item .product-title,
        .wishlist-table .product-item .product-title,
        .order-table .product-item .product-title {
            margin-bottom: 6px;
            padding-top: 5px;
            font-size: 16px;
            font-weight: 500
        }

        .shopping-cart .product-item .product-title>a,
        .wishlist-table .product-item .product-title>a,
        .order-table .product-item .product-title>a {
            transition: color .3s;
            color: #374250;
            line-height: 1.5;
            text-decoration: none
        }

        .shopping-cart .product-item .product-title>a:hover,
        .wishlist-table .product-item .product-title>a:hover,
        .order-table .product-item .product-title>a:hover {
            color: #0da9ef
        }

        .shopping-cart .product-item .product-title small,
        .wishlist-table .product-item .product-title small,
        .order-table .product-item .product-title small {
            display: inline;
            margin-left: 6px;
            font-weight: 500
        }

        .wishlist-table .product-item .product-thumb {
            display: table-cell !important
        }

        @media screen and (max-width: 576px) {
            .wishlist-table .product-item .product-thumb {
                display: none !important
            }
        }

        .shopping-cart-footer {
            display: table;
            width: 100%;
            padding: 10px 0;
            border-top: 1px solid #e1e7ec
        }

        .shopping-cart-footer>.column {
            display: table-cell;
            padding: 5px 0;
            vertical-align: middle
        }

        .shopping-cart-footer>.column:last-child {
            text-align: right
        }

        .shopping-cart-footer>.column:last-child .btn {
            margin-right: 0;
            margin-left: 15px
        }

        @media (max-width: 768px) {
            .shopping-cart-footer>.column {
                display: block;
                width: 100%
            }
            .shopping-cart-footer>.column:last-child {
                text-align: center
            }
            .shopping-cart-footer>.column .btn {
                width: 100%;
                margin: 12px 0 !important
            }
        }

        .coupon-form .form-control {
            display: inline-block;
            width: 100%;
            max-width: 235px;
            margin-right: 12px;
        }

        .form-control-sm:not(textarea) {
            height: 36px;
        }


	  </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
		@include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @if(session()->has('messege'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session()->get('messege')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
                    </div>
        @endif
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container padding-bottom-3x mb-1">
            <!-- Alert-->
            <br>
            <!-- Information-->
            <form action="{{ url('/upload_infor', $id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="table-responsive shopping-cart">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th class="text-center">Địa chỉ</th>
                                <th class="text-center">Số điện thoại</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)
                            <tr>                  
                                <td><input type="text" class="form-control" id="name_user" name="name_user" value="{{$user->name}}" placeholder="Nhập tên của bạn"></td>
                                <td><input type="text" class="text-center text-lg text-medium" id="address_user" name="address_user" value="{{$user->address}}" placeholder="Nhập địa chỉ của bạn"></td>
                                <td><input type="text" class="text-center text-lg text-medium" id="phone_user" name="phone_user" value="{{$user->phone}}" placeholder="Nhập số điện thoại của bạn"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="column">
                        <button style="color: #374250" type="submit" onclick="return confirm('Bạn có chắc muốn cập nhật?')" class="btn btn-success" value="Update Product">Cập nhật thông tin</button>
                    </div>
                </div>
            </form>
            <!-- Shopping Cart-->
            <div class="table-responsive shopping-cart">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Giá cả</th>
                            <th class="text-center">Hình ảnh</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalprice=0 ?>
                        @foreach ($cart as $cart)

                        <tr>                  
                            <td>{{$cart->product_title}}</td>
                            {{-- <td class="text-center">{{$cart->quantity}}</td> --}}
                            <td class="text-center">
                                <div class="product-quantity">
                                    <input type="number" value="{{$cart->quantity}}" min="1">
                                </div>
                            </td>
                            <td class="text-center text-lg text-medium">{{$cart->price}}</td>
                            <td class="text-center text-lg text-medium"><img style="width: 100px; height:auto" src="/product/{{$cart->image}}" ></td>
                            <td class="text-center"><a onclick="return confirm('Bạn có chắc muốn xóa?')" class="remove-from-cart" href="{{url('/remove_cart',$cart->id)}}" data-toggle="tooltip" title="" data-original-title="Remove item"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php $totalprice=$totalprice + $cart->price ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="shopping-cart-footer">
                <div class="column">
                    <form class="coupon-form" method="post">
                        <input class="form-control form-control-sm" type="text" placeholder="Mã giảm giá" required="">
                        <button class="btn btn-outline-primary btn-sm" type="submit">Áp dụng mã giảm</button>
                    </form>
                </div>
                <div class="column text-lg">Tổng tiền: <span class="text-medium">{{number_format($totalprice, 0, '', ',')}} VNĐ</span></div>
            </div>
            <div class="shopping-cart-footer">
                <div class="column"><a class="btn btn-outline-secondary" href="{{url('/redirect')}}"><i class="icon-arrow-left"></i>&nbsp;Quay về</a></div>
                <div class="column">
                    <a class="btn btn-primary" href="{{ url('cash_order')}}" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!">Thanh toán khi nhận hàng</a>
                    <a class="btn btn-success" href="{{ url('stripe',$totalprice) }}">Thanh toán bằng thẻ</a>
                </div>
            </div>
        </div>
      </div>
      <!-- end client section -->
      <!-- footer start -->
       <!-- footer end -->
       <div class="cpy_">
        <p class="mx-auto">© 2022 All Rights Reserved By <a href="https://www.facebook.com/NghiaDauLau/">Nhat nghia</a><br>
        
           Distributed By <a href="https://www.facebook.com/NghiaDauLau/" target="_blank">NhatNghia</a>
        
        </p>
     </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>