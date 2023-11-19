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
                    @if(session()->has('message_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session()->get('message_error')}}
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
                                <th>Tên</th>
                                <th>Mã thanh toán</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>Hình ảnh</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tên</th>
                                <th>Mã thanh toán</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>Hình ảnh</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($order as $order)
                                <tr>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->order_number}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->product_title}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->price}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>{{$order->delivery_status}}</td>
                                    <td>
                                        <img style="width:100px; height:100px" src="/product/{{$order->image}}">
                                    </td>
                                    <td>
                                        {{-- <a class="btn btn-info" href="{{url('update_product', $product->product_id)}}" >Sửa</a> --}}
                                        @if ($order->delivery_status=='Đợi xử lý')
                                            <a onclick="return confirm('Bạn có chắc là cập nhật không?')" class="btn btn-primary" href="{{url('delivered', $order->id)}}">Xác nhận</a>
                                        @else
                                            @if ($order->delivery_status=='Chuyển tới kho')
                                                <a onclick="return confirm('Bạn có chắc là cập nhật không?')" class="btn btn-danger" href="{{url('delivered_acp', $order->id)}}">Kết thúc</a>
                                            @else
                                                <a class="btn btn-success">Đã xong</a>
                                            @endif
                                        @endif
                                        
                                        
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Bạn có chắc muốn in ra không?')" class="btn btn-warning" href="{{url('print_pdf', $order->id)}}">Hóa đơn</a>
                                        <a class="btn btn-success" href="{{url('send_email', $order->id)}}">Gửi Mail</a>
        
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
