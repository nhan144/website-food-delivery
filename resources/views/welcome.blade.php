
@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>FASTFOOD</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <span>Khám phá, đặt hàng, giao tận nơi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item slidebar_item_inside">
                            <h4>Deal hôm nay</h4>
                            <ul>
                                <li><a href="#">Đồ ăn</a></li>
                                <li><a href="#">Đồ uống</a></li>
                                <li><a href="#">Đồ chay</a></li>
                                <li><a href="#">Bánh kem</a></li>
                                <li><a href="#">Tráng miệng</a></li>
                                <li><a href="#">Homemade</a></li>
                                <li><a href="#">Vỉa hè</a></li>
                                <li><a href="#">Pizza/Burger</a></li>
                                <li><a href="#">Món gà</a></li>
                                <li><a href="#">Món lẩu</a></li>
                                <li><a href="#">Sushi</a></li>
                                <li><a href="#">Mì phở</a></li>
                                <li><a href="#">Cơm hộp</a></li>
                            </ul>
                        </div>
                        <div style="padding-top:50px"></div>
                        <div class="sidebar__item slidebar_item_inside slidebar_item_sticky">
                            <h4>Khám phá</h4>
                            <ul>
                                <li><a href="#">Ăn gì</a></li>
                                <li><a href="#">Bộ sưu tập</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Khuyến mãi</a></li>
                                
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Xu hướng tìm kiếm</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Trà sữa</a>
                                <a href="#">Bánh tráng trộn</a>
                                <a href="#">Salad</a>
                                <a href="#">Gà rán</a>
                                <a href="#">Xoài lắc</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <!--span1-->
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @for($i = 0; $i < 6; $i++)
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{ $sale_off_list[$i]->img ?? 'error'}}">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="{{url('/favorite', [$sale_off_list[$i]->id])}}"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="{{url('/cart/add', [$sale_off_list[$i]->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>{{$sale_off_list[$i]->type ?? N/A}}</span>
                                            <h5><a href="{{url('/store', [$sale_off_list[$i]->store_id])}}">{{ $sale_off_list[$i]->name ?? 'error'}}</a></h5>
                                            <div class="product__item__price">{{ number_format($food_list[$i]->price ?? '333', 0, '', ',') }} vnđ <span>36.00 vnđ</span></div>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                <!--Span 2 -->
                <section class="featured spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <h2>Sản phẩm nổi bật</h2>
                                </div>
                                <div class="featured__controls">
                                    <ul>
                                        <li class="active" data-filter="*">Tất cả</li>
                                        <li data-filter=".food">Đồ ăn</li>
                                        <li data-filter=".fresh-meat">Đồ uống</li>
                                        <li data-filter=".hảisản">Hải sản</li>
                                        <li data-filter=".tràsữa">Trà sữa</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row featured__filter">
                            @for($i = 0; $i < 12; $i++)
                            <div class="col-lg-3 col-md-4 col-sm-6 mix food {{str_replace(' ', '',$food_list[$i]->type)}}">
                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg" data-setbg="{{ $food_list[$i]->img ?? 'error'}}">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="{{url('/favorite', [$food_list[$i]->id])}}"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{url('/cart/add', [$food_list[$i]->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="{{url('/store', [$food_list[$i]->store_id])}}">{{ $food_list[$i]->name ?? 'error'}}</a></h6>
                                        <h5> {{ number_format($food_list[$i]->price ?? '333', 0, '', ',') }} vnđ</h5>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </section>
    <!-- Featured Section End -->
            </div>
        </div>
    </section>



@endsection