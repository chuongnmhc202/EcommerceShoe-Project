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
	  </style>
   </head>
   <body>
    @include('home.header')


      <!-- product section -->
      <section class="product_section layout_padding">
        <div class="container">
           <div class="heading_container heading_center">
              <h2>
                 Sản <span>phẩm</span>
              </h2>

              <div>
                <form action="{{url('product_search')}}" method="">
                    @csrf 
                    <input style="width: 500px" type="text" name="search" placeholder="Tìm kiếm sản phẩm">
                    <input type="submit" value="Tìm kiếm">
                </form>
              </div>
           </div>
           <div class="row">
             @foreach ($product as $products)
                 
              <div class="col-sm-6 col-md-4 col-lg-4">
                 <div class="box">
                    <div class="option_container">
                       <div class="options">
                          <a href="{{url('product_details', $products->product_id)}}" class="option1">
                            Chi tiết
                          </a>
                          <form action="{{url('add_cart',  $products->product_id)}}" method="POST">
                            @csrf
                            <div class="row">
                               <div class="col-md-4">
                                  <input type="number" name="quantity" value="1" min="1" style="width: 100px; padding:12px">
                               </div>
                               <div class="col-md-4">
                                  <input type="submit" value="Thêm vào giỏ hàng">
                               </div>
                            </div>
                            
                          </form>
                       </div>
                    </div>
                    <div class="img-box" >
                       <img src="product/{{$products->image}}" alt="">
                    </div>
                    <div class="detail-box"  style="display: flex; justify-content: center;" >
                       <h5>
                          {{$products->name}}
                       </h5>                  
                    </div>
                    <div class="detail-box">
                      @if ($products->discount_price != $products->price)
                       <h6 style="color: red"> 
                         {{number_format($products->discount_price, 0, '', ',')}} VNĐ
                       </h6>
    
                       <h6 style="text-decoration: line-through; color:blue">
                         {{number_format($products->price, 0, '', ',')}} VNĐ
                       </h6>
                       @else
                       <h6 style="color:blue;">
                         {{number_format($products->price, 0, '', ',')}} VNĐ
                       </h6>
                       @endif
                    </div>
                 </div>
              </div>
              @endforeach
    
              <span style="padding-top: 20px">
                {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
              </span>
             
        </div>
     </section>

      @include('home.footer')
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