@extends('admin.layouts.master')
@section('title', 'Home')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <!--Order status-->
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thông tin đơn hàng</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                    <div class="form-check form-check-muted m-0">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        </label>
                                    </div>
                                    </th>
                                    <th> Tên món </th>
                                    <th> Giá </th>
                                    <th> Số lượng </th>
                                    <th> Tổng giá </th>
                                    <th> Trạng thái </th>
                                </tr>
                                </thead>
                                <tbody>
                                
                            <form class="forms-sample"method="POST" action="{{url('admin/order/success')}}">
                            @csrf                       
                                    @foreach($info_order as $item)
                                <tr>
                                    <td>
                                    <div class="form-check form-check-muted m-0">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="order[]" value="{{$item->id}}">
                                        </label>
                                    </div>
                                    </td>
                                    <td>
                                    <img src="{{$item->img}}" alt="image" />
                                    <span class="pl-2">{{$item->name}}</span>
                                    </td>
                                    <td> {{$item->price}} </td>
                                    <td> {{$item->quantity}} </td>
                                    <td> {{$item->price*$item->quantity}} </td>
                                    <td> 
                                    <a href="">
                                        @if($item->status == 0)
                                        <div class="badge badge-outline-warning">Đang chờ</div>
                                        @elseif($item->status == 1)
                                        <div class="badge badge-outline-success">Đã chuyển</div>
                                        @else
                                        <div class="badge badge-outline-danger">Hủy bỏ</div>
                                        @endif
                                    </a> 
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary mr-2" name="action" value="update">Xác nhận đã chuyển</button>
                            <button type="submit" class="btn btn-dark" name="action" value="back">Quay lại</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
@endsection