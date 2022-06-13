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
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Thanh toán</h4>
            <form method="POST" action="{{url('checkout/order')}}">    
                <div class="row">                
                    @csrf    
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout__input">
                            <p>Tên người nhận<span>*</span></p>
                            <input type="text" style="color:black"value="{{$user->name}}" id="name" name="name">
                        </div>
                        <div class="checkout__input">
                            <p>Số điện thoại<span>*</span></p>
                            <input type="text" style="color:black" value="{{$user->phone}}" id="phone" name="phone">
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <select id="adress" name="address" style="width:100%">
                                @foreach($user->address as $address)
                                <option value="{{$address->address}}">{{$address->name}} - {{$address->address}}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" placeholder="Street Address" class="checkout__input__add"> -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout__order">
                            <h4>Thông tin đơn hàng</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng cộng </span></div>
                            <ul>
                                @if($list_whole->isNotEmpty())
                                @foreach($list_whole as $item)
                                <li>{{$item->name}} x {{$item->quantity}} <span>{{ number_format($item->price*$item->quantity ?? '333', 0, '', ',') }} vnđ</span></li>

                                @endforeach
                                @endif
                            </ul>
                            <div class="checkout__order__total">Tổng <span>{{ number_format($total ?? '333', 0, '', ',') }} vnđ</span></div>    
                            <button type="submit" class="site-btn">Đặt hàng</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                            </h6>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection