<!DOCTYPE html>
<html lang="en">
@if(!session('tka')){
<script>
    window.location.href = "http://127.0.0.1:8000/admin/login";
</script>
}
@endif

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--START Dùng chung -->

    <link rel="icon" href="{{asset('ADMIN/IMAGE/logo4.png')}}" type="image/png" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('ADMIN/CSS ADMIN/reset.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet" />
    <!--END Dùng chung -->
    <link rel="stylesheet" href="{{asset('ADMIN/CSS ADMIN/bar.css')}}">
    <link rel="stylesheet" href="{{asset('ADMIN/CSS ADMIN/Quản lý người dùng.css')}}">
    <link rel="stylesheet" href="{{asset('ADMIN/CSS ADMIN/Quản lý thông tin.css')}}">
    <link rel="stylesheet" href="{{asset('ADMIN/CSS ADMIN/404.css')}}">

</head>


<body>

    <!-- START -------------------------------------------------------Navigation-bar -->
    <div id="Navigation-bar">
        <div class="items">
            <div class="logo">
                <a href="">

                    <img src="{{asset('images/logo.png')}}" alt="#" class="logo-bar">
                </a>
            </div>
            <hr>
            <div class="items">
                @if(session('tka') && session('tka')->Quyen == 0)
                <div class="item">
                    <img src="{{asset('ADMIN/IMAGE/user.png')}}" alt="" class="icon-item">
                    <a href="/admin/user" class="item-title">Quản lý người dùng</a>
                </div>
                @endif
                <div class="item">
                    <img src="{{asset('ADMIN/IMAGE/news1.png')}}" alt="" class="icon-item">
                    <a href="/admin/quat" class="item-title">Quản lý quạt</a>
                </div>
                <div class="item">
                    <img src="{{asset('ADMIN/IMAGE/Forum.png')}}" alt="" class="icon-item">
                    <a href="/admin/loaiquat" class="item-title">Quản lý loại quạt</nav></a>
                </div>

                <div class="item">
                    <img src="{{asset('ADMIN/IMAGE/Forum.png')}}" alt="" class="icon-item">
                    <a href="/admin/khachhang" class="item-title">Quản lý khách hàng</nav></a>
                </div>
                <div class="item">
                    <img src="{{asset('ADMIN/IMAGE/Forum.png')}}" alt="" class="icon-item">
                    <a href="/admin/nhanvien" class="item-title">Quản lý nhân viên</nav></a>
                </div>
                <div class="item">
                    <img src="{{asset('ADMIN/IMAGE/event.png')}}" alt="" class="icon-item">
                    <a href="/admin/file" class="item-title">Quản lý file</a>
                </div>
            </div>
        </div>
        <div class="control-user items">
            <div class="item">
                <img src="{{asset('ADMIN/IMAGE/event.png')}}" alt="" class="icon-item">
                <a href="/admin/logout" class="item-title">Đăng xuất</a>
            </div>
        </div>

    </div>
    <!-- END -------------------------------------------------------Navigation-bar -->



    <!-- START -------------------------------------------------------maint-content -->

    <div id="maint-content">
        @yield('main')


    </div>
    <!-- START -------------------------------------------------------maint-content -->
    <script src="{{asset('ADMIN/JS/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('ADMIN/JS/quanlythongtin.js')}}"></script>
    <script src="{{asset('ADMIN/JS/angular.min.js')}}"></script>
    <script src="{{asset('ADMIN/JS/bar.js')}}"></script>
    <script src="{{asset('ADMIN/JS/quanlyBaiViet.js')}}"></script>
    <script src="{{asset('ADMIN/JS/quanlyChuDe.js')}}"></script>
    <script src="{{asset('ADMIN/JS/quanlynguoidung.js')}}"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>