@extends('admin.layouts.master')
@section('title', 'Home')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Thông tin hóa đơn</h4>
                    <!-- <form class="forms-sample"> -->
                        <div class="form-group">
                        <label for="exampleInputName1">Name người mua</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="" value='{{$b->id}}'>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail3">Thanh toán</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="" value="{{$b->cash}}">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword4">Thời gian</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="" value="{{$b->created_at}}">
                        </div>
                        <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" >{{$b->order_info}}</textarea>
                        </div>
                        <a href="{{url('admin/bill')}}"class="btn btn-dark">Quay lại</a>
                    <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>      
@endsection