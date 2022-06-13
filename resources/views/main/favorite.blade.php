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
                            @if ($favorite_food->isNotEmpty())
                                @for($i = 0; $i < $favorite_food->count(); $i++)
                                <tr>
                                    <form method="POST" action="{{url('/favorite/remove',[$favorite_food[$i]->food_id])}}">                    
                                    @csrf 
                                    <td class="shoping__cart__item">
                                        <img src="{{$favorite_food[$i]->img}}" alt="unknow" style="float:left; height: 101px;width: 101;">
                                        <h3>{{$favorite_store[$favorite_food[$i]->id]->name}}</h3>
                                        <h5> <a href="{{url('/store', [$favorite_food[$i]->store_id])}}" style="color:black; decoration:none">{{$favorite_food[$i]->name}}</a></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Giá: {{ number_format($favorite_food[$i]->price ?? '333', 0, '', ',') }} vnđ
                                    </td>
                                    <td class="shoping__cart__total">
                                        
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <button class="func-btn"type="submit"name="action" value="remove"><span class="icon_close"></span></button>
                                    </td>
                                    </form>
                                </tr>
                                @endfor
                            @else
                            <tr>
                                <td class="shoping__cart__item">
                                    <h5>Bạn chưa có món ăn yêu thích nào</h5>
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