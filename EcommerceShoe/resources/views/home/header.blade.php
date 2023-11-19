<header class="header_section">
	<div class="container">
	   <nav class="navbar navbar-expand-lg custom_nav-container ">
		  <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="home/images/logo.png" alt="#" /></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class=""> </span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			 <ul class="navbar-nav">
				<li class="nav-item active">
				   <a class="nav-link" href="{{url('/')}}">Trang chủ <span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item">
				   <a class="nav-link" href="{{url('/product_list')}}">Sản phẩm</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Giỏ<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a class="nav-link" href="{{url('/show_cart')}}">Giỏ hàng</a></li>
						<li><a class="nav-link" href="{{url('/show_order')}}">Đơn hàng</a></li>
					</ul>
				</li>

				@if (Route::has('login'))
					@auth
					<x-app-layout>
						
					</x-app-layout>
					@else
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Truy cập<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a class="nav-link" href="{{ route('login') }}">Đăng nhập</a></li>
							<li><a class="nav-link" href="{{ route('register') }}">Đăng ký</a></li>
						</ul>
					</li>
					@endauth
				@endif
				
				<form class="form-inline">
				   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
				   <i class="fa fa-search" aria-hidden="true"></i>
				   </button>
				</form>
			 </ul>
		  </div>
	   </nav>
	</div>
 </header>