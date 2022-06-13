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
                    <h4 class="card-title">Danh sách món ăn hiện có</h4>
                        <form class="forms-sample"method="POST" action="{{url('admin/food/category/add')}}">
                        @csrf
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
                                <th> Thể loại </th>
                                <th> Trạng thái </th>
                                <th> Cập nhật lần cuối </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($food_list as $food)
                                <tr>
                                <td>
                                    <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input"name="f_id[]" value="{{$food->id}}">
                                    </label>
                                    </div>
                                </td>
                                <td>
                                    <img src="{{$food->img}}" alt="image" />
                                    <span class="pl-2">{{$food->name}}</span>
                                </td>
                                <td> {{$food->price}} </td>
                                <td> 
                                @if($food->category()->first())
                                    {{$food->category()->first()->type}}
                                @else
                                    N/A
                                @endif
                                </td>
                                <td> Hoạt động </td>
                                <td> {{$food->created_at}} </td>
                                
                                </tr>
                                @endforeach
                            </tbody>
                            
                            </table>
                        </div>
                        <div class="form-group">
                            <label for="select">Thể loại có sẵn</label>
                            <select class="form-control" id="select" name="select">
                                @foreach($category_list as $category)
                                <option value="{{$category->type}}">{{$category->type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Tên thể loại</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="Nhập thể loại muốn tạo" value="">
                        </div>
                        <button class="btn btn-success btn-fw">+ Thêm thể loại</button>
                        </form>
                        <br>
                        <a type="submit" class="btn btn-dark" href="{{url('admin/food')}}">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
@endsection