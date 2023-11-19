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
                                        <h4 class="card-title">Thêm thương hiệu sản phẩm</h4>
                                        <p class="card-description">Thêm các thương hiệu giày</p>
                                    </div>
                                    <form class="forms-sample" action="{{url('/add_brand')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="idCategory" class="form-label">Mã thương hiệu</label>
                                          <input type="text" class="form-control" id="brands_id" name="brands_id" placeholder="Mã thương hiệu">
                                        </div>
                                        <div class="mb-3">
                                          <label for="nameCategory" class="form-label">Tên thương hiệu</label>
                                          <input type="text" class="form-control" id="brands_name" name="brands_name" placeholder="Tên thương hiệu">
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
                                <th>Mã thương hiệu</th>
                                <th>Tên thương hiệu</th>
                                <th>Tên danh mục</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã thương hiệu</th>
                                <th>Tên thương hiệu</th>
                                <th>Tên danh mục</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{$data->brands_id}}</td>
                                    <td>{{$data->brands_name}}</td>
                                    <td>{{$data->category}}</td>
                                    <td><a onclick="return confirm('Bạn có chắc là xóa không?')" class="btn btn-danger" href="{{url('delete_brand', $data->brands_id)}}" >Xóa</a></td>
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
