@extends('ADMIN.layout')
@section('title','Quản lý quạt')

@section('main')
<?php
$stt = 1;
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

    <div class="control-search">
        <form class="form_control-search" action="{{ route('ADMIN.Quat.index') }}" method="GET">
            <div class="search-title">
                Tìm kiếm
            </div>
            <input id="edt_search" type="text" name="search" placeholder="Vui lòng nhập thông tin cần tìm!" value="{{ $search }}">
            <button type="submit" class="btn_search">Tìm kiếm</button>
        </form>
        <a href="/admin/quat/create">
            <button class="btn_them">

                Thêm</button>
        </a>

    </div>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã quạt</th>
                <th>Tên quạt</th>
                <th>Mã loại quạt</th>
                <th>Năm SX</th>
                <th>Hình ảnh xe</th>
                <th>Giá (VNĐ)</th>
                <th>Giá KM (VNĐ)</th>
                <th>Xoá</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($quat as $t)

            <tr>
                <td>{{$stt++}}</td>
                <td>{{$t['MaQuat']}}</td>
                <td>{{$t['TenQuat']}}</td>
                <td>{{$t['MaLoaiQuat']}}</td>
                <td>{{$t['NamSanXuat']}}</td>
                <td class="img-hinhanhquat_ad"><img src="{{ asset('Uploads/' . $t['HinhAnhXe']) }}" style="width:60px; " alt=""></td>


                <td>{{number_format($t['Gia'])}}</td>
                <td>{{number_format($t['GiaKhuyenMai'])}}</td>




                <td>
                    <a onclick="return confirm('Bạn có chắc muốn xoá thông tin này ko?')" href="/admin/quat/{{$t['MaQuat']}}/del">
                        <button id="btn_sua" style="width: 100%; height: 100%;">
                            <img src="{{asset('ADMIN/IMAGE/icon_xoanguoidung_quanly.svg')}}" alt="lỗi">
                        </button>
                    </a>
                </td>

                <td>
                    <a href="{{route('Quat.detail_ad',$t['MaQuat'])}}">

                        <button id="btn_sua" style="width: 100%; height: 100%;">
                            <img id="icon_detail" src="{{asset('ADMIN/IMAGE/icons8_collapse_arrow_1.svg')}}" alt="lỗi" width="25px">
                        </button>
                    </a>
                </td>
            </tr>

            <!-- <tr id="ct_mota" style="display: none;">
                <td colspan="100" style="padding: 0;">
                    <div class="khung_tomtats">
                        <div class="title_cotphu">Mô Tả</div>
                        <div class="synopsis_tomtat">
                            {!! $t['MoTa'] !!}
                        </div>
                    </div>
                </td>
            </tr>

            <tr id="ct_image" style="display: none;">
                <td colspan="100" style="padding: 0;">
                    <div class="title_cotphu">Danh sách hình ảnh</div>
                    <div class="khung_noidungs">

                        <div class="image_tomtat">
                            <?php
                            // Chuyển đổi chuỗi JSON thành mảng
                            // $dtImage = json_decode($t['DSHinhAnhXe'], true);
                            // // Kiểm tra xem mảng có tồn tại không và có chứa các giá trị không
                            // if ($dtImage && is_array($dtImage)) {

                            //     foreach ($dtImage as $dti) {
                            //         echo '<img src="' . asset('Uploads/' . $dti) . '" style="max-width:300px; max-height:350px;"  alt="">';
                            //     }
                            // }
                            ?>

                        </div>
                    </div>
                </td>
            </tr> -->

            @endforeach
        </tbody>
    </table>

    <div class="box-sum">
        <div class="box-all">
            <!-- Trong phần hiển thị phân trang -->
            <div class="pagination">
                <ul class="pagination-list">
                    @if ($quat->onFirstPage())
                    <li class="disabled"><span>&laquo;</span></li>
                    @else
                    <li><a href="{{ $quat->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif
                    @foreach ($quat->getUrlRange(1, $quat->lastPage()) as $page => $url)
                    @if ($page == $quat->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                    @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                    @endforeach

                    @if ($quat->hasMorePages())
                    <li><a href="{{ $quat->nextPageUrl() }}" rel="next">&raquo;</a></li>
                    @else
                    <li class="disabled"><span>&raquo;</span></li>
                    @endif

                </ul>
            </div>



        </div>
    </div>

</div>
</div>

@endsection