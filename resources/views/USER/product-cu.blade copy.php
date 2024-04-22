@extends('USER.layout')
@section('title','Trang Quạt')

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
              <a href="index1.html">Home<i class="ti-arrow-right"></i></a>
            </li>
            <li class="active"><a href="blog-single.html">Product</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- product -->
<div class="container">
  <div class="row">
    <div class="col-3">
      <!-- start filters -->
      <div class="filters">
        <div class="filter-title blueDark-c">BỘ LỌC</div>
        <!-- filter 1 -->
        <div class="row filter-row">
          <div class="col-1">
            <img src="https://www.carmudi.vn/images/xe-oto/svg/brand.svg" alt="" />
          </div>
          <div class="col-9 blueDark-c">Hãng xe, dòng xe</div>
          <div class="col">
            <img src="images/icons8_chevron_down.svg" alt="" />
          </div>
        </div>
        <div class="filter-brands" style="display: none">
          <div class="row filter-sub">
            <div class="col-1">
              <label class="custom-checkbox">
                <input name="dummy" type="checkbox" />
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col blueDark-c">Audi</div>
          </div>
          <div class="row filter-sub">
            <div class="col-1">
              <label class="custom-checkbox">
                <input name="dummy" type="checkbox" />
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col blueDark-c">Audi</div>
          </div>
          <div class="row filter-sub">
            <div class="col-1">
              <label class="custom-checkbox">
                <input name="dummy" type="checkbox" />
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col blueDark-c">Audi</div>
          </div>
          <div class="row filter-sub">
            <div class="col-1">
              <label class="custom-checkbox">
                <input name="dummy" type="checkbox" />
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col blueDark-c">Audi</div>
          </div>
          <div class="row filter-sub">
            <div class="col-1">
              <label class="custom-checkbox">
                <input name="dummy" type="checkbox" />
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col blueDark-c">Audi</div>
          </div>
          <div class="row filter-sub">
            <div class="col-1">
              <label class="custom-checkbox">
                <input name="dummy" type="checkbox" />
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col blueDark-c">Audi</div>
          </div>
          <div class="row filter-sub">
            <div class="col-1">
              <label class="custom-checkbox">
                <input name="dummy" type="checkbox" />
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col blueDark-c">Audi</div>
          </div>
        </div>

        <!-- filter 2 -->
        <div class="row filter-row">
          <div class="col-1">
            <img src="https://www.carmudi.vn/images/xe-oto/svg/location.svg" alt="" />
          </div>
          <div class="col-9 blueDark-c">Địa điểm</div>
          <div class="col">
            <img src="images/icons8_chevron_down.svg" alt="" />
          </div>
        </div>
        <div class="filter-location" style="display: none">
          <!-- ------ -->
          <div class="row filter-sub">
            <div class="col-1">
              <label class="custom-checkbox">
                <input name="dummy" type="checkbox" />
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col blueDark-c">Hà Nội</div>
          </div>
          <!-- ------ -->
          <div class="row filter-sub">
            <div class="col-1">
              <label class="custom-checkbox">
                <input name="dummy" type="checkbox" />
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col blueDark-c">Hà Nội</div>
          </div>
          <!-- ------ -->
          <div class="row filter-sub">
            <div class="col-1">
              <label class="custom-checkbox">
                <input name="dummy" type="checkbox" />
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col blueDark-c">Hà Nội</div>
          </div>
          <!-- ------ -->
          <div class="row filter-sub">
            <div class="col-1">
              <label class="custom-checkbox">
                <input name="dummy" type="checkbox" />
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col blueDark-c">Hà Nội</div>
          </div>
        </div>
        <!-- filter 3 -->
        <div class="row filter-row">
          <div class="col-1">
            <img src="https://www.carmudi.vn/images/xe-oto/svg/price.svg" alt="" />
          </div>
          <div class="col-9 blueDark-c">Giá</div>
          <div class="col">
            <img src="images/icons8_chevron_down.svg" alt="" />
          </div>
        </div>
        <!-- filter 4 -->
        <div class="row filter-row">
          <div class="col-1">
            <img src="https://www.carmudi.vn/images/xe-oto/svg/year.svg" alt="" />
          </div>
          <div class="col-9 blueDark-c">Năm sản xuất</div>
          <div class="col">
            <img src="images/icons8_chevron_down.svg" alt="" />
          </div>
        </div>
        <!-- filter 5 -->
        <div class="row filter-row">
          <div class="col-1">
            <img src="https://www.carmudi.vn/images/xe-oto/svg/mileage.svg" alt="" />
          </div>
          <div class="col-9 blueDark-c">Số KM</div>
          <div class="col">
            <img src="images/icons8_chevron_down.svg" alt="" />
          </div>
        </div>
        <!-- filter 6 -->
        <div class="row filter-row">
          <div class="col-1">
            <img src="https://www.carmudi.vn/images/xe-oto/svg/bodyType.svg" alt="" />
          </div>
          <div class="col-9 blueDark-c">Kiểu dáng</div>
          <div class="col">
            <img src="images/icons8_chevron_down.svg" alt="" />
          </div>
        </div>
        <!-- filter 7 -->
        <div class="row filter-row">
          <div class="col-1">
            <img src="https://www.carmudi.vn/images/xe-oto/svg/fuel.svg" alt="" />
          </div>
          <div class="col-9 blueDark-c">Nhiên liệu</div>
          <div class="col">
            <img src="images/icons8_chevron_down.svg" alt="" />
          </div>
        </div>
        <!-- filter 8 -->
        <div class="row filter-row">
          <div class="col-1">
            <img src="https://www.carmudi.vn/images/xe-oto/svg/transmission.svg" alt="" />
          </div>
          <div class="col-9 blueDark-c">Hộp số</div>
          <div class="col">
            <img src="images/icons8_chevron_down.svg" alt="" />
          </div>
        </div>
        <!-- filter 9 -->
        <div class="row filter-row">
          <div class="col-1">
            <img src="https://www.carmudi.vn/images/xe-oto/svg/color.svg" alt="" />
          </div>
          <div class="col-9 blueDark-c">Màu sắc</div>
          <div class="col">
            <img src="images/icons8_chevron_down.svg" alt="" />
          </div>
        </div>
        <!-- filter 10 -->
        <div class="row filter-row">
          <div class="col-1">
            <img src="https://www.carmudi.vn/images/xe-oto/svg/seatCapacity.svg" alt="" />
          </div>
          <div class="col-9 blueDark-c">Số chỗ ngồi</div>
          <div class="col">
            <img src="images/icons8_chevron_down.svg" alt="" />
          </div>
        </div>

        <!-- filter 11 -->
        <div class="row filter-row">
          <div class="col-1">
            <img src="https://www.carmudi.vn/images/xe-oto/svg/madeBy.svg" alt="" />
          </div>
          <div class="col-9 blueDark-c">Đăng bởi</div>
          <div class="col">
            <img src="images/icons8_chevron_down.svg" alt="" />
          </div>
        </div>
      </div>
      <!-- end filters -->

      <div class="advertise"></div>
    </div>
    <div class="col-9">
      <div class="timkiems">
        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 30 30">
          <path d="M13 3C7.4889971 3 3 7.4889971 3 13C3 18.511003 7.4889971 23 13 23C15.396508 23 17.597385 22.148986 19.322266 20.736328L25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969L20.736328 19.322266C22.148986 17.597385 23 15.396508 23 13C23 7.4889971 18.511003 3 13 3 z M 13 5C17.430123 5 21 8.5698774 21 13C21 17.430123 17.430123 21 13 21C8.5698774 21 5 17.430123 5 13C5 8.5698774 8.5698774 5 13 5 z" fill="#2D2B2D"></path>
        </svg>
        <input type="text" name="timkiem" id="edt_timkiem_trangchu_muaxe" placeholder="Tìm kiếm theo tên xe" />
      </div>

      <!-- start card car -->
      <div class="row">
        <div class="col-4">
          <a href="#" class="card">
            <div class="hinhanh-card">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://plus.unsplash.com/premium_photo-1682125729312-78f16e6e6f38?q=80&amp;w=1769&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1493238792000-8113da705763?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                </div>
              </div>
            </div>
            <div id="tieude-card">
              🚘Mercedes E200 Model 2020 siêu lướt .
            </div>
            <div class="thongtinxe-card">
              <div class="doixe_thongtinxe-card thongtinxe-card_chung">
                <img src="images/icon_card_nam.svg" alt="" />
                <div id="doixe_thongtinxe-card"></div>
                2023
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xemoi.svg" alt="" />
                <div id="hinhthuc_thongtinxe-card"></div>
                Xe mới
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xang.svg" alt="" />
                <div id="nhienlieu_thongtinxe-card">Xăng</div>
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_tudong.svg" alt="" />
                <div id="hopso_thongtinxe-card">Tự động</div>
              </div>
            </div>
            <div id="giaxe-card">1 tỷ 289 triệu</div>
          </a>
        </div>

        <div class="col-4">
          <a href="#" class="card">
            <div class="hinhanh-card">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item">
                    <img src="https://plus.unsplash.com/premium_photo-1682125729312-78f16e6e6f38?q=80&amp;w=1769&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1493238792000-8113da705763?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                </div>
              </div>
            </div>
            <div id="tieude-card">
              🚘Mercedes E200 Model 2020 siêu lướt .
            </div>
            <div class="thongtinxe-card">
              <div class="doixe_thongtinxe-card thongtinxe-card_chung">
                <img src="images/icon_card_nam.svg" alt="" />
                <div id="doixe_thongtinxe-card"></div>
                2023
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xemoi.svg" alt="" />
                <div id="hinhthuc_thongtinxe-card"></div>
                Xe mới
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xang.svg" alt="" />
                <div id="nhienlieu_thongtinxe-card">Xăng</div>
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_tudong.svg" alt="" />
                <div id="hopso_thongtinxe-card">Tự động</div>
              </div>
            </div>
            <div id="giaxe-card">1 tỷ 289 triệu</div>
          </a>
        </div>

        <div class="col-4">
          <a href="#" class="card">
            <div class="hinhanh-card">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item">
                    <img src="https://plus.unsplash.com/premium_photo-1682125729312-78f16e6e6f38?q=80&amp;w=1769&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1493238792000-8113da705763?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                </div>
              </div>
            </div>
            <div id="tieude-card">
              🚘Mercedes E200 Model 2020 siêu lướt .
            </div>
            <div class="thongtinxe-card">
              <div class="doixe_thongtinxe-card thongtinxe-card_chung">
                <img src="images/icon_card_nam.svg" alt="" />
                <div id="doixe_thongtinxe-card"></div>
                2023
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xemoi.svg" alt="" />
                <div id="hinhthuc_thongtinxe-card"></div>
                Xe mới
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xang.svg" alt="" />
                <div id="nhienlieu_thongtinxe-card">Xăng</div>
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_tudong.svg" alt="" />
                <div id="hopso_thongtinxe-card">Tự động</div>
              </div>
            </div>
            <div id="giaxe-card">1 tỷ 289 triệu</div>
          </a>
        </div>

        <div class="col-4">
          <a href="#" class="card">
            <div class="hinhanh-card">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://plus.unsplash.com/premium_photo-1682125729312-78f16e6e6f38?q=80&amp;w=1769&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1493238792000-8113da705763?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                </div>
              </div>
            </div>
            <div id="tieude-card">
              🚘Mercedes E200 Model 2020 siêu lướt .
            </div>
            <div class="thongtinxe-card">
              <div class="doixe_thongtinxe-card thongtinxe-card_chung">
                <img src="images/icon_card_nam.svg" alt="" />
                <div id="doixe_thongtinxe-card"></div>
                2023
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xemoi.svg" alt="" />
                <div id="hinhthuc_thongtinxe-card"></div>
                Xe mới
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xang.svg" alt="" />
                <div id="nhienlieu_thongtinxe-card">Xăng</div>
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_tudong.svg" alt="" />
                <div id="hopso_thongtinxe-card">Tự động</div>
              </div>
            </div>
            <div id="giaxe-card">1 tỷ 289 triệu</div>
          </a>
        </div>

        <div class="col-4">
          <a href="#" class="card">
            <div class="hinhanh-card">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://plus.unsplash.com/premium_photo-1682125729312-78f16e6e6f38?q=80&amp;w=1769&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1493238792000-8113da705763?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                </div>
              </div>
            </div>
            <div id="tieude-card">
              🚘Mercedes E200 Model 2020 siêu lướt .
            </div>
            <div class="thongtinxe-card">
              <div class="doixe_thongtinxe-card thongtinxe-card_chung">
                <img src="images/icon_card_nam.svg" alt="" />
                <div id="doixe_thongtinxe-card"></div>
                2023
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xemoi.svg" alt="" />
                <div id="hinhthuc_thongtinxe-card"></div>
                Xe mới
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xang.svg" alt="" />
                <div id="nhienlieu_thongtinxe-card">Xăng</div>
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_tudong.svg" alt="" />
                <div id="hopso_thongtinxe-card">Tự động</div>
              </div>
            </div>
            <div id="giaxe-card">1 tỷ 289 triệu</div>
          </a>
        </div>

        <div class="col-4">
          <a href="#" class="card">
            <div class="hinhanh-card">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item">
                    <img src="https://plus.unsplash.com/premium_photo-1682125729312-78f16e6e6f38?q=80&amp;w=1769&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1493238792000-8113da705763?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                </div>
              </div>
            </div>
            <div id="tieude-card">
              🚘Mercedes E200 Model 2020 siêu lướt .
            </div>
            <div class="thongtinxe-card">
              <div class="doixe_thongtinxe-card thongtinxe-card_chung">
                <img src="images/icon_card_nam.svg" alt="" />
                <div id="doixe_thongtinxe-card"></div>
                2023
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xemoi.svg" alt="" />
                <div id="hinhthuc_thongtinxe-card"></div>
                Xe mới
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xang.svg" alt="" />
                <div id="nhienlieu_thongtinxe-card">Xăng</div>
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_tudong.svg" alt="" />
                <div id="hopso_thongtinxe-card">Tự động</div>
              </div>
            </div>
            <div id="giaxe-card">1 tỷ 289 triệu</div>
          </a>
        </div>

        <div class="col-4">
          <a href="#" class="card">
            <div class="hinhanh-card">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://plus.unsplash.com/premium_photo-1682125729312-78f16e6e6f38?q=80&amp;w=1769&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1493238792000-8113da705763?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                </div>
              </div>
            </div>
            <div id="tieude-card">
              🚘Mercedes E200 Model 2020 siêu lướt .
            </div>
            <div class="thongtinxe-card">
              <div class="doixe_thongtinxe-card thongtinxe-card_chung">
                <img src="images/icon_card_nam.svg" alt="" />
                <div id="doixe_thongtinxe-card"></div>
                2023
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xemoi.svg" alt="" />
                <div id="hinhthuc_thongtinxe-card"></div>
                Xe mới
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xang.svg" alt="" />
                <div id="nhienlieu_thongtinxe-card">Xăng</div>
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_tudong.svg" alt="" />
                <div id="hopso_thongtinxe-card">Tự động</div>
              </div>
            </div>
            <div id="giaxe-card">1 tỷ 289 triệu</div>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="card">
            <div class="hinhanh-card">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item">
                    <img src="https://plus.unsplash.com/premium_photo-1682125729312-78f16e6e6f38?q=80&amp;w=1769&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1493238792000-8113da705763?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                </div>
              </div>
            </div>
            <div id="tieude-card">
              🚘Mercedes E200 Model 2020 siêu lướt .
            </div>
            <div class="thongtinxe-card">
              <div class="doixe_thongtinxe-card thongtinxe-card_chung">
                <img src="images/icon_card_nam.svg" alt="" />
                <div id="doixe_thongtinxe-card"></div>
                2023
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xemoi.svg" alt="" />
                <div id="hinhthuc_thongtinxe-card"></div>
                Xe mới
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xang.svg" alt="" />
                <div id="nhienlieu_thongtinxe-card">Xăng</div>
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_tudong.svg" alt="" />
                <div id="hopso_thongtinxe-card">Tự động</div>
              </div>
            </div>
            <div id="giaxe-card">1 tỷ 289 triệu</div>
          </a>
        </div>
        <div class="col-4">
          <a href="#" class="card">
            <div class="hinhanh-card">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item">
                    <img src="https://plus.unsplash.com/premium_photo-1682125729312-78f16e6e6f38?q=80&amp;w=1769&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                  <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1493238792000-8113da705763?q=80&amp;w=1770&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100 card-list_img" alt="..." />
                  </div>
                </div>
              </div>
            </div>
            <div id="tieude-card">
              🚘Mercedes E200 Model 2020 siêu lướt .
            </div>
            <div class="thongtinxe-card">
              <div class="doixe_thongtinxe-card thongtinxe-card_chung">
                <img src="images/icon_card_nam.svg" alt="" />
                <div id="doixe_thongtinxe-card"></div>
                2023
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xemoi.svg" alt="" />
                <div id="hinhthuc_thongtinxe-card"></div>
                Xe mới
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_xang.svg" alt="" />
                <div id="nhienlieu_thongtinxe-card">Xăng</div>
              </div>
              <div class="thongtinxe-card_chung">
                <img src="images/icon_card_tudong.svg" alt="" />
                <div id="hopso_thongtinxe-card">Tự động</div>
              </div>
            </div>
            <div id="giaxe-card">1 tỷ 289 triệu</div>
          </a>
        </div>
      </div>
      <!-- end card car -->
    </div>
  </div>
</div>

<!--/ End product-->
@endsection