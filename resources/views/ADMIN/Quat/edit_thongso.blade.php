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


<form action="{{route('Quat.save_thongso',$ctq->MaCT ?? 0)}}" method="post">
    @csrf
    <div class="control_edit ">
        <div class="edits">
            <div class="tieudevaload_edit">
                <div class="tieude_tieudevaload">
                    Trang điền thông tin
                </div>
            </div>

            <input type="hidden" name="MaQuat" value="{{$ctq->MaQuat ?? ''}}">


            <div class="edit_tendangnhap edit_chung_1">
                <div class="edit_body-inputvaten">
                    <div class="teninput">Công suất quạt</div>
                    <input class="form-control" id="CongSuatQuat" type="text" name="CongSuatQuat" placeholder="VD: 100W" value="{{$ctq['CongSuatQuat'] ?? ''}}">
                </div>

            </div>

            <div class="edit_tendangnhap edit_chung_1">
                <div class="edit_body-inputvaten">
                    <div class="teninput">Chế độ gió</div>
                    <input class="form-control" id="CheDoGio" type="text" name="CheDoGio" placeholder="VD: 3 tốc độ" value="{{$ctq['CheDoGio'] ?? ''}}">
                </div>

            </div>

            <div class="edit_tendangnhap edit_chung_1">
                <div class="edit_body-inputvaten">
                    <div class="teninput">Bảng điều khiển </div>
                    <input class="form-control" id="BangDieuKhien" type="text" name="BangDieuKhien" placeholder="VD: Điều khiển từ xa" value="{{$ctq['BangDieuKhien'] ?? ''}}">
                </div>

            </div>

            <div class="edit_tendangnhap edit_chung_1">
                <div class="edit_body-inputvaten">
                    <div class="teninput">Loại Motor </div>
                    <input class="form-control" id="LoaiMotor" type="text" name="LoaiMotor" placeholder="VD: Motor AC" value="{{$ctq['LoaiMotor'] ?? ''}}">
                </div>

            </div>

            <div class="edit_tendangnhap edit_chung_1">
                <div class="edit_body-inputvaten">
                    <div class="teninput">Đường kính cánh quạt </div>
                    <input class="form-control" id="DuongKinhCanhQuat" type="text" name="DuongKinhCanhQuat" placeholder="VD: 50 cm" value="{{$ctq['DuongKinhCanhQuat'] ?? ''}}">
                </div>

            </div>

            <div class="edit_tendangnhap edit_chung_1">
                <div class="edit_body-inputvaten">
                    <div class="teninput">Chiều dài dây điện </div>
                    <input class="form-control" id="ChieuDaiDayDien" type="text" name="ChieuDaiDayDien" placeholder="VD: 1.5m" value="{{$ctq['ChieuDaiDayDien'] ?? ''}}">
                </div>

            </div>

            <div class="edit_tendangnhap edit_chung_1">
                <div class="edit_body-inputvaten">
                    <div class="teninput">Xuất xứ </div>
                    <input class="form-control" id="XuatXu" type="text" name="XuatXu" placeholder="VD: Việt Nam" value="{{$ctq['XuatXu'] ?? ''}}">
                </div>

            </div>

            <div class="edit_tendangnhap edit_chung_1">
                <div class="edit_body-inputvaten">
                    <div class="teninput">Tiện ích </div>
                    <input class="form-control" id="TienIch" type="text" name="TienIch" placeholder="VD: Có chế độ tự ngắt" value="{{$ctq['TienIch'] ?? ''}}">
                </div>

            </div>
            <div class="edit_tendangnhap edit_chung_1">
                <div class="edit_body-inputvaten">
                    <div class="teninput">Kích thước khối lượng </div>
                    <input class="form-control" id="KichThuocKhoiLuong" type="text" name="KichThuocKhoiLuong" placeholder="VD: 25x25x25 cm" value="{{$ctq['KichThuocKhoiLuong'] ?? ''}}">
                </div>

            </div>


        </div>


        <div class="edit_nickname edit_chung">
            <div class="edit_body-inputvaten">
                <div class="teninput">Thông tin khác</div>
                <textarea class="form-control" name="ThongTinKhac" id="ThongTinKhac"> {{$ctq['KichThuocKhoiLuong'] ?? ""}}</textarea>
                <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('ThongTinKhac');
                </script>
            </div>
        </div>

        <div class="controls">
            <input id="btn_luu" type="submit" value="Lưu">
        </div>
    </div>
</form>

@endsection