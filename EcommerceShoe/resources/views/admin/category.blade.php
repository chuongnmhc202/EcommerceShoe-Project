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
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session()->get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
                    </div>
                    @endif
                <div class="container">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h4 class="card-title">Thêm danh mục sản phẩm</h4>
                                        <p class="card-description">Thêm các danh mục giày</p>
                                    </div>
                                    <form class="forms-sample" action="{{url('/add_category')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="idCategory" class="form-label">Mã danh mục</label>
                                          <input type="text" class="form-control" id="catagory_id" name="catagory_id" placeholder="Mã danh mục">
                                        </div>
                                        <div class="mb-3">
                                          <label for="nameCategory" class="form-label">Tên danh mục</label>
                                          <input type="text" class="form-control" id="catagory_name" name="catagory_name" placeholder="Tên danh mục">
                                        </div>
                                        <div class="mb-3">
                                            <label for="desCategory" class="form-label">Mô tả danh mục</label>
                                            <input type="text" class="form-control" id="catagory_des" name="catagory_des" placeholder="Mô tả danh mục">
                                          </div>
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                      </form>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Mã danh mục</th>
                                <th>Tên danh mục</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã danh mục</th>
                                <th>Tên danh mục</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{$data->catagory_id}}</td>
                                    <td>{{$data->catagory_name}}</td>
                                    <td><a onclick="return confirm('Bạn có chắc là xóa không?')" class="btn btn-danger" href="{{url('delete_catagory', $data->catagory_id)}}" >Xóa</a></td>
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
