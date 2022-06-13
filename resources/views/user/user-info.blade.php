
@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                    <div class ="center avatar-spad"> 
                        <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">    
                        <h4>{{$user->name}}</h4>
                    </div>
                        <div class="sidebar__item slidebar_item_inside">
                            <ul>
                                <li><a href="{{route('user.info')}}">Thông tin cá nhân</a></li>
                                <li><a href="#">Đổi mật khẩu</a></li>
                                <li><a href="#">Quản lý hình đại diện</a></li>
                                <li><a href="{{route('user.address')}}">Thêm địa chỉ</a></li>
                                <li><a href="#">Đăng ký cửa hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="card">
                        <div class="card-header">Thông tin tài khoản</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('user.info.update')}}">
                                @if(Session::get('success'))
                                <div class="alert">
                                    {{ Session::get('success')}}
                                </div>
                                @endif
                                @if(Session::get('fail'))
                                <div class="alert">
                                    {{ Session::get('fail')}}
                                </div>
                                @endif
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Tên</label>

                                    <div class="col-md-6">
                                        <input id="name"value="{{Auth::user()->name}}" type="name" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Số điện thoại</label>

                                    <div class="col-md-6">
                                        <input id="phone" value="{{Auth::user()->phone}}" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" autofocus>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn site-btn">
                                            Thay đổi
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection