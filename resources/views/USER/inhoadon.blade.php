<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title style="color: transparent;">IN HOÁ ĐƠN BÁN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        table {
            margin-top: 15px;
            width: 100%;
        }

        body {
            width: 900px;
            margin: 0 auto;
        }

        tr {
            line-height: 27px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }

        th {
            color: black;
            background-color: #ffff;
        }

        .dam {
            font-weight: bold;
        }

        .le {
            margin-bottom: 4px;
            font-size: 16px;
        }

        .kethop {
            display: flex;
            margin-bottom: 4px;
            font-size: 16px;
        }

        .kethop1 {
            display: flex;
            font-weight: bold;
            margin-top: 30px;
            font-size: 16px;
        }

        .kethop2 {
            display: flex;
            font-style: italic;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            window.print(); // Kích hoạt chức năng in khi trang được tải hoàn thành
        }
    </script>
</head>

<body>
    <section style="text-align: center; margin: 25px 0;">
        <h1>HÓA ĐƠN BÁN HÀNG</h1>
    </section>
    <div class="le dam">Tên cửa hàng: Eshop</div>
    <div class="row">
        <div class="col-12">Thời gian: {{$hd->NgayBan}}</div>

        <div class="col-6">Mã số thuế: 123456789</div>
        <div class="col-6">Địa chỉ: Việt Nam</div>
        <div class="col-6">
            Số điện thoại: 123.123.123
        </div>
        <div class="col-6">Họ tên khách hàng: {{$kh->TenNguoiDung}}</div>
        <div class="col-6">Giới tính: {{$kh->GioiTinh}}</div>
        <div class="col-6">Số điện thoại khách hàng: {{$kh->SDT}}</div>
        <div class="col-6">Địa chỉ Email: {{$kh->Email}}</div>
        <div class="col-6">Địa chỉ khách hàng: {{$kh->DiaChi}}</div>
        <div class="col-12">
            Ghi chú: {{$hd->GhiChu}}
        </div>
    </div>

    <table style="margin-top: 30px;">
        <tr style="background: #326E51; color: #fff;">

            <th>STT</th>
            <th>Tên quạt</th>
            <th>Màu sắc</th>
            <th>Giá bán</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>

        </tr>
        <?php
        $stt = 1
        ?>
        @foreach($ct as $c)
        <tr>
            <td>{{$stt++}}</td>
            <td>
                {{$c['TenQuat']}}
            </td>
            <td>{{$c['TenMauSac']}}</td>
            <td>{{number_format($c['GiaBan'])}} VNĐ</td>
            <td>{{$c['SoLuong']}}</td>
            <td>{{number_format($c['GiaBan'] * $c['SoLuong'])}} VNĐ</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5" class="dam">Tổng tiền hóa đơn bán</td>
            <td class="dam">{{number_format($hd->TongTien)}}</td>
        </tr>
    </table>
    <div class="kethop1">
        <p style="margin-left: 153px;">Người mua hàng</p>
        <p style="margin-left: 370px;">Người bán hàng</p>
    </div>
    <div class="kethop2">
        <p style="margin-left: 150px;">(Ký, ghi rõ họ tên)</p>
        <p style="margin-left: 365px;">(Ký, ghi rõ họ tên)</p>
    </div>
</body>

</html>