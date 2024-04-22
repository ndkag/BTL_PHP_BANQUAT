@extends('ADMIN.layout')
@section('title','Quản lý người dùng')
@section('main')



@if(session('tka') && session('tka')->Quyen == 0)

<?php
$stt = 1;
?>
<!-- START---------------------header-maint -->
<div class="header-maint">
    <div class="title-header">
        <h1 id="id_title_header">TRANG QUẢN LÝ NGƯỜI DÙNG</h1>

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
        <form class="form_control-search" action="{{ route('ADMIN.TaiKhoan.index') }}" method="GET">
            <div class="search-title">
                Tìm kiếm
            </div>
            <input id="edt_search" type="text" name="search" placeholder="Vui lòng nhập thông tin cần tìm!" value="{{ $search }}">
            <button type="submit" class="btn_search">Tìm kiếm</button>
        </form>
        <a href="/admin/user/create">
            <button class="btn_them">

                Thêm</button>
        </a>

    </div>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã tài khoản</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Quyền</th>
                <th>Sửa</th>
                <th>Xoá</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tk as $t)
            <tr>
                <td>{{$stt++}}</td>
                <td>{{$t['MaTaiKhoan']}}</td>
                <td>{{$t['TenTaiKhoan']}}</td>
                <td>{{$t['MatKhau']}}</td>
                <td>{{$t['Email']}}</td>
                <td>{{$t['SDT']}}</td>
                <td>{{$t['Quyen']}}</td>

                <td>
                    <button id="btn_sua" style="width: 100%; height:100%;">
                        <a href="{{route('taikhoan.edit',$t['MaTaiKhoan'])}}">
                            <img src="{{asset('ADMIN/IMAGE/icon_suanguoidung_quanly.svg')}}" alt="lỗi">

                        </a>
                    </button>
                </td>
                <td>
                    <a onclick="return confirm('Bạn có chắc muốn xoá thông tin này ko?')" href="/admin/user/{{$t['MaTaiKhoan']}}/del">
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
                    @if ($tk->onFirstPage())
                    <li class="disabled"><span>&laquo;</span></li>
                    @else
                    <li><a href="{{ $tk->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif

                    @foreach ($tk->getUrlRange(1, $tk->lastPage()) as $page => $url)
                    @if ($page == $tk->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                    @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                    @endforeach

                    @if ($tk->hasMorePages())
                    <li><a href="{{ $tk->nextPageUrl() }}" rel="next">&raquo;</a></li>
                    @else
                    <li class="disabled"><span>&raquo;</span></li>
                    @endif
                </ul>
            </div>



        </div>
    </div>

</div>
</div>




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