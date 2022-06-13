@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ URL::to ('/')}}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $store->name ?? 'error'}}</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <a href="./index.html">Vegetables</a>
                            <span>{{ $store->name ?? 'error'}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ $store->img ?? 'error'}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @for($i = 0; $i < 4; $i++)
                            <img data-imgbigurl="{{ $food_list_random[$i]->img ?? 'error'}}"
                                src="{{ $food_list_random[$i]->img ?? 'error'}}""alt="">
                            @endfor
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $store->name ?? 'error'}}</h3>
                        <div class="product__details__rating">
                            @for($i=0;$i<$rate_point;$i++)
                                @if($i+0.5 - $rate_point == 0)
                                <i class="fa fa-star-half-o"></i>
                                @else
                                <i class="fa fa-star"></i>
                                @endif
                            @endfor
                            <!-- <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i> -->
                            <span>({{$rate_list->count()}} đánh giá)</span>
                        </div>
                        <div class="product__details__price">{{ $store->phone ?? 'error'}}</div>
                        <p>{{ $store->address ?? 'error'}}</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Thêm vào giỏ hàng</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Trạng thái</b> <span>Mở cửa</span></li>
                            <li><b>Giờ mở cửa</b> <span>{{ $store->time_open ?? 'error'}}:00 - {{ $store->time_end ?? 'error'}}:00</span></li>
                            <li><b>Giá cả</b> <span>{{ number_format($min_price->price ?? '333', 0, '', ',') }} - {{ number_format($max_price->price ?? '333', 0, '', ',') }} vnđ</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Danh sách món ăn</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Mã khuyến mãi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Đánh giá <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <section class="related-product">
                                        <div class="container">
                                            <div class="row">
                                                @foreach($food_list_avg as $food)
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="product__item">
                                                        <div class="product__item__pic set-bg" data-setbg="{{ $food->img ?? 'error'}}">
                                                            <ul class="product__item__pic__hover">
                                                            <li><a href="{{url('/favorite', [$food->id])}}"><i class="fa fa-heart"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                            <li><a href="{{url('/cart/add', [$food->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="product__item__text">
                                                            <h6><a href="#">{{ $food->name ?? 'error'}}</a></h6>
                                                            
                                                            <div class="product__details__rating">
                                                                @for($i=0;$i<floor($food->average_rate * 2) / 2;$i++)
                                                                    @if($i+0.5 - floor($food->average_rate * 2) / 2 == 0)
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    @else
                                                                    <i class="fa fa-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <h5>{{ number_format($food->price ?? '333', 0, '', ',') }} vnđ</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>

                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    

@endsection