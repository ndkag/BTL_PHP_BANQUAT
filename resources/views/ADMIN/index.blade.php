@extends('ADMIN.layout')

@section('title','Trang chủ')

@section('main')



<!-- START -------------------------------------------------------maint-content -->

<!-- START---------------------header-maint -->
<div class="header-maint">
    <div class="title-header">
        <h1 id="id_title_header">TRANG QUẢN NGƯỜI DÙNG</h1>
        <button id="btn_tiemkiem_header"> <img src="{{asset('ADMIN/IMAGE/icon_btn_timkiem.svg')}}" alt=""></button>
        <div id="khung_inp_timkiem">
            <img src="{{asset('ADMIN/IMAGE/icon_btn_timkiem.svg')}}" alt="#">
            <input type="text" id="inp_timkiem_header" placeholder="Tìm kiếm thông tin người dùng..." ng-keyup="handleKeyUp($event)">
        </div>
        <button id="btn_thoat_timkiem_header"> <img src="{{asset('ADMIN/IMAGE/icon_btn_close.svg')}}" alt=""> </button>

    </div>
    <div class="control-header" id="avt_user">
        <div class="caidat-control_header"><a href="#"><img src="{{asset('ADMIN/IMAGE/setting.png')}}" alt="cai dat"></a></div>

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

<!-- START---------------------contener-maint -->
<div class="contener-maint">
    <div class="welcome-contener">
        <div class="title-welcome">
            <h1>Xin chào, Khang</h1>
            <p>Chào mừng bạn đến với trang Quản Lý</p>
        </div>


        <img class="image-welcome" src="{{asset('ADMIN/IMAGE/icons8_google_tag_manager_150px.png')}}" alt="#">
    </div>


    <!-- --------------------------thoigian-contener -->
    <div class="thoigians-contener">
        <a href="#" ng-click="btn_day()" ng-class="{'thoigian1': isDaySelected}" class="thoigian">Hôm nay</a>
        <a href="#" ng-click="btn_week()" ng-class="{'thoigian1': isWeekSelected}" class="thoigian">Tuần</a>
        <a href="#" ng-click="btn_month()" ng-class="{'thoigian1': isMonthSelected}" class="thoigian">Tháng</a>
        <a href="#" ng-click="btn_year()" ng-class="{'thoigian1': isYearSelected}" class="thoigian">Năm</a>
        <select id="inp_nam_tk1" class="inp_nam_thongke_index">
        </select>
    </div>
    <!--END --------------------------thoigian-contener -->
    <!-- hoatdong--------------------------thoigian-contener -->

    <div class="hoatdong-contener">
        <a href="#" style="background-color: #3F6CE3;" class="card-hoatdong">
            <div class="title-card">Tổng đơn hàng đã bán</div>
            <div class="thongso-card">
                <div class="number-card">{{$tktong[0]['TongDonHang']}}</div>
                <div class="kieu-card">Đơn hàng</div>
            </div>
        </a>

        <a href="#" style="background-color: #6A8DE9;" class="card-hoatdong">
            <div class="title-card">Doanh thu</div>
            <div class="thongso-card">
                <div class="number-card">{{number_format( $tktong[0]['TongDoanhThu'])}}</div>
                <div class="kieu-card">VNĐ</div>
            </div>
        </a>

        <a href="#" style="background-color: #EB8E6D;" class="card-hoatdong">
            <div class="title-card">Khách hàng</div>
            <div class="thongso-card">
                <div class="number-card">{{$tktong[0]['TongKhachHang']}}</div>
                <div class="kieu-card">Người</div>
            </div>
        </a>

        <a href="#" style="background-color: #FF5B5C;" class="card-hoatdong">
            <div class="title-card">Tổng sản phẩm đã bán</div>
            <div class="thongso-card">
                <div class="number-card">{{$tktong[0]['TongSanPhamDaBan']}}

                </div>
                <div class="kieu-card">Sản phẩm</div>
            </div>
        </a>



    </div>



    <div class="time-thoitiet_contener">
        <div class="day-time">
            <div class="getday"></div>
            <div class="gettime">

            </div>
        </div>



        <div class="icon-time">
            <img src="{{asset('ADMIN/IMAGE/icons8_story_time_250px.png')}}" alt="#">
            <img class="image_iconday" src="{{asset('ADMIN/IMAGE/icons8_timeline_week_150px.png')}}" alt="#">
        </div>
    </div>


    <div class="thoigians-contener">
        <a ng-click="btn_daytk()" ng-class="{'thoigian1': isDaySelectedtk}" class="thoigian">Hôm nay</a>
        <a ng-click="btn_weektk()" ng-class="{'thoigian1': isWeekSelectedtk}" class="thoigian">Tuần</a>
        <a ng-click="btn_monthtk()" ng-class="{'thoigian1': isMonthSelectedtk}" class="thoigian">Tháng</a>
        <a ng-click="btn_yeartk()" ng-class="{'thoigian1': isYearSelectedtk}" class="thoigian">Năm</a>
        <select id="inp_thang_tk" class="inp_nam_thongke_index" name="month_tk">
            <option value="0">Tháng 0</option>
            <option value="1">Tháng 1</option>
            <option value="2">Tháng 2</option>
            <option value="3">Tháng 3</option>
            <option value="4">Tháng 4</option>
            <option value="5">Tháng 5</option>
            <option value="6">Tháng 6</option>
            <option value="7">Tháng 7</option>
            <option value="8">Tháng 8</option>
            <option value="9">Tháng 9</option>
            <option value="10">Tháng 10</option>
            <option value="11">Tháng 11</option>
            <option value="12">Tháng 12</option>
        </select>

        <select id="inp_nam_tk_hai" class=" inp_nam_thongke_index">

        </select>

    </div>
    <!--END --------------------------thoigian-contener -->
    <!-- hoatdong--------------------------thoigian-contener -->

    <div class="khung_bieudo">
        <canvas id="myChart"></canvas>
    </div>

</div>
<!-- END---------------------contener-maint -->

<script>
    function LoadTop5() {


        var tk = <?php echo $tk; ?>; // Nhận dữ liệu từ PHP và chuyển đổi thành JavaScript object


        var labels = [];
        var data = [];

        // Lặp qua dữ liệu từ biến $tk và lấy tên quạt và số lượng bán
        tk.forEach(function(item) {
            labels.push(item.MaQuat);
            data.push(item.SoLuongBan);
        });

        var chartData = {
            labels: labels,
            datasets: [{
                label: "Số lượng bán",
                data: data,
                backgroundColor: [
                    "rgba(255, 99, 132, 0.7)",
                    "rgba(255, 159, 64, 0.7)",
                    "rgba(255, 205, 86, 0.7)",
                    "rgba(75, 192, 192, 0.7)",
                    "rgba(54, 162, 235, 0.7)",
                ],
                borderColor: [
                    "rgba(255, 99, 132, 1)",
                    "rgba(255, 159, 64, 1)",
                    "rgba(255, 205, 86, 1)",
                    "rgba(75, 192, 192, 1)",
                    "rgba(54, 162, 235, 1)",
                ],
                borderWidth: 1,
            }],
        };

        var options = {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        };

        var ctx = document.getElementById("myChart").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "bar",
            data: chartData,
            options: options,
        });
    }
    document.addEventListener("DOMContentLoaded", function() {
        LoadTop5();

        function opgettime() {
            var gettime = new Date();
            var getgio = gettime.getHours();
            var getphut = gettime.getMinutes();
            var getgiay = gettime.getSeconds();
            getgio = (getgio < 10 ? "0" : "") + getgio;
            getphut = (getphut < 10 ? "0" : "") + getphut;
            getgiay = (getgiay < 10 ? "0" : "") + getgiay;

            document.querySelector(".gettime").innerHTML =
                getgio + ":" + getphut + ":" + getgiay;
        }
        setInterval(opgettime, 1000);
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@endsection