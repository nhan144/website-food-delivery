<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('ad/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ad/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('ad/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('ad/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ad/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ad/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('ad/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('ad/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('img/1-logo-rs.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="../../index.html" style ="color:white">FastFood</a>
                <a class="sidebar-brand brand-logo-mini" href="../../index.html" style ="color:white">FastFood</a>

            </div>
            <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="https://www.w3schools.com/howto/img_avatar.png" alt="">
                        <span class="count bg-success"></span>
                        </div>
                        <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{$user->name}}</h5>
                        @if($user->role==1)
                        <span>Chủ cửa hàng</span>
                        @else
                        @endif
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item nav-category">
                <span class="nav-link">Danh mục</span>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Quản lý</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.order')}}">Đơn hàng</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.food')}}">Sản phẩm</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.bill')}}">Hóa đơn</a></li>
                </ul>
                </div>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="#">
                <span class="menu-icon">
                    <i class="mdi mdi-store"></i>
                </span>
                <span class="menu-title">Thông tin cửa hàng</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="#">
                <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Sự kiện</span>
                </a>
            </li>
            
            </ul>
      </nav>
      <!-- NAV -->
      <div class="container-fluid page-body-wrapper">
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="img/1-logo-rs.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <!-- <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                </form>
              </li> -->
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <!-- <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                      <p class="text-muted mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">4 new messages</p>
                </div>
              </li> -->
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Bạn có {{Auth::user()->adminNewNotice->count()}} thông báo mới</h6>
                  @foreach(Auth::user()->adminNewNotice->take(2) as $notice)
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-cart-plus"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">{{$notice->title}}</p>
                      <p class="text-muted ellipsis mb-0"> {{$notice->content}} </p>
                    </div>
                  </a>
                  @endforeach
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center"> <a href="#" style="decoration:none"> Xem thêm<i class="mdi mdi-link-variant"></i></a></p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="https://www.w3schools.com/howto/img_avatar.png" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{$user->name}}</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Hồ sơ</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="{{route('home')}}">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Quay lại trang chủ</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="{{route('auth.logout')}}">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Đăng xuất</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Cài đặt</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>

    @yield('content')
    @extends('admin.layouts.footer')
</body>
</html>