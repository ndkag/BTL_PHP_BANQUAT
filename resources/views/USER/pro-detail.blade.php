@extends('USER.layout')
@section('title','Trang chi tiết')

@section('main')
<link rel="stylesheet" href="{{asset('css/product.css')}}" />

<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li>
              <a href="/">Trang chủ<i class="ti-arrow-right"></i></a>
            </li>
            <li class="active"><a href="#">Trang chi tiết</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- detail -->
<div class="pro-details">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-6">
        <div class="row">
          <div class="col">
            <div class="product__details__pic">
              <div class="product__details__pic__item">
                <img class="product__details__pic__item--large" style="max-height:400px ;" src="{{asset('uploads/'.$p->HinhAnhXe)}}" alt="" />
              </div>
              <div class="product__details__pic__slider owl-carousel">

                <?php
                // Chuyển đổi chuỗi JSON thành mảng
                $dtImage = json_decode($p['DSHinhAnhXe'], true);
                // Kiểm tra xem mảng có tồn tại không và có chứa các giá trị không
                if ($dtImage && is_array($dtImage)) {
                  $imageCount = count($dtImage);
                  for ($i = 0; $i < $imageCount; $i++) {
                    $src = asset('uploads/' . $dtImage[$i]);
                    $dataImgBigUrl = ($i < $imageCount - 1) ? asset('uploads/' . $dtImage[$i + 1]) : asset('uploads/' . $dtImage[$i]);
                    echo '<img data-imgbigurl="' . $dataImgBigUrl . '" src="' . $src . '" alt="" />';
                  }
                }
                ?>

              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="specifications">
            <div class="spec-title orangeDark-c">THÔNG SỐ KỸ THUẬT</div>
            <div class="spec-table">
              <table class="table">
                <thead>
                  <tr>
                    <th class="col-3" scope="col-3">Thông số kỹ thuật</th>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Công suất quạt</td>
                    <td>{{$ctq->CongSuatQuat}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Chế độ gió</td>
                    <td>{{$ctq->CheDoGio}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Bảng điều khiển</td>
                    <td>{{$ctq->BangDieuKhien}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Loại Motor</td>
                    <td>{{$ctq->LoaiMotor}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Đường kính cánh</td>
                    <td>{{$ctq->DuongKinhCanhQuat}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Chiều dài dây</td>
                    <td>{{$ctq->ChieuDaiDayDien}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Xuất xứ</td>
                    <td>{{$ctq->XuatXu}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tiện ích</td>
                    <td>{{$ctq->TienIch}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Kích thước khối lượng</td>
                    <td>{{$ctq->KichThuocKhoiLuong}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Thông tin khác khác</th>
                    <td>{{$ctq->ThongTinKhac}}</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-6">
        <div class="detail_product">
          <div class="pro-title black-c">
            {{$p->TenQuat}}
          </div>
          <div class="pro-prices">
            <div class="pro-price"> {{number_format($p->GiaKhuyenMai)}} VNĐ
            </div>
            <div class="pro-price_old">{{number_format($p->Gia)}} VNĐ</div>
          </div>


          <div class="pro-date black-1-c">
            Năm sản xuất: {{$p->NamSanXuat}}
          </div>


          <form action="{{ route('cart.add') }}" method="post" id="add-to-cart-form">
            @csrf
            <input type="hidden" name="MaQuat" value="{{ $p->MaQuat }}">

            <div class="pro-colors">
              <div class="color-title black-1-c">Màu sắc</div>
              <div class="row">
                @foreach($ct as $ctItem)
                <input type="radio" class="btn-check" name="color" id="option{{ $ctItem->MaCTMauSac }}" data-quantity="{{ $ctItem->SoLuong }}" value="{{ $ctItem->TenMauSac }}" autocomplete="off">
                <label class="pro-color" style="background-color: {{$ctItem->MaMau}};" for="option{{ $ctItem->MaCTMauSac }}"></label>
                @endforeach
              </div>
            </div>

            <div class="pro-order_number">
              <div class="version-title black-1-c">Số lượng</div>
              <!-- Input Order -->
              <div class="input-group">
                <div class="btn btn-number" data-type="minus" data-field="quant">
                  <i class="ti-minus"></i>
                </div>
                <input type="text" name="quant" class="input-number" data-min="1" data-max="0" value="1" style="width:60px; padding:4px 4px; height:30px">
                <div class="btn btn-number" data-type="plus" data-field="quant">
                  <i class="ti-plus"></i>
                </div>
              </div>
              <!--/ End Input Order -->
            </div>
            <hr />

            <div class="pro-control">
              <div class="row">
                <div class="col pro-btn-r">
                  <button type="submit" id="btn_themgiohang" class="pro-btn_cart orange-c">
                    <img src="../IMAGE/icons8_add_shopping_cart_1.svg" alt="" />
                    Thêm Vào Giỏ Hàng
                  </button>
                  <button type="submit" id="btn_muangay" class="pro-btn_buy">Mua Ngay</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="details-describe">
        <div class="row">
          <div class="col-5">
            <hr />
          </div>
          <div class="col-2 describe-title center-t orangeDark-c">
            MÔ TẢ
          </div>
          <div class="col-5">
            <hr />
          </div>
        </div>
        <h6 class="center-t">
          {!! $p['MoTa'] !!}
        </h6>
      </div>
      <div class="row">
        <div class="col-4">
          <hr>
        </div>
        <div class="col-4 describe-title center-t orangeDark-c">
          Có thể bạn cũng thích
        </div>
        <div class="col-4">
          <hr>
        </div>
      </div>
      <div class="row cothebancungthich">

        @foreach($lq as $p)
        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
          <div class="single-product">
            <div class="product-img">
              <a href="/detail/{{$p->MaQuat}}">
                <img class="default-img" src="{{ asset('Uploads/' . $p['HinhAnhXe']) }}" alt="#">
                <img class="hover-img" src="{{ asset('Uploads/' . $p['HinhAnhXe']) }}" alt="#">
              </a>
              <div class="button-head">
                <div class="product-action-2">
                  <a type="submit" title="Add to cart" href="#">Thêm vào giỏ hàng</a>
                </div>
              </div>

            </div>
            <div class="product-content">
              <h3><a href="/detail/{{$p->MaQuat}}">{{$p['TenQuat']}}</a></h3>
              <div class=" product-price">
                <span>{{number_format($p['Gia'])}} VND</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="box-sum">
          <div class="box-all">
            <!-- Trong phần hiển thị phân trang -->
            <div class="pagination">
              <ul class="pagination-list">
                @if ($lq->onFirstPage())
                <li class="disabled"><span>&laquo;</span></li>
                @else
                <li><a href="{{ $lq->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                @endif
                @foreach ($lq->getUrlRange(1, $lq->lastPage()) as $page => $url)
                @if ($page == $lq->currentPage())
                <li class="active"><span>{{ $page }}</span></li>
                @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
                @endforeach

                @if ($lq->hasMorePages())
                <li><a href="{{ $lq->nextPageUrl() }}" rel="next">&raquo;</a></li>
                @else
                <li class="disabled"><span>&raquo;</span></li>
                @endif

              </ul>
            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--/ End pro-product-->

<script>
  const radios = document.querySelectorAll('input[type="radio"]');
  const inputNumber = document.querySelector('input[name="quant"]');
  radios.forEach(radio => {
    radio.addEventListener('change', function() {
      inputNumber.dataset.max = this.dataset.quantity;
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    // Set default color to the first option
    document.querySelector('input[name="color"]').checked = true;

    // Set default quantity to 1
    document.querySelector('input[name="quant"]').value = 1;
  });

  // Lắng nghe sự kiện click nút "Mua Ngay"
  document.addEventListener("DOMContentLoaded", function() {
    // Lắng nghe sự kiện click nút "Mua Ngay"
    document.getElementById("btn_muangay").addEventListener("click", function() {
      // Thay đổi action của form thành route('buy')
      document.getElementById("add-to-cart-form").action = "{{ route('buy') }}";
    });
  });
</script>


@endsection