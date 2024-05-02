@extends('USER.layout')

@section('title','Xác nhận thanh toán')
@section('main')
@if( session('cart') || session('buy'))
@if(session('TaiKhoan'))

<?php
$tk = session('TaiKhoan');
$kh = session('KhachHang');

?>



<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="blog-single.html">Checkout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Checkout -->
<section class="shop checkout section">
	<div class="container">
		@if(Request::is('checkout'))
		<form class="form" method="post" action="{{route('checkout.save')}}">
			@elseif(Request::is('checkoutnew')||Request::is('checkoutnew-b'))
			<form class="form" method="post" action="{{route('checkoutnew.save')}}">
				@elseif(Request::is('checkoutnew-b'))
				<form class="form" method="post" action="{{route('checkoutnewb.save')}}">
					@elseif(Request::is('checkout-b'))
					<form class="form" method="post" action="{{route('checkoutb.save')}}">
						@endif
						@csrf
						<div class="row">
							<div class="col-lg-8 col-12">
								<div class="checkout-form">
									<h2>Thanh toán tại đây</h2>
									<hr>
									@if(session('KhachHang'))
									@if(Request::is('checkout') )
									<a href="/checkoutnew" class="formchuyentrangthongtin" style="   color: #f7941d;">Bạn muốn sử dụng thông tin mới </a>
									@elseif(Request::is('checkoutnew'))
									<a href="/checkout" class="formchuyentrangthongtin" style="   color: #f7941d;">Bạn muốn sử dụng thông tin mặc định</a>
									@elseif( Request::is('checkout-b'))
									<a href="/checkoutnew-b" class="formchuyentrangthongtin" style="   color: #f7941d;">Bạn muốn sử dụng thông tin mới </a>
									@elseif(Request::is('checkoutnew-b'))
									<a href="/checkout-b" class="formchuyentrangthongtin" style="   color: #f7941d;">Bạn muốn sử dụng thông tin mặc định</a>
									@endif

									@endif
									<!-- Form -->


									<!--  -->

									@if(Request::is('checkout') || Request::is('checkout-b'))
									@if(session('KhachHang'))
									<input type="hidden" name="MaKhachHang" value="{{$kh->MaKhachHang}}">

									<div class="row">
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label>Tên người dùng<span>*</span></label>
												<input readonly type="text" name="TenNguoiDung" placeholder="" required="required" value="{{$kh->TenNguoiDung}}">
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label>Giới tính<span>*</span></label>
												<input readonly type="text" name="TenNguoiDung" placeholder="" required="required" value="{{$kh->GioiTinh}}">
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label>Địa chỉ Email<span>*</span></label>
												<input readonly type="email" name="Email" placeholder="" required="required" value="{{$kh->Email}}">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label>Số điện thoại<span>*</span></label>
												<input readonly type="number" name="SDT" placeholder="" required="required" value="{{$kh->SDT}}">
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-12">
											<div class="form-group">
												<label>Địa chỉ<span>*</span></label>
												<input readonly type="text" name="DiaChi" placeholder="" required="required" value="{{$kh->DiaChi}}">
											</div>
										</div>

									</div>
									@else

									<script>
										window.location.href = 'http://localhost:8000/checkoutnew';
									</script>

									@endif
									@elseif(Request::is('checkoutnew') || Request::is('checkoutnew-b'))
									<input type="hidden" name="MaTaiKhoan" value="{{$tk->MaTaiKhoan}}">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label>Tên người dùng<span>*</span></label>
												<input type="text" name="TenNguoiDung" placeholder="" required="required">
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-selects">
												<label>Giới tính<span>*</span></label>
												<select name="GioiTinh" placeholder="">
													<option value="Nam">Nam</option>
													<option value="Nữ">Nữ</option>
													<option value="Khác">Khác</option>
												</select>
											</div>
										</div>


										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label>Địa chỉ Email<span>*</span></label>
												<input type="email" name="Email" placeholder="" required="required">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<label>Số điện thoại<span>*</span></label>
												<input type="number" name="SDT" placeholder="" required="required">
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-12">
											<div class="form-group">
												<label>Địa chỉ<span>*</span></label>
												<input type="text" name="DiaChi" placeholder="" required="required">
											</div>
										</div>


										<input type="hidden" name="AnhDaiDien" value="image_1.jpg">
									</div>
									@endif



									<!-- Chi tiết giỏ hàng -->
									<hr>
									<h2>Sản phẩm mua</h2>

									<div class="row">
										<div class="col-12">
											<table class="table shopping-summery">
												<thead>
													<tr class="main-hading">
														<th>Hinhh ảnh</th>
														<th>Tên - Màu sắc</th>
														<th class="text-center">Giá</th>
														<th class="text-center">Số lượng</th>
														<th class="text-center">Thành tiền</th>
													</tr>
												</thead>
												<tbody>
													@if(Request::is('checkoutnew') || Request::is('checkout'))

													@foreach($cart->getCart() as $c)
													<tr>
														<td class="image" data-title="No"><img src="{{asset('uploads/'.$c['image'])}}" alt="#"></td>
														<td class="product-des" data-title="Description">
															<p class="product-name"><a href="#">{{$c['name']}}</a></p>
															<p class="product-des">Màu: {{$c['color']}}</p>
														</td>
														<td class="price" data-title="Price"><span id="cart_price">{{number_format($c['price'])}}</span> VNĐ</td>
														<td class="price" data-title="Price"><span id="cart_price">{{$c['quant']}}</span></td>
														<td class="total-amount" data-title="Total">
															{{number_format( $c['price']* $c['quant'])}} VNĐ
														</td>
													</tr>


													<!-- input chi tiết hoá đơn -->
													<input type="hidden" name="MaQuat[]" value="{{$c['MaQuat']}}">
													<input type="hidden" name="MaCTMauSac[]" value="{{$c['MaCTMauSac']}}">
													<input type="hidden" name="GiaBan[]" value="{{$c['price']}}">
													<input type="hidden" name="SoLuong[]" value="{{$c['quant']}}">


													@endforeach
													@elseif(Request::is('checkoutnew-b') || Request::is('checkout-b'))
													<tr>
														<td class="image" data-title="No"><img src="{{asset('uploads/'.$c['image'])}}" alt="#"></td>
														<td class="product-des" data-title="Description">
															<p class="product-name"><a href="#">{{$c['name']}}</a></p>
															<p class="product-des">Màu: {{$c['color']}}</p>
														</td>

														<td class="price" data-title="Price"><span id="cart_price">{{number_format($c['price'])}}</span> VNĐ</td>
														<td class="price" data-title="Price"><span id="cart_price">{{$c['quant']}}</span></td>
														<td class="total-amount" data-title="Total">
															{{number_format( $c['price']* $c['quant'])}} VNĐ
														</td>
													</tr>

													<!-- input chi tiết hoá đơn -->
													<input type="hidden" name="MaQuat[]" value="{{$c['MaQuat']}}">
													<input type="hidden" name="MaCTMauSac[]" value="{{$c['MaCTMauSac']}}">
													<input type="hidden" name="GiaBan[]" value="{{$c['price']}}">
													<input type="hidden" name="SoLuong[]" value="{{$c['quant']}}">


													@endif
												</tbody>
											</table>


											<!--/ End Shopping Summery -->
										</div>
										<div class="col-lg-12 col-md-12 col-12" style="margin-top:20px;">
											<div class="form-group">
												<label>Ghi chú</label>
												<input type="text" name="GhiChu" placeholder="" required="required">
											</div>
										</div>
									</div>

									<!--/ End Form -->
								</div>
							</div>
							<div class="col-lg-4 col-12">
								<div class="order-details">
									<!-- Order Widget -->
									<div class="single-widget">
										<h2>TỔNG GIỎ HÀNG</h2>
										<div class="content">
											<ul>
												<li>(+) Giá vận chuyển<span>0 VNĐ</span></li>
												<input type="hidden" name="TongTien" value="{{$cart->getTotalPrice()}}">
												@if(Request::is('checkoutnew') || Request::is('checkout'))

												<li class="last">Tổng tiền<span>{{number_format($cart->getTotalPrice())}} VNĐ</span></li>
												@elseif(Request::is('checkoutnew-b') || Request::is('checkout-b'))
												<li class="last">Tổng tiền<span>{{number_format( $c['price']* $c['quant'])}} VNĐ</span></li>
												@endif

											</ul>
										</div>
									</div>
									<!--/ End Order Widget -->
									<!-- Order Widget -->
									<div class="single-widget">
										<h2>Phương thức thanh toán</h2>
										<div class="content">
											<div class="checkbox">
												<label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox">Thanh toán khi giao hàng</label>
											</div>
										</div>
									</div>
									<!--/ End Order Widget -->
									<!-- Payment Method Widget -->
									<div class="single-widget payement">
										<div class="content">
											<img src="images/payment-method.png" alt="#">
										</div>
									</div>
									<!--/ End Payment Method Widget -->
									<!-- Button Widget -->
									<div class="single-widget get-button">
										<div class="content">
											<div class="button">
												<button type="submit" class="btn"> Tiến hành thanh toán</button>
											</div>
										</div>
									</div>
									<!--/ End Button Widget -->
								</div>
							</div>
						</div>
					</form>
	</div>

</section>
<!--/ End Checkout -->

<!-- Start Shop Services Area  -->
<section class="shop-services section home">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Service -->
				<div class="single-service">
					<i class="ti-rocket"></i>
					<h4>Free shiping</h4>
					<p>Orders over $100</p>
				</div>
				<!-- End Single Service -->
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Service -->
				<div class="single-service">
					<i class="ti-reload"></i>
					<h4>Free Return</h4>
					<p>Within 30 days returns</p>
				</div>
				<!-- End Single Service -->
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Service -->
				<div class="single-service">
					<i class="ti-lock"></i>
					<h4>Sucure Payment</h4>
					<p>100% secure payment</p>
				</div>
				<!-- End Single Service -->
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Service -->
				<div class="single-service">
					<i class="ti-tag"></i>
					<h4>Best Peice</h4>
					<p>Guaranteed price</p>
				</div>
				<!-- End Single Service -->
			</div>
		</div>
	</div>
</section>
<!-- End Shop Services -->

<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
	<div class="container">
		<div class="inner-top">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-12">
					<!-- Start Newsletter Inner -->
					<div class="inner">
						<h4>Newsletter</h4>
						<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
						<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
							<input name="EMAIL" placeholder="Your email address" required="" type="email">
							<button class="btn">Subscribe</button>
						</form>
					</div>
					<!-- End Newsletter Inner -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Shop Newsletter -->


@else
<h1>Vui lòng đăng nhập</h1>
@endif

@else
<h1>Vui lòng thêm sản phẩm vào giỏ hàng</h1>
@endif


@endsection