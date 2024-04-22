@extends('USER.layout')
@section('title','Thông tin tài khoản')
@section('main')


<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="index1.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="blog-single.html">Thông tin tài khoản</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->


<!-- Start Contact -->
<section id="contact-us" class="contact-us section">
	@if(session('TaiKhoan') && !session('KhachHang'))
	<div class="container">
		<div class="contact-head">
			<div class="row">
				<div class="col-lg-12 col-12">
					<div class="form-main">
						<div class="title">
							<h4>Thông tin tài khoản</h4>
							<h3>Vui lòng cập nhật thông tin tài khoản</h3>
						</div>

						<form class="form" action="{{route('myaccount.save')}}" method="post" enctype="multipart/form-data">
							@csrf
							<input name="SDT" type="hidden" value="{{$tk->SDT}}">
							<input name="Email" type="hidden" value="{{$tk->Email}}">
							<input name="MaTaiKhoan" type="hidden" value="{{$tk->MaTaiKhoan}}">

							<div class="row">
								<div class="col-lg-6 col-12">
									<div class="form-group">
										<label>Họ và tên<span>*</span></label>
										<input name="TenNguoiDung" type="text" placeholder="">
									</div>
								</div>


								<div class="col-lg-6 col-12">
									<div class="form-selects">
										<label>Giới tính<span>*</span></label>
										<select name="GioiTinh" placeholder="">
											<option value="Nam">Nam</option>
											<option value="Nữ">Nữ</option>
											<option value="Khác">Khác</option>
										</select>
									</div>
								</div>



								<div class="col-12">
									<div class="form-group message">
										<label>Địa chỉ<span>*</span></label>
										<textarea name="DiaChi" placeholder=""></textarea>
									</div>
								</div>

								<div class="col-4">
									<div class="form-group message">
										<label>Ảnh đại diện<span>*</span></label>
										<div class="input-group mb-3">
											<input type="file" name="image_upload" class="form-control" id="inputGroupFile02">
										</div>
									</div>
								</div>

								<div class="col-12">
									<div class="form-group button">
										<button type="submit" class="btn ">Cập nhật</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>


	@else(session('TaiKhoan') && session('KhachHang'))
	<div class="container">
		<div class="contact-head">
			<div class="row">
				<div class="col-lg-12 col-12">
					<div class="form-main">
						<div class="title">
							<h3 style="    color: #f7941d;"> Thông tin tài khoản</h3>
						</div>
						<div class="informations">
							<?php
							$kh = session('KhachHang');
							$tks = session('TaiKhoan');
							?>
							<div class="row">
								<div class="col-9">
									<div class="row " style="margin-bottom:15px;">
										<div class="col">
											<div class="row">
												<div class="title_info"> Tên tài khoản:</div>{{$tks->TenTaiKhoan ?? ''}}
											</div>
										</div>
										<div class="col">
											<div class="row">
												<div class="title_info"> Email:</div>{{$tks->Email ?? ''}}
											</div>
										</div>
										<div class="col">
											<div class="row">
												<div class="title_info"> Số điện thoại:</div>{{$tk ->SDT ?? ''}}
											</div>
										</div>
									</div>
									<div class="row " style="margin-bottom:15px;">
										<div class="col">
											<div class="row">
												<div class="title_info"> Họ và tên:</div>{{$kh->TenNguoiDung ?? ''}}
											</div>
										</div>
										<div class="col">
											<div class="row">
												<div class="title_info"> Giới tính:</div>{{$kh->GioiTinh ?? ''}}
											</div>
										</div>
										<div class="col">

										</div>
									</div>
									<div class="row " style="margin-bottom:15px;">
										<div class="col">
											<div class="row">
												<div class="title_info"> Địa chỉ:</div>{{$kh->DiaChi ?? ''}}
											</div>
										</div>
									</div>
									<div class="row " style="margin-bottom:15px;">
										<div class="col">
											<div class="row">
												<a href="">Đổi mật khẩu</a>
											</div>
										</div>
									</div>

								</div>
								<div class="col-3">
									<div class="avt_info"><img src="{{asset('uploads/'.$kh->AnhDaiDien)}}" alt=""></div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	@endif

</section>
<!--/ End Contact -->


@endsection