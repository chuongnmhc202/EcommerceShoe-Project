<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Sản <span>phẩm</span>
          </h2>
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