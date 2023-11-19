<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <style>

      .bdge {
      height: 21px;
      background-color: orange;
      color: #fff;
      font-size: 11px;
      padding: 8px;
      border-radius: 4px;
      line-height: 3px;
      }

      .comments {
      text-decoration: underline;
      text-underline-position: under;
      cursor: pointer;
      }

      .dot {
      height: 7px;
      width: 7px;
      margin-top: 3px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      }

      .hit-voting:hover {
      color: blue;
      }

      .hit-voting {
      cursor: pointer;
      }
      </style>
	  <style>
	  </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
		@include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         <!-- end slider section -->
      
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px">
        <div class="box">
           <div class="img-box" >
              <img style="width: 100%; height:auto" src="product/{{$product->image}}" alt="">
           </div>
           <div class="detail-box" >
              <h5>
                 {{$product->name}}
              </h5>                  
           </div>
           <div class="detail-box">
             @if ($product->discount_price != $product->price)
              <h6 style="text-decoration: line-through; color:blue">
                {{number_format($product->price, 0, '', ',')}} VNĐ
              </h6>
              <h6 style="color: red"> 
                {{number_format($product->discount_price, 0, '', ',')}} VNĐ
              </h6>
              @else
              <h6 style="color:blue;">
                {{number_format($product->price, 0, '', ',')}} VNĐ
              </h6>
              @endif
              <h6>Danh mục sản phẩm: {{$product->category}}</h6>
              <h6>Mô tả sản phẩm: {{$product->description}}</h6>
              <h6>Số lượng trong kho: {{$product->quantity}}</h6>
              
              <form action="{{url('add_cart',  $product->product_id)}}" method="POST">
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
     </div>
    </div>
    <div class="container mt-5 mb-5">
      <div class="d-flex justify-content-center row">
          <div class="d-flex flex-column col-md-8">
              <div class="coment-bottom bg-white p-2 px-4">
               <form action="{{url('add_comment', $product->product_id)}}" method="POST">
                  @csrf
                  <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                        <input type="text" class="form-control mr-3" placeholder="Thêm bình luận cho sản phẩm này" name="comment">
                        <button style="color:black" class="btn btn-primary" type="submit">Comment</button>
                  </div>
               </form>
              </div>
          </div>
        </div>
  </div>
   <div class="container mt-5 mb-5">
      @foreach ($comment as $comment)
      <div class="d-flex row">
            <div class="commented-section mt-2">
               <div class="d-flex flex-row align-items-center commented-user">
                  <h5 class="mr-2">{{$comment->name}}</h5>
                  <span class="dot mb-1"></span>
               </div>
               <div class="comment-text-sm">
                  <span>{{$comment->comment}}</span>
               </div>
               <div class="reply-section">
                  <div class="d-flex flex-row align-items-center voting-icons">
                     <a style="color: blue" href="javascrip::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
                  </div>
               </div>
               @foreach ($reply as $rep)
               @if($rep->comment_id==$comment->id )
                  <div style="margin-left: 30px" class="d-flex flex-row align-items-center commented-user">
                     <h5 class="mr-2">{{ $rep->name}}</h5>
                     <span class="dot mb-1"></span>
                  </div>
                  <div style="margin-left: 30px" class="comment-text-sm">
                     <span>{{ $rep->reply}}</span>
                  </div>
               @endif
               @endforeach
         </div>
      </div>
      @endforeach

      {{-- @foreach ($reply as $reply)
               @if($reply->comment_id==$comment->id)
                  <div class="d-flex flex-row align-items-center commented-user">
                     <h5 class="mr-2">{{ $reply->name}}</h5>
                     <span class="dot mb-1"></span>
                  </div>
                  <div class="comment-text-sm">
                     <span>{{ $reply->reply}}</span>
                  </div>
               @endif
               @endforeach --}}
      <div style="display: none;" class="replyDiv">
         <form action="{{url('add_reply', $product->product_id)}}" method="POST">
            @csrf
            <div class="d-flex flex-row add-comment-section mt-4 mb-4">
               <input type="text" name="commentId" id="commentId" hidden>
               <input id="reply" name="reply" type="text" class="form-control mr-3" placeholder="Thêm bình luận cho sản phẩm này">
               <button style="color:black" class="btn btn-primary" type="submit">Reply</button>
               <a style="color: blue" class="btn btn-primary" type="button" onclick="reply_close(this)">Close</a>
            </div>
         </form>
      </div>
  </div>

      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')

      <script style="text/javascript">
         function reply(caller){

            document.getElementById('commentId').value=$(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
         }

         function reply_close(caller){
            $('.replyDiv').hide();
         }
      </script>
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