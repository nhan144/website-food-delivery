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
                        <!-- <thead>
                            <tr>
                                <th class="shoping__product">Tên món</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead> -->
                        <hr>
                        <tbody>
                            @if ($notice_list->isNotEmpty())
                            @foreach($notice_list as $item)
                            <tr> 
                                <td class="shoping__cart__item">
                                <h4>{{$item->title}}</h4>
                                <h5>{{$item->content}}</h5>
                                <p>{{$item->created_at}}</p>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="shoping__cart__item">
                                    <h5>Bạn chưa có thông báo nào</h5>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Shoping Cart Section End -->

@endsection