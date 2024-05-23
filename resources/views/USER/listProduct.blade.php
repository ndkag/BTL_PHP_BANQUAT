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
              <a href="/">Trang chủ<i class="ti-arrow-right"></i></a>
            </li>
            <li class="active"><a href="#">Danh sách quạt</a></li>
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
              <div class="col-3">
                <div class="bolocs">

                  <div class="title-boloc">BỘ LỌC</div>
                  <form action="" method="get">
                    <div class="boloc-timkiem">
                      <div class="title-locgia">Tìm kiếm</div>
                      <input type="text" name="timkiem" placeholder="Tìm kiếm..." value="{{ request('timkiem') }}">
                    </div>

                    <div class="locgia">
                      <div class="title-locgia">Lọc giá</div>
                      <div class="inputs-loc">
                        <input type="number" name="giatu" id="giatu" placeholder="Tối thiểu" value="{{ request('giatu')}}">
                        -
                        <input type="number" name="giaden" id="giaden" placeholder="Tối đa" value="{{ request('giaden')}}">
                      </div>
                    </div>
                    <button type="submit">Xác nhận lọc</button>

                  </form>

                </div>

              </div>
              <div class="col-9">
                <div class="row">
                  @foreach($hot as $p)
                  <div class="col-xl-4 col-lg-4 col-md-4 col-12">
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
                          @if ($hot->onFirstPage())
                          <li class="disabled"><span>&laquo;</span></li>
                          @else
                          <li><a href="{{ $hot->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                          @endif
                          @foreach ($hot->getUrlRange(1, $hot->lastPage()) as $page => $url)
                          @if ($page == $hot->currentPage())
                          <li class="active"><span>{{ $page }}</span></li>
                          @else
                          <li><a href="{{ $url }}">{{ $page }}</a></li>
                          @endif
                          @endforeach

                          @if ($hot->hasMorePages())
                          <li><a href="{{ $hot->nextPageUrl() }}" rel="next">&raquo;</a></li>
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
        </div>
      </div>
    </div>
  </div>
</div>

<!--/ End product-->
@endsection