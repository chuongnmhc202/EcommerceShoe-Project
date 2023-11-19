<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/public">
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
                                        <h4 class="card-title">Gửi mail tới {{$order->email}}</h4>
                                    </div>
                                    <form class="forms-sample" action="{{url('send_user_email', $order->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                          <label class="form-label">Email Greeting :</label>
                                          <input type="text" class="form-control" id="greeting" name="greeting" >
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email FirstLing :</label>
                                            <input type="text" class="form-control" id="firstline" name="firstline" >
                                          </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email Body :</label>
                                            <input type="text" class="form-control" id="body_name" name="body_name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email Button Name :</label>
                                            <input type="text" class="form-control" id="button" name="button">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email Url :</label>
                                            <input class="form-control" type="text" name="url">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email LastLing</label>
                                            <input type="text" class="form-control" id="lastline" name="lastline">
                                        </div>
                                                              
                                        <input type="submit" value="Gửi mail" class="btn btn-primary">
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
