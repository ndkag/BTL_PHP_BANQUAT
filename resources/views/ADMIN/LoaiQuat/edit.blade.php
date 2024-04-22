@extends('ADMIN.layout')
@section('title','Quản lý người dùng')
@section('main')

<!-- START---------------------header-maint -->
<div class="header-maint">
    <div class="title-header">
        <h1 id="id_title_header">TRANG QUẢN LÝ LOẠI QUẠT</h1>
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
            <div id="khung_ctl_user_header">
                <button id="btn_dangxuat" onclick="localStorage.setItem('user_doan',null);window.location.href ='./Đăng nhập.html' ">Đăng xuất</button>
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

    <form action="{{route('loaiquat.save',$lq->MaLoaiQuat ?? 0)}}" method="post">
        @csrf
        <div class="edit_tendangnhap edit_chung">
            <div class="edit_body-inputvaten">
                <div class="teninput">Tên loại quạt</div>
                <input id="TenLoaiQuat" type="text" name="TenLoaiQuat" placeholder="Vui lòng nhập tên loại quạt!" value="{{$lq['TenLoaiQuat'] ?? ''}}">
            </div>

        </div>


        <div class="controls">
            <button id="btn_luu" type="submit">Lưu</button>
        </div>
</div>
</form>



@endsection