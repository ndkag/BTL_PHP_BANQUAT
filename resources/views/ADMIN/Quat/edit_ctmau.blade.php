@extends('ADMIN.layout')
@section('title','Quản lý quạt')
@section('main')

<!-- START---------------------header-maint -->
<div class="header-maint">
    <div class="title-header">
        <h1 id="id_title_header">TRANG QUẢN LÝ NGƯỜI DÙNG</h1>
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


    @if(Request::is('admin/quat/create_ctmausac_new'))
    <form action="{{ route('Quat.save_ctmaunew', $quat->MaCTMauSac ?? 0) }}" method="post">
        @elseif(Request::is(['admin/quat/create_ctmausac/*', 'admin/quat/*/edit_ctmausac']))
        <form action="{{ route('Quat.save_ctmau', $quat->MaCTMauSac ?? 0) }}" method="post">
            @endif

            @csrf
            <input type="hidden" name="MaQuat" value="{{$quat->MaQuat ?? ''}}">

            <div class="edit_tendangnhap edit_chung">
                <div class="edit_body-inputvaten">
                    <div class="teninput">Tên màu sắc</div>
                    <input class="form-control" id="TenMauSac" type="text" name="TenMauSac" placeholder="Vui lòng nhập tên màu sắc !" value="{{$quat['TenMauSac'] ?? ''}}">
                </div>

            </div>

            <div class="edit_hoten edit_chung">

                <div class="edit_body-inputvaten">
                    <div class="teninput">Số lượng</div>
                    <input class="form-control" id="SoLuong" type="text" name="SoLuong" placeholder="Vui lòng nhập số lượng !" value="{{$quat['SoLuong'] ?? ''}}">
                </div>
            </div>

            <div class="edit_nickname edit_chung">

                <div class="edit_body-inputvaten">
                    <div class="teninput">Mã màu</div>
                    <input class="form-control" id="MaMau" type="text" name="MaMau" placeholder="Vui lòng nhập mã màu !" value="{{$quat['MaMau'] ?? ''}}">
                </div>
            </div>

            <div class="controls">
                <input id="btn_luu" type="submit" value="Lưu">
            </div>
        </form>

        @endsection