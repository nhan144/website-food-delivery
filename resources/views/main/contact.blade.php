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

<!-- Contact Section Begin -->
<section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Điện thoại</h4>
                        <p>+84-770-9222</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa chỉ</h4>
                        <p>470 Đường Trần Đại Nghĩa, Hoà Hải, Ngũ Hành Sơn, Đà Nẵng</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>doancn2@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15342.955240961428!2d108.25323739999997!3d15.9750106!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1654957682637!5m2!1svi!2s"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Đà Nẵng</h4>
                <ul>
                    <li>Số điện thoại: +84-770-9222</li>
                    <li>Địa chỉ: 470 Đường Trần Đại Nghĩa, Hoà Hải, Ngũ Hành Sơn, Đà Nẵng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

@endsection