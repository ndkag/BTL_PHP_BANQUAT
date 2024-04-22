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
    <div class="col-12">
      <div class="tab-content" id="myTabContent">
        <!-- Start Single Tab -->
        <div class="tab-pane fade show active" id="man" role="tabpanel">
          <div class="tab-single">
            <div class="row">
              @foreach($hot as $p)
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--/ End product-->
@endsection