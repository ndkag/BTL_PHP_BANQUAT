@extends('ADMIN.layout')
@section('title','Quản lý người dùng')
@section('main')



<!-- START---------------------header-maint -->
<div class="header-maint">
    <div class="title-header">
        <h1 id="id_title_header">TRANG QUẢN LÝ KHÁCH HÀNG</h1>
        <button id="btn_tiemkiem_header"> <img src="{{asset('ADMIN/IMAGE/icon_btn_timkiem.svg')}}" alt=""></button>
        <div id="khung_inp_timkiem">
            <img src="{{asset('ADMIN/IMAGE/icon_btn_timkiem.svg')}}" alt="#">
            <input type="text" id="inp_timkiem_header" placeholder="Tìm kiếm thông tin người dùng..." ng-keyup="handleKeyUp($event)">
        </div>
        <button id="btn_thoat_timkiem_header"> <img src="{{asset('ADMIN/IMAGE/icon_btn_close.svg')}}" alt=""> </button>

    </div>
    <div class="control-header" id="avt_user">
        <div class="caidat-control_header"><a href="#"><img src="{{asset('ADMIN/IMAGE/setting.png')}}" alt="cai dat"></a>
        </div>

        <div class="thongbap-control_header"><a href="#"><img src="{{asset('ADMIN/IMAGE/notification.png')}}" alt="thông báo"></a>
        </div>
        <div class="ctl_user_header">
            <div onclick="hienthichucnanguser()" id="user-control_header">
                <a href="#"><img id="avt_user_menu" src="" alt="thông báo"><i class="fa-solid fa-angle-down"></i>
                </a>
            </div>

        </div>
        <div class="menu-bar"> <img width="35px" height="35px" src="{{asset('ADMIN/IMAGE/menu.png')}}" alt="#"></div>
    </div>
</div>
<!-- END---------------------header-maint -->
<!-- START-------------------CONTROL-EDIT -->


<div class="control_edit ">
    <div class="edits">
        <div class="tieudevaload_edit">
            <div class="tieude_tieudevaload">
                Trang điền thông tin
            </div>

            <button class="id_load" ng-click="refresh()" id="id_load_nguoidung">
                <img src="{{asset('ADMIN/IMAGE/icons8_refresh_2.svg')}}" alt="" width="100%" height="100%">
            </button>

        </div>
    </div>
    <form action="{{route('khachhang.save',$kh->MaKhachHang ?? 0)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="edit_tendangnhap edit_chung">
            <div class="edit_body-inputvaten">
                <div class="teninput">Họ và tên</div>
                <input class="form-control" id="TenNguoiDung" type="text" name="TenNguoiDung" placeholder="Vui lòng nhập họ và tên!" value="{{$kh['TenNguoiDung'] ?? ''}}">
            </div>

        </div>


        <div class="edit_nickname edit_chung">

            <div class="edit_body-inputvaten">
                <div class="teninput">Giới tính</div>

                <select class="form-select" aria-label="Default select example" id="GioiTinh" name="GioiTinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>
        </div>

        <div class="edit_matkhau edit_chung">
            <div class="edit_body-inputvaten">

                <div class="teninput">Địa chỉ</div>
                <input class="form-control" id="DiaChi" type="text" name="DiaChi" placeholder="Vui lòng nhập địa chỉ!" value="{{$kh['DiaChi'] ?? ''}}">
            </div>

        </div>

        <div class="edit_nickname edit_chung">

            <div class="edit_body-inputvaten">
                <div class="teninput">Mã tài khoản</div>

                <select class="form-select" aria-label="Default select example" id="MaTaiKhoan" name="MaTaiKhoan">
                    @foreach($tk as $tk)
                    <option value="{{$tk->MaTaiKhoan}}">{{$tk->MaTaiKhoan}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="edit_nickname edit_chung">

            <div class="edit_body-inputvaten">
                <div class="teninput">Số điện thoại</div>
                <input class="form-control" id="SDT" type="text" name="SDT" placeholder="Vui lòng nhập số điện thoại!" value="{{$kh['SDT'] ?? ''}}">
            </div>


        </div>
        <div class="edit_hoten edit_chung">

            <div class="edit_body-inputvaten">
                <div class="teninput">Email</div>
                <input class="form-control" id="Email" type="text" name="Email" placeholder="Vui lòng nhập Email!" value="{{$kh['Email'] ?? ''}}">
            </div>
        </div>

        <div class="title-form_image">
            Hình ảnh
        </div>
        <div class="form_upload" style="width:100%; display:flex; justify-content:center;">
            <div class=" input-group " style="width:80%;">
                <input type="file" class="form-control" id="HinhAnhXe" name="image_upload" placeholder="Vui lòng chọn hình ảnh!" aria-describedby="button-addon2" readonly value="{{$kh['AnhDaiDien'] ?? ''}}">
            </div>
        </div>


        <div class="controls">
            <input id="btn_luu" type="submit" value="Lưu">
        </div>
</div>
</form>



@endsection