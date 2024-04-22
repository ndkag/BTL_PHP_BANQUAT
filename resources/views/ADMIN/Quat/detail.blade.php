@extends('ADMIN.layout')
@section('title','Quản lý quạt')

@section('main')

<?php
$stt = 0;
?>
<!-- START---------------------header-maint -->
<div class="header-maint">
    <div class="title-header">
        <h1 id="id_title_header">TRANG QUẢN LÝ QUẠT</h1>

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

<!-- END-------------------CONTROL-EDIT -->
<div class="container-hienthi">
    <div class="quat-details">

        <h4 class="quat_detail_title">
            THÔNG TIN CHI TIẾT QUẠT
        </h4>
        <table>
            <thead>
                <tr>
                    <th class="col-2">Thông tin quạt</th>
                    <th><a type="button" class="btn btn-secondary" href="{{route('Quat.edit',$p['MaQuat'])}}">Sửa thông tin</a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-2">Mã quạt</td>
                    <td>{{$p['MaQuat']}} </td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Tên quạt</td>
                    <td>{{$p['TenQuat']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Mã loại quạt</td>
                    <td>{{$p['MaLoaiQuat']}}</td>
                </tr>
                <!-- ------------------------- -->

                <tr>
                    <td>Giá gốc</td>
                    <td>{{number_format($p['Gia'])}} VNĐ</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Giá khuyến mãi</td>
                    <td>{{number_format($p['GiaKhuyenMai'])}} VNĐ</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Năm sản phẩm</td>
                    <td>{{$p['NamSanXuat']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Hình ảnh quạt</td>
                    <td><img src="{{ asset('Uploads/' . $p['HinhAnhXe']) }}" style="width:150px; " alt=""></td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Danh sách hình ảnh</td>
                    <td>

                        <?php
                        // Chuyển đổi chuỗi JSON thành mảng
                        $dtImage = json_decode($p['DSHinhAnhXe'], true);
                        // Kiểm tra xem mảng có tồn tại không và có chứa các giá trị không
                        if ($dtImage && is_array($dtImage)) {

                            foreach ($dtImage as $dti) {
                                echo '<img src="' . asset('Uploads/' . $dti) . '" style="max-width:150px; max-height:150px;"  alt="">';
                            }
                        }
                        ?>
                    </td>

                </tr>
                <!-- ------------------------- -->
            </tbody>
        </table>

        <table>
            @foreach($ct as $ct)
            <thead>
                <tr>
                    <th class="col-2">Chi tiết màu số: {{$stt++}} </th>
                    <th>

                        @if($stt == 1)
                        <a type="button" href="{{route('Quat.create_ctmau',$ct['MaQuat'])}}" class="btn btn-success">Thêm</a>
                        @endif
                        <a type="button" class="btn btn-secondary" href="{{route('Quat.edit_ctmausac',$ct['MaCTMauSac'])}}">Sửa màu: {{$ct['MaCTMauSac']}} </a>
                        @if($stt > 1)
                        <a type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xoá thông tin này ko?')" href="{{route('Quat.del_ctmau',$ct['MaCTMauSac'])}}">Xoá màu: {{$ct['MaCTMauSac']}} </a>
                        @endif

                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mã chi tiết màu</td>
                    <td>{{$ct['MaCTMauSac']}}</td>
                </tr>

                <!-- ------------------------- -->
                <tr>
                    <td>Tên màu sắc</td>
                    <td>{{$ct['TenMauSac']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Số lượng</td>
                    <td>{{$ct['SoLuong']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Mã màu</td>
                    <td style="display:flex;">{{$ct['MaMau']}}
                        <nav class="ctmausac" style=" border:0.5px solid ; height: 20px; width: 50px; background-color: {{$ct['MaMau']}}; margin-left: 10px; "></nav>
                    </td>
                </tr>
                <!-- ------------------------- -->
            </tbody>
            @endforeach
        </table>

        <table>
            <thead>
                <tr>
                    <th class="col-2">Thông số kỹ thuật</th>
                    <th><a type="button" class="btn btn-secondary" href="{{route('Quat.edit_thongso',$ctq['MaCT'])}}">Sửa thông số kỹ thuật</a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mã chi tiết</td>
                    <td>{{$ctq['MaCT']}}</td>
                </tr>

                <!-- ------------------------- -->
                <tr>
                    <td>Công suất</td>
                    <td>{{$ctq['CongSuatQuat']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Chế độ gió</td>
                    <td>{{$ctq['CheDoGio']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Bảng điều khiển</td>
                    <td>{{$ctq['BangDieuKhien']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Loại Motor</td>
                    <td>{{$ctq['LoaiMotor']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Đường kính cánh quạt</td>
                    <td>{{$ctq['DuongKinhCanhQuat']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Chiều dài dây điện</td>
                    <td>{{$ctq['ChieuDaiDayDien']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Xuất sứ</td>
                    <td>{{$ctq['XuatXu']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Tiện ích</td>
                    <td>{{$ctq['TienIch']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Kích thước khối lượng</td>
                    <td>{{$ctq['KichThuocKhoiLuong']}}</td>
                </tr>
                <!-- ------------------------- -->
                <tr>
                    <td>Thông tin khác</td>
                    <td>{{$ctq['ThongTinKhac']}}</td>
                </tr>
                <!-- ------------------------- -->
            </tbody>
        </table>
    </div>

</div>

@endsection