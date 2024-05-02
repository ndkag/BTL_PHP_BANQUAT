@extends('ADMIN.layout')
@section('title','Quản lý người dùng')
@section('main')


<?php
$stt = 1;
?>
<!-- START---------------------header-maint -->
<div class="header-maint">
    <div class="title-header">
        <h1 id="id_title_header">TRANG QUẢN LÝ KHÁCH HÀNG</h1>

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
        <form class="form_control-search" action="{{ route('ADMIN.khachhang.index') }}" method="GET">
            <div class="search-title">
                Tìm kiếm
            </div>
            <input id="edt_search" type="text" name="search" placeholder="Vui lòng nhập thông tin cần tìm!" value="{{ $search }}">
            <button type="submit" class="btn_search">Tìm kiếm</button>
        </form>
        <a href="/admin/khachhang/create">
            <button class="btn_them">
                Thêm</button>
        </a>

    </div>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Ảnh đại diện</th>
                <th>Mã tài khoản</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Sửa</th>
                <th>Xoá</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kh as $t)
            <tr>
                <td>{{$stt++}}</td>
                <td>{{$t['MaKhachHang']}}</td>
                <td>{{$t['TenNguoiDung']}}</td>
                <td>{{$t['GioiTinh']}}</td>
                <td>{{$t['DiaChi']}}</td>
                <td> <img src="{{asset('Uploads/'.$t['AnhDaiDien'])}}" alt="" style="max-width:100px; max-height:100px;"></td>
                <td>{{$t['MaTaiKhoan']}}</td>
                <td>{{$t['SDT']}}</td>
                <td>{{$t['Email']}}</td>

                <td>
                    <button id="btn_sua" style="width: 100%; height:100%;">
                        <a href="{{route('khachhang.edit',$t['MaKhachHang'])}}">
                            <img src="{{asset('ADMIN/IMAGE/icon_suanguoidung_quanly.svg')}}" alt="lỗi">

                        </a>
                    </button>
                </td>
                <td>
                    <a onclick="return confirm('Bạn có chắc muốn xoá thông tin này ko?')" href="/admin/khachhang/{{$t['MaKhachHang']}}/del">
                        <button id="btn_sua" style="width: 100%; height: 100%;">
                            <img src="{{asset('ADMIN/IMAGE/icon_xoanguoidung_quanly.svg')}}" alt="lỗi">
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="box-sum">
        <div class="box-all">
            <!-- Trong phần hiển thị phân trang -->
            <div class="pagination">
                <ul class="pagination-list">
                    @if ($kh->onFirstPage())
                    <li class="disabled"><span>&laquo;</span></li>
                    @else
                    <li><a href="{{ $kh->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif

                    @foreach ($kh->getUrlRange(1, $kh->lastPage()) as $page => $url)
                    @if ($page == $kh->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                    @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                    @endforeach

                    @if ($kh->hasMorePages())
                    <li><a href="{{ $kh->nextPageUrl() }}" rel="next">&raquo;</a></li>
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