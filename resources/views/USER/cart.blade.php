@extends('USER.layout')
@section('title','Cart')

@section('main')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="/">Trang chủ<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="#">Giỏ hàng</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Shopping Summery -->
				<table class="table shopping-summery">
					<thead>
						<tr class="main-hading">
							<th>Hinhh ảnh</th>
							<th>Tên - Màu sắc</th>
							<th class="text-center">Giá</th>
							<th class="text-center">Số lượng</th>
							<th class="text-center">Thành tiền</th>
							<th class="text-center">Cập nhật</th>
							<th class="text-center"> <a onclick="return confirm('Bạn có chắc muốn xoá tất cả sản phẩm khỏi giỏ hàng?')" href="{{ route('cart.removeAll') }}"><i class="ti-trash remove-icon"></i></a></th>
						</tr>
					</thead>
					<tbody>
						@foreach($cart->getCart() as $c)
						<tr>
							<form action="{{ route('cart.update') }}" method="POST">
								@csrf
								<input type="hidden" name="MaQuat" value="{{$c['MaQuat']}}">

								<td class="image" data-title="No"><img src="{{asset('uploads/'.$c['image'])}}" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#">{{$c['name']}}</a></p>
									<p class="product-des">Màu: {{$c['color']}}</p>
								</td>
								<td class="price" data-title="Price"><span id="cart_price">{{number_format($c['price'])}}</span> VNĐ</td>
								<!-- <td class="price" data-title="Price"><span id="cart_price">{{$c['quant']}}</span></td> -->
								<td>
									<input class="inp-soluong_cart" type="number" name="quant" min="1" max="50" value="{{$c['quant']}}">
								</td>

								<td class="total-amount" data-title="Total">
									{{number_format( $c['price']* $c['quant'])}} VNĐ
								</td>
								<td>
									 <button type="submit" class="btn-update_cart"><img src="{{asset('images/icons8_update_left_rotation.svg')}}" alt=""> </button>
								</td>
								<td onclick="return confirm('Bạn có chắc muốn xoá sản phẩm khỏi giỏ hàng?')" class="action" data-title="Remove">
									<a href="{{ route('cart.destroy', ['MaQuat' => $c['MaQuat']]) }}"><i class="ti-trash remove-icon"></i></a>
								</td>
							</form>
						</tr>




						@endforeach
					</tbody>
				</table>
				<!--/ End Shopping Summery -->
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<!-- Total Amount -->
				<div class="total-amount">
					<div class="row">
						<div class="col-lg-8 col-md-5 col-12">
							<div class="left">
								<div class="coupon">
									<form action="#" target="_blank">
										<input name="Coupon" placeholder="Enter Your Coupon">
										<button class="btn">Apply</button>
									</form>
								</div>
								<div class="checkbox">
									<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-7 col-12">
							<div class="right">
								<ul>
									<li>Cart Subtotal<span>$330.00</span></li>
									<li>Shipping<span>Free</span></li>
									<li>You Save<span>$20.00</span></li>
									<li class="last">Tổng tiền<span>{{number_format($cart->getTotalPrice())}} VNĐ</span></li>
								</ul>
								<div class="button5">
									<a href="/checkout" class="btn">Thanh toán</a>
									<a href="/" class="btn">Tiếp tục mua hàng</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ End Total Amount -->
			</div>
		</div>
	</div>
</div>
<!--/ End Shopping Cart -->

<!-- Start Shop Services Area  -->
<section class="shop-services section">
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
<!-- End Shop Newsletter -->

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





@endsection