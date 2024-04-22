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
    <form action="{{route('Quat.save',$quat->MaQuat ?? 0)}}" method="post">
        @csrf
        <div class="edit_tendangnhap edit_chung">
            <div class="edit_body-inputvaten">
                <div class="teninput">Tên quạt</div>
                <input class="form-control" id="TenQuat" type="text" name="TenQuat" placeholder="Vui lòng nhập tên quạt!" value="{{$quat['TenQuat'] ?? ''}}">
            </div>

        </div>

        <div class="edit_nickname edit_chung">

            <div class="edit_body-inputvaten">
                <div class="teninput">Mã loại quạt</div>

                <select class="form-select" aria-label="Default select example" id="MaLoaiQuat" name="MaLoaiQuat">
                    @foreach($lq as $lq)
                    <option value="{{$lq->MaLoaiQuat}}">{{$lq->TenLoaiQuat}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="edit_nickname edit_chung">
            <div class="edit_body-inputvaten">
                <div class="teninput">Năm sản xuất</div>
                <select class="form-select" aria-label="Default select example" id="NamSanXuat" name="NamSanXuat">
                    <?php
                    // Lấy năm hiện tại
                    $currentYear = date("Y");
                    // Đổ các năm từ năm hiện tại về quá khứ 50 năm
                    for ($year = $currentYear; $year >= $currentYear - 50; $year--) {
                        echo '<option value="' . $year . '">' . $year . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>


        <div class="title-form_image">
            Hình ảnh
        </div>
        <div class="form_upload" style="width:100%; display:flex; justify-content:center;">
            <div class=" input-group " style="width:80%;">
                <input type="text" class="form-control" id="HinhAnhXe" name="HinhAnhXe" placeholder="Vui lòng chọn hình ảnh!" aria-describedby="button-addon2" readonly value="{{$quat['HinhAnhXe'] ?? ''}}">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="onOverlay()"><img src="/ADMIN/IMAGE/icons8_upload_26px.png" alt=""></button>
            </div>
        </div>

        <div class="title-form_image">
            Danh sách hình ảnh
        </div>
        <div class="form_upload" style="width:100%; display:flex; justify-content:center;">
            <div class=" input-group  " style="width:80%;">
                <input type="text" class="form-control" id="DSHinhAnhXe" name="DSHinhAnhXe" placeholder="Vui lòng chọn hình ảnh!" aria-describedby="button-addon2" readonly value="{{$quat['DSHinhAnhXe'] ?? ''}}">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="onOverlay2()"><img src="/ADMIN/IMAGE/icons8_upload_26px.png" alt=""></button>
            </div>
        </div>

        <div class="edit_hoten edit_chung">

            <div class="edit_body-inputvaten">
                <div class="teninput">Giá quạt (VNĐ)</div>
                <input class="form-control" id="Gia" type="text" name="Gia" placeholder="Vui lòng nhập giá quạt !" value="{{$quat['Gia'] ?? ''}}">
            </div>
        </div>

        <div class="edit_nickname edit_chung">

            <div class="edit_body-inputvaten">
                <div class="teninput">Giá quạt khuyến mãi (VNĐ)</div>
                <input class="form-control" id="GiaKhuyenMai" type="text" name="GiaKhuyenMai" placeholder="Vui lòng nhập giá quạt khuyến mãi" value="{{$quat['GiaKhuyenMai'] ?? ''}}">
            </div>
        </div>
        <div class="edit_nickname edit_chung">
            <div class="edit_body-inputvaten">
                <div class="teninput">Mô tả</div>
                <textarea class="form-control" name="MoTa" id="MoTa"> {{$quat->MoTa ?? ""}}</textarea>
                <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('MoTa');
                </script>
            </div>
        </div>

        <div class="controls">
            <input id="btn_luu" type="submit" value="Lưu">
        </div>
</div>
</form>

<div id="overlay" class="overlay">
    <div class="popup ">
        <div class="close">
            <button onclick="closeOverlay()">X</button>
        </div>
        <div class="dienthongtin">
            <iframe src="{{url('file/dialog.php?field_id=HinhAnhXe')}}" style="width:100% ;overflow-y:auto; height:600px; boder:none;"></iframe>
        </div>
    </div>
</div>

<div id="overlay2" class="overlay">
    <div class="popup ">
        <div class="close">
            <button onclick="closeOverlay()">X</button>
        </div>
        <div class="dienthongtin">
            <iframe src="{{url('file/dialog.php?field_id=DSHinhAnhXe')}}" style="width:100% ;overflow-y:auto; height:600px; boder:none;"></iframe>
        </div>
    </div>
</div>
@endsection