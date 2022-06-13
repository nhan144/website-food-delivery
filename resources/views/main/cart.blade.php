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

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng cộng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($item_list->isNotEmpty())
                            @foreach($item_list as $item)
                            <tr>
                                <form method="POST" action="{{url('/cart/update', [$item->id])}}">                    
                                @csrf           
                                <td class="shoping__cart__item">
                                    <img src="{{ $item->img ?? 'error'}}" alt="unknow" style=" height: 101px;width: 101;">
                                    <h5><a href="{{url('/store', [$item->store_id])}}" style="color:black; decoration:none">{{ $item->name ?? 'error'}}</a></h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{ number_format($item->price ?? '333', 0, '', ',') }} vnđ
                                    
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <!-- <span class="dec qtybtn">-</span> -->
                                            <button class="func-btn"type="submit"name="action" value="decrease">-</button>
                                            <input id="quantity_item" name="quantity_item" type="text" value="{{$item->quantity ?? 'error'  }}">
                                            <button class="func-btn"type="submit"name="action" value="increase">+</button>
                                            <!-- <span class="inc qtybtn"><a href="" >+</span> -->
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    {{ number_format($item->price*$item->quantity ?? '333', 0, '', ',') }} vnđ
                                </td>
                                <td class="shoping__cart__item__close">
                                    <button class="func-btn"type="submit"name="action" value="remove"><span class="icon_close"></span></button>
                                </td>
                                </form>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="shoping__cart__item">
                                    <h5>Bạn chưa có hàng nào trong giỏ</h5>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{url('home')}}" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                    <a href="{{url('cart')}}" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Cập nhật giỏ hàng</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Mã giảm giá</h5>
                        <form action="#">
                            <input type="text" placeholder="Nhập mã giảm giá ở đây">
                            <button type="submit" class="site-btn">Áp dụng</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Thông tin giỏ hàng</h5>
                    @if ($item_list->isNotEmpty())
                    <ul>
                        <li>Giá <span>{{ number_format($total ?? '333', 0, '', ',') }} vnđ</span></li>
                        <li>Tổng thanh toán <span>{{ number_format($total ?? '333', 0, '', ',') }} vnđ</span></li>
                    </ul>
                    @else
                    <ul>
                        <li>Giá <span>0 vnđ</span></li>
                        <li>Tổng thanh toán <span>0 vnđ</span></li>
                    </ul>
                    @endif
                    <a href="{{url('checkout')}}" class="primary-btn">Đặt hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Shoping Cart Section End -->

@endsection