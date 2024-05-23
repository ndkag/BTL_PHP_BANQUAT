@extends('ADMIN.layout')
@section('title','Quản lý người dùng')
@section('main')

@if(session('tka') && session('tka')->Quyen == 0)

<!-- START---------------------header-maint -->
<div class="header-maint">
    <div class="title-header">
        <h1 id="id_title_header">TRANG QUẢN LÝ NHÂN VIÊN</h1>
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

            <button class="id_load" id="id_load_nguoidung">
                <img src="{{asset('ADMIN/IMAGE/icons8_refresh_2.svg')}}" alt="" width="100%" height="100%">
            </button>

        </div>
    </div>

    <form action="{{route('nhanvien.save',$kh->MaNhanVien ?? 0)}}" method="post" enctype="multipart/form-data">
        @csrf


        <div class="edit_tendangnhap edit_chung">
            <div class="edit_body-inputvaten">
                <div class="teninput">Họ và tên</div>
                <input class="form-control" id="TenNhanVien" type="text" name="TenNhanVien" placeholder="Vui lòng nhập họ và tên!" value="{{$kh['TenNhanVien'] ?? ''}}">
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

                <div class="teninput">Chức vụ</div>
                <input class="form-control" id="ChucVu" type="text" name="ChucVu" placeholder="Vui lòng nhập địa chỉ!" value="{{$kh['ChucVu'] ?? ''}}">
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
        <div class="edit_hoten edit_chung">

            <div class="edit_body-inputvaten">
                <div class="teninput">Lương</div>
                <input class="form-control" id="Luong" type="text" name="Luong" placeholder="Vui lòng nhập Luong!" value="{{$kh['Luong'] ?? ''}}">
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



@else

<div class="main_wrapper">
    <div class="main">
        <div class="antenna">
            <div class="antenna_shadow"></div>
            <div class="a1"></div>
            <div class="a1d"></div>
            <div class="a2"></div>
            <div class="a2d"></div>
            <div class="a_base"></div>
        </div>
        <div class="tv">
            <div class="cruve">
                <svg xml:space="preserve" viewBox="0 0 189.929 189.929" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1" class="curve_svg">
                    <path d="M70.343,70.343c-30.554,30.553-44.806,72.7-39.102,115.635l-29.738,3.951C-5.442,137.659,11.917,86.34,49.129,49.13
        C86.34,11.918,137.664-5.445,189.928,1.502l-3.95,29.738C143.041,25.54,100.895,39.789,70.343,70.343z"></path>
                </svg>
            </div>
            <div class="display_div">
                <div class="screen_out">
                    <div class="screen_out1">
                        <div class="screen">
                            <span class="notfound_text"> NOT FOUND</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lines">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <div class="buttons_div">
                <div class="b1">
                    <div></div>
                </div>
                <div class="b2"></div>
                <div class="speakers">
                    <div class="g1">
                        <div class="g11"></div>
                        <div class="g12"></div>
                        <div class="g13"></div>
                    </div>
                    <div class="g"></div>
                    <div class="g"></div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="base1"></div>
            <div class="base2"></div>
            <div class="base3"></div>
        </div>
    </div>
    <div class="text_404">
        <div class="text_4041">4</div>
        <div class="text_4042">0</div>
        <div class="text_4043">4</div>
    </div>
</div>
@endif
@endsection