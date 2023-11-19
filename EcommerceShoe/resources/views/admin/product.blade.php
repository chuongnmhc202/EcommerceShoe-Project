<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.css')
        <meta name="_token" content="{{ csrf_token() }}">
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
                <div class="container">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h4 class="card-title">Thêm sản phẩm</h4>
                                        <p class="card-description">Thêm các sản phẩm mới</p>
                                    </div>
                                    <form class="forms-sample" action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                          <label class="form-label">Mã sản phẩm :</label>
                                          <input type="text" class="form-control" id="product_id" name="product_id" placeholder="Nhập mã giày">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tên sản phẩm :</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên giày">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mô tả sản phẩm :</label>
                                            <input type="text" class="form-control" id="description" name="description" placeholder="Nhập mô tả giày">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Hình ảnh sản phẩm :</label>
                                            <input class="form-control" type="file" name="image" placeholder="Nhập hình ảnh giày">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Danh mục sản phẩm :</label>
                                            <select  class="form-control" id="category" name="category">
                                                <option class="text-color" value="" selected="">Thêm danh mục sản phẩm tại đây</option>
                                                @foreach ($catagory as $catagory)
                                                    <option class="text-color" value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>        
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Thương hiệu sản phẩm :</label>
                                            <select  class="form-control" id="brand" name="brand">
                                                <option class="text-color" value="" selected="">Thêm thương hiệu sản phẩm tại đây</option>
                                                {{-- @foreach ($catagory as $catagory)
                                                    <option class="text-color" value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>        
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Số lượng sản phẩm :</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng giày">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Giá sản phẩm :</label>
                                            <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá giày">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Giảm giá :</label>
                                            <input type="number" class="form-control" id="discount_price" name="discount_price" placeholder="Nhập giảm giày">
                                        </div>  
                                        
                                
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                      </form>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>
            </div>
        </div>
        @include('admin.script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $(document).ready(function(){
                $("#category").change(function(){
                    var catagory_name = $(this).val();

                    if(catagory_name == ""){
                        var catagory_name = 0;
                    }
                    // console.log(catagory_name);
                    $.ajax({
                        url: '{{ url("/fetch-brand/" )}}/' + catagory_name,
                        type: 'post',
                        dataType: 'json',
                        success: function(response){
                            // console.log(response);

                            $("#brand").find('option:not(:first)').remove();

                            if(response['brands'].length > 0){
                                $.each(response['brands'], function(key, value){
                                    $("#brand").append("<option class='text-color' value='"+value['brands_name']+"'>"+value['brands_name']+"</option>");
                                });
                            }
                        }
                    });
                });
            });
        </script>
        
    </body>
</html>
