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
                        <a href="{{url('home')}}">Trang chủ</a>
                        <span>Khám phá, đặt hàng, giao tận nơi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Section Begin -->
<section style="padding-top:30px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
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
                
                @if($search_list->first())
                <!--Span 2 -->
                <section class="featured spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <h3>Kết quả tìm kiếm của "{{$text}}", tìm thấy {{$search_list->count()}} kết quả</h3>
                                </div>
                                <div class="featured__controls">
                                    <ul>
                                        <li class="active" data-filter="*">Tất cả</li>
                                        <!-- <li data-filter=".oranges">Đồ ăn</li>
                                        <li data-filter=".fresh-meat">Đồ uống</li>
                                        <li data-filter=".vegetables">Đồ ăn vặt</li>
                                        <li data-filter=".fastfood">Trà sữa</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row featured__filter">
                            @foreach($search_list as $item)
                            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg" data-setbg="{{ $item->img ?? 'error'}}">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="{{url('/favorite', [$item->id])}}"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{url('/cart/add', [$item->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="{{url('/store', [$item->store_id])}}">{{ $item->name ?? 'error'}}</a></h6>
                                        <h5> {{ number_format($item->price ?? '333', 0, '', ',') }} vnđ</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                @endif
                @if($search_list_category->first())
                <!--Span 3 -->
                <section class="featured spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <h3>Kết quả tìm kiếm theo thể loại của "{{$text}}", tìm thấy {{$search_list_category->count()}} kết quả</h3>
                                </div>
                                <div class="featured__controls">
                                    <ul>
                                        <li class="active" data-filter="*">Tất cả</li>
                                        <!-- <li data-filter=".oranges">Đồ ăn</li>
                                        <li data-filter=".fresh-meat">Đồ uống</li>
                                        <li data-filter=".vegetables">Đồ ăn vặt</li>
                                        <li data-filter=".fastfood">Trà sữa</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row featured__filter">
                            @foreach($search_list_category as $item)
                            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg" data-setbg="{{ $item->img ?? 'error'}}">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="{{url('/favorite', [$item->id])}}"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{url('/cart/add', [$item->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="{{url('/store', [$item->store_id])}}">{{ $item->name ?? 'error'}}</a></h6>
                                        <h5> {{ number_format($item->price ?? '333', 0, '', ',') }} vnđ</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                @endif
                </div>
            </div>
        </div>
    </section>
@endsection