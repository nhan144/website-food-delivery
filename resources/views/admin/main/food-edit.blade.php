@extends('admin.layouts.master')
@section('title', 'Home')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chỉnh sửa thông tin món ăn</h4>
                        <!-- <p class="card-description"> Điền </p> -->
                        <form class="forms-sample"method="POST" action="{{url('/admin/food/update', [$food->id??1])}}">                    
                        @csrf 
                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên món" value="{{$food->name??333}}">
                            </div>
                            <div class="form-group">
                                <label for="price">Giá</label>
                                <input type="text" class="form-control" id="price" name="price"placeholder="Chỉ nhập số, không nhập dấu phân cách" value="{{$food->price??333}}">
                            </div>
                            <div class="form-group">
                                <label for="img">Nhập đường dẫn ảnh</label>
                                <input type="text" class="form-control" id="img" name="img"placeholder="Link" value="{{$food->img??333}}">
                            </div>
                            <div class="form-group">
                                <label for="noCap">Thể loại</label>
                                <select class="form-control" id="noCap">
                                    <option>N/a</option>
                                    <!-- <option>Female</option> -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" name="" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">File</button>
                                </span>
                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleInputCity1">City</label>
                                <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Textarea</label>
                                <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                            </div> -->
                            </div>
                            <button type="submit" class="btn btn-primary mr-2" name="action" value="update">Thay đổi</button>
                            <button type="submit" class="btn btn-dark" name="action" value="back">Quay lại</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection