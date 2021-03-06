<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('img/1-logo-rs.png') }}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
            @if (!Auth::guest())
                <li><a href="{{url('favorite')}}"><i class="fa fa-heart"></i> <span>{{Auth::user()->favorite->count() ?? 0}}</span></a></li>
                <li><a href="{{url('cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{Auth::user()->cart->count() ?? 0}}</span></a></li>
                <li><a href="{{url('notice')}}"><i class="fa fa-bell"></i> <span>{{Auth::user()->cart->count() ?? 0}}</span></a></li>
            @else
                <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
            @endif
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{ asset('img/language.png') }}" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
            @if (!Auth::guest())
                <div class="dropdown">
                    <button class="dropbtn"><a href="#"><i class="fa fa-user"></i> {{Auth::user()->name}}</a></button>
                    <div class="dropdown-content">
                        <a href="{{url('user')}}">Trang c?? nh??n</a>
                        <a href="{{ url('logout') }}">????ng xu???t</a>
                    </div>
                </div>
            @else
                <a href="{{ url('login') }}"><i class="fa fa-user"></i> ????ng nh???p</a>
            @endif
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{url('home')}}">Trang ch???</a></li>
                <li><a href="#">Khuy???n m??i</a></li>
                <li><a href="{{url('cart')}}">Gi??? h??ng</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{url('cart')}}">Gi??? h??ng</a></li>
                        <li><a href="{{url('checkout')}}">Thanh to??n</a></li>
                    </ul>
                </li>
                <li><a href="#">Blog</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> doancn2@gmail.com</li>
                <li>Free Shipping cho ????n h??ng t???i thi???u 300k</li>
            </ul>
        </div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> doancn2@gmail.com</li>
                                <li>Free Shipping cho ????n h??ng t???i thi???u 300k</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                            @if (!Auth::guest())
                                <div class="dropdown">
                                    <button class="dropbtn"><a href="#"><i class="fa fa-user"></i> {{Auth::user()->name}}</a></button>
                                    <div class="dropdown-content">
                                        <a href="{{url('user')}}">Trang c?? nh??n</a>
                                        @if(Auth::user()->role == 1)
                                        <a href="{{url('admin')}}">Trang qu???n l??</a>
                                        @endif
                                        <a href="{{ url('logout') }}">????ng xu???t</a>
                                    </div>
                                </div>
                            @else
                                <a href="{{ url('login') }}"><i class="fa fa-user"></i> ????ng nh???p</a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/1-logo-rs.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{url('home')}}">Trang ch???</a></li>
                            <li><a href="#">Khuy???n m??i</a></li>
                            <li><a href="{{url('cart')}}">Gi??? h??ng</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{url('cart')}}">Gi??? h??ng</a></li>
                                    <li><a href="{{url('checkout')}}">Thanh to??n</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="{{url('contact')}}">Li??n h???</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2">
                    <div class="header__cart">
                        <ul>
                        @if (!Auth::guest())
                            <li><a href="{{url('favorite')}}"><i class="fa fa-heart"></i> <span>{{Auth::user()->favorite->count() ?? 0}}</span></a></li>
                            <li><a href="{{url('cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{Auth::user()->cart->count() ?? 0}}</span></a></li>
                            <li>
                                <!-- <div class="dropdown2"> -->
                                <a href="#"onclick="myFunction()" class="dropbtn2"><i class="fa fa-bell"></i><span>{{Auth::user()->newNotice->count() ?? 0}}</span></a>
                                <div id="dropdown2" class="dropdown-content2 title-notice">
                                    <p class="dropdown2-top">B???n c?? {{Auth::user()->newNotice->count()}} th??ng b??o m???i</p>
                                    @foreach(Auth::user()->newNotice->take(2) as $notice)
                                    <hr>
                                    <p class="dropdown2-item-title"><b>{{$notice->title}}</b></p>
                                    <p class="dropdown2-item-content">{{$notice->content}}</p>
                                    <p class="dropdown2-item-time" >{{$notice->created_at}}</p>
                                    @endforeach
                                    <hr>
                                    <a class="dropdown2-a" href="{{url('notice')}}" style="decoration:none;">Xem th??m</a>
                                </div>
                                <!-- </div> -->
                            </li>
                        @else
                            <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Ph??? bi???n</span>
                        </div>
                        <ul>
                            <li><a href="#">????? ??n</a></li>
                            <li><a href="#">????? u???ng</a></li>
                            <li><a href="#">????? chay</a></li>
                            <li><a href="#">B??nh kem</a></li>
                            <li><a href="#">Tr??ng mi???ng</a></li>
                            <li><a href="#">Homemade</a></li>
                            <li><a href="#">V???a h??</a></li>
                            <li><a href="#">Pizza/Burger</a></li>
                            <li><a href="#">M??n g??</a></li>
                            <li><a href="#">M??n l???u</a></li>
                            <li><a href="#">Sushi</a></li>
                            <li><a href="#">M?? ph???</a></li>
                            <li><a href="#">C??m h???p</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form method="GET"action="{{url('search')}}">
                                <div class="hero__search__categories">
                                    M??n ??n                                    
                                </div>
                                <input type="text" name="text" placeholder="Nh???p v??o t??? kh??a t??m ki???m...">
                                <button type="submit" class="site-btn">T??M KI???M</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @yield('content')
    @extends('layouts.footer')
</body>
</html>