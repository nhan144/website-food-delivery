
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
                        <h4>{{Auth::user()->name}}</h4>
                    </div>
                        <div class="sidebar__item slidebar_item_inside">
                            <ul>
                                <li><a href="{{route('user.info')}}">Thông tin cá nhân</a></li>
                                <li><a href="#">Đổi mật khẩu</a></li>
                                <li><a href="#">Quản lý hình đại diện</a></li>
                                <li><a href="{{route('user.address')}}">Thêm địa chỉ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="card">
                        <div class="card-header">Quản lý địa chỉ</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.address.save')}}">
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
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Tên gợi nhớ</label>
                                    <div class="col-md-6">
                                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">Địa chỉ</label>

                                    <div class="col-md-6">
                                        <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn site-btn">
                                            Lưu địa chỉ
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group row pad-small">
                                <table id="customers">
                                    <tr>
                                        <th>Tên gợi nhớ</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Hành động</th>
                                    </tr>
                                    @if ($address_list)
                                    @foreach($address_list as $item)
                                    <form method="POST" action="{{ route('user.address.remove')}}">
                                    @csrf
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{Auth::user()->phone}}</td>
                                        <td>
                                            <button class="func-btn" type="submit"name="action" value="{{$item->id}}"><span class="icon_close"></span></button>
                                        </td>
                                    </tr>
                                    </form>
                                    @endforeach
                                    @else
                                    @endif    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection