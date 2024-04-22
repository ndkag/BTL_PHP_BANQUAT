<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Meta Tag -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="copyright" content="" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Title Tag  -->
  <title>@yield('title')</title>
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" />
  <!-- Web Font -->
  <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css" />
  <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/solid.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet" />
  <!-- Bootstrap CSS v5.2.1 -->
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="{{asset('css/magnific-popup.min.css')}}" />
  <!-- Font Awesome --> <!-- Fancybox -->
  <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}" />
  <!-- Themify Icons -->
  <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}" />
  <!-- Nice Select CSS -->
  <link rel="stylesheet" href="{{asset('css/niceselect.css')}}" />

  <!-- Animate CSS -->
  <link rel="stylesheet" href="{{asset('css/animate.css')}}" />
  <!-- Flex Slider CSS -->
  <link rel="stylesheet" href="{{asset('css/flex-slider.min.css')}}" />
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="{{asset('css/owl-carousel.css')}}" />
  <!-- Slicknav -->
  <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" />

  <!-- Eshop StyleSheet -->
  <link rel="stylesheet" href="{{asset('css/reset.css')}}" />
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
  <link rel="stylesheet" href="{{asset('css/pro-detail.css')}}" />
  <link rel="stylesheet" href="{{asset('css/Colors.css')}}" />
  <link rel="stylesheet" href="{{asset('css/sign.css')}}" />
  @yield('linkcss')
</head>

<body class="js">
  <!-- Preloader -->
  <!-- <div class="preloader">
    <div class="preloader-inner">
      <div class="preloader-icon">
        <span></span>
        <span></span>
      </div>
    </div>
  </div> -->
  <!-- End Preloader -->

  <!-- Header -->
  <header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-12 col-12">
            <!-- Top Left -->
            <div class="top-left">
              <ul class="list-main">
                <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                <li><i class="ti-email"></i> support@shophub.com</li>
              </ul>
            </div>
            <!--/ End Top Left -->
          </div>
          <div class="col-lg-7 col-md-12 col-12">
            <!-- Top Right -->
            <div class="right-content">
              <ul class="list-main">
                <li><i class="ti-location-pin"></i> Store location</li>
                <li>
                  <i class="ti-alarm-clock"></i> <a href="#">Daily deal</a>
                </li>

                @if(session('TaiKhoan'))
                <li><i class="ti-user"></i> <a href="/myaccount">Thông tin tài khoản</a></li>
                <li>
                  <i class="ti-power-off"></i><a href="{{route('sign.out')}}">Đăng xuất</a>
                </li>
                @else
                <li>
                  <i class="ti-power-off"></i><a href="/signin">Đăng nhập</a>
                </li>
                @endif

              </ul>
            </div>
            <!-- End Top Right -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-2 col-12">
            <!-- Logo -->
            <div class="logo">
              <a href="/index"><img src="{{asset('images/logo.png')}}" alt="logo" /></a>
            </div>
            <!--/ End Logo -->

            <!-- Search Form -->
            <div class="search-top">
              <div class="top-search">
                <a href="#0"><i class="ti-search"></i></a>
              </div>
              <!-- Search Form -->
              <div class="search-top">
                <form class="search-form">
                  <input type="text" placeholder="Search here..." name="search" />
                  <button value="search" type="submit">
                    <i class="ti-search"></i>
                  </button>
                </form>
              </div>
              <!--/ End Search Form -->
            </div>
            <!--/ End Search Form -->
            <div class="mobile-nav"></div>
          </div>
          <div class="col-lg-8 col-md-7 col-12">
            <div class="search-bar-top">
              <div class="search-bar">
                <select>
                  <option selected="selected">All Category</option>
                  <option>watch</option>
                  <option>mobile</option>
                  <option>kid’s item</option>
                </select>
                <form>
                  <input name="search" placeholder="Search Products Here....." type="search" />
                  <button class="btnn"><i class="ti-search"></i></button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-12">
            <div class="right-bar">
              <!-- Search Form -->
              <div class="sinlge-bar">
                <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
              </div>
              <div class="sinlge-bar">
                <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
              </div>
              @if(session('TaiKhoan'))
              <div class="sinlge-bar shopping">
                <a href="/cart" class="single-icon"><i class="ti-bag"></i>
                  <span class="total-count">{{$cart->getTotalQuality()}}</span></a>
                <!-- Shopping Item -->
                <div class="shopping-item">
                  <div class="dropdown-cart-header">
                    <span>{{$cart->getTotalQuality()}} Sản phẩm</span>
                    <a href="/cart">Xem giỏ hàng</a>
                  </div>
                  <ul class="shopping-list">
                    @foreach($cart->getCart() as $c)
                    <li>
                      <a class="cart-img" href="/detail/{{$c['MaQuat']}}"><img src="{{asset('uploads/'. $c['image'])}}" alt="#" /></a>
                      <h4><a href="/detail/{{$c['MaQuat']}}">{{$c['name']}}</a></h4>
                      <p class="quantity">
                        {{$c['quant']}} - <span class="amount"> {{number_format($c['price'])}} VNĐ</span> <span>{{$c['color']}}</span>
                      </p>
                    </li>
                    @endforeach
                  </ul>
                  <div class="bottom">
                    <div class="total">
                      <span>Tổng tiền</span>
                      <span class="total-amount">{{number_format($cart->getTotalPrice())}} VNĐ</span>
                    </div>
                    <a href="/cart" class="btn animate">Vào giỏ hàng</a>
                  </div>
                </div>
                <!--/ End Shopping Item -->
              </div>
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
      <div class="container">
        <div class="cat-nav-head">
          <div class="row">
            <div class="col-lg-3">
              <div class="all-category">
                <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>DANH MỤC</h3>
                <ul class="main-category">
                  @foreach($loaiQuat as $loai)
                  <li><a href="{{route('loaiquat.index', $loai->MaLoaiQuat  )}}">{{ $loai->TenLoaiQuat }}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-lg-9 col-12">
              <div class="menu-area">
                <!-- Main Menu -->
                <nav class="navbar navbar-expand-lg">
                  <div class="navbar-collapse">
                    <div class="nav-inner">
                      <ul class="nav main-menu menu navbar-nav">
                        <li class="active"><a href="/index">Trang Chủ</a></li>
                        <li><a href="/product">Quạt</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                          <ul class="dropdown">
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                          </ul>
                        </li>
                        <li><a href="#">Pages</a></li>
                        <li><a href="/blog">Bài viết</a>

                        </li>
                        <li><a href="/contact">Liên hệ</a></li>
                      </ul>
                    </div>
                  </div>
                </nav>
                <!--/ End Main Menu -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ End Header Inner -->
  </header>
  <!--/ End Header -->

  <!-- main-->
  @yield('main')
  <!--/ End main-->



  <!-- Start Footer Area -->
  <footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6 col-12">
            <!-- Single Widget -->
            <div class="single-footer about">
              <div class="logo">
                <a href="/index"><img src="{{asset('images/logo2.png')}}" alt="#" /></a>
              </div>
              <p class="text">
                Praesent dapibus, neque id cursus ucibus, tortor neque egestas
                augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi,
                tincidunt quis, accumsan porttitor, facilisis luctus, metus.
              </p>
              <p class="call">
                Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span>
              </p>
            </div>
            <!-- End Single Widget -->
          </div>
          <div class="col-lg-2 col-md-6 col-12">
            <!-- Single Widget -->
            <div class="single-footer links">
              <h4>Information</h4>
              <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Faq</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Help</a></li>
              </ul>
            </div>
            <!-- End Single Widget -->
          </div>
          <div class="col-lg-2 col-md-6 col-12">
            <!-- Single Widget -->
            <div class="single-footer links">
              <h4>Customer Service</h4>
              <ul>
                <li><a href="#">Payment Methods</a></li>
                <li><a href="#">Money-back</a></li>
                <li><a href="#">Returns</a></li>
                <li><a href="#">Shipping</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
            <!-- End Single Widget -->
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <!-- Single Widget -->
            <div class="single-footer social">
              <h4>Get In Tuch</h4>
              <!-- Single Widget -->
              <div class="contact">
                <ul>
                  <li>NO. 342 - London Oxford Street.</li>
                  <li>012 United Kingdom.</li>
                  <li>info@eshop.com</li>
                  <li>+032 3456 7890</li>
                </ul>
              </div>
              <!-- End Single Widget -->
              <ul>
                <li>
                  <a href="#"><i class="ti-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="ti-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="ti-flickr"></i></a>
                </li>
                <li>
                  <a href="#"><i class="ti-instagram"></i></a>
                </li>
              </ul>
            </div>
            <!-- End Single Widget -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
      <div class="container">
        <div class="inner">
          <div class="row">
            <div class="col-lg-6 col-12">
              <div class="left">
                <p>
                  Copyright © 2020
                  <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>
                  - All Rights Reserved.
                </p>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="right">
                <img src="{{asset('images/payments.png')}}" alt="#" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /End Footer Area -->

  <!-- Jquery -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.0.js')}}"></script>
  <script src="{{asset('js/jquery-ui.min.js')}}"></script>
  <!-- Popper JS -->
  <script src="{{asset('js/popper.min.js')}}"></script>
  <!-- Bootstrap JS -->
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- Color JS -->
  <script src="{{asset('js/colors.js')}}"></script>
  <!-- Slicknav JS -->
  <script src="{{asset('js/slicknav.min.js')}}"></script>
  <!-- Owl Carousel JS -->
  <script src="{{asset('js/owl-carousel.js')}}"></script>
  <!-- Magnific Popup JS -->
  <script src="{{asset('js/magnific-popup.js')}}"></script>
  <!-- Fancybox JS -->
  <script src="{{asset('js/facnybox.min.js')}}"></script>
  <!-- Waypoints JS -->
  <script src="{{asset('js/waypoints.min.js')}}"></script>
  <!-- Countdown JS -->
  <script src="{{asset('js/finalcountdown.min.js')}}"></script>
  <!-- Nice Select JS -->
  <script src="{{asset('js/nicesellect.js')}}"></script>
  <!-- Ytplayer JS -->
  <script src="{{asset('js/ytplayer.min.js')}}"></script>
  <!-- Flex Slider JS -->
  <script src="{{asset('js/flex-slider.js')}}"></script>
  <!-- ScrollUp JS -->
  <script src="{{asset('js/scrollup.js')}}"></script>
  <!-- Onepage Nav JS -->
  <script src="{{asset('js/onepage-nav.min.js')}}"></script>
  <!-- Easing JS -->
  <script src="{{asset('js/easing.js')}}"></script>
  <!-- Active JS -->
  <script src="{{asset('js/active.js')}}"></script>
  <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui.min.js')}}"></script>
  <script src="{{asset('js/jquery.slicknav.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
</body>

</html>