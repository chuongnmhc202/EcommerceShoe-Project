<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.css')
    </head>
    <body class="sb-nav-fixed">
        @include('admin.navbar')
        <div id="layoutSidenav">
                @include('admin.sidebar')
                <div id="layoutSidenav_content">
                    @if ($errors -> any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                                  
                    </div>
                    @endif
                    @if(session()->has('message_product'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session()->get('message_product')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
                    </div>
                    @endif
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Mô tả</th>
                                <th>Số lượng</th>
                                <th>Danh mục</th>
                                <th>Thương hiệu</th>
                                <th>Giá bán</th>
                                <th>Giá giảm</th>
                                <th>Hình ảnh sản phẩm</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Mô tả</th>
                                <th>Số lượng</th>
                                <th>Danh mục</th>
                                <th>Thương hiệu</th>
                                <th>Giá bán</th>
                                <th>Giá giảm</th>
                                <th>Hình ảnh sản phẩm</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($product as $product)
                                <tr>
                                    <td>{{$product->product_id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->category}}</td>
                                    <td>{{$product->brand}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->discount_price}}</td>
                                    <td>
                                        <img style="width:100px; height:100px" src="/product/{{$product->image}}">
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{url('update_product', $product->product_id)}}" >Sửa</a>
                                        <a onclick="return confirm('Bạn có chắc là xóa không?')" class="btn btn-danger" href="{{url('delete_product', $product->product_id)}}" >Xóa</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </div>      
                </div>
            </div>
        </div>
        @include('admin.script')
    </body>
</html>
