@extends('admin.layouts.master')
@section('title', 'Home')
@section('content')
<!-- partial -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tìm kiếm sản phẩm</h4>
                            <div class="form-group">
                              <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <button class="btn btn-sm btn-primary" type="button">Tìm</button>
                                </div>
                              </div>
                            </div>
                            <a class="btn btn-success btn-fw" style="color:white;text-decoration: none;" href="{{url('admin/food/add')}}">+ Thêm món ăn</a>
                            <a class="btn btn-success btn-fw"style="color:white;text-decoration: none;" href="{{url('admin/food/category')}}">+ Thêm thể loại</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--Order status-->
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh sách món ăn hiện có</h4>
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
                            <th> Sửa </th>
                            <!-- <th> Ẩn/Hiện </th> -->
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($food_list as $food)
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
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
                            <td> 
                              <a href="{{url('/admin/food', [$food->id])}}">
                                <i class="mdi mdi-table-edit"></i>
                              </a> 
                            </td>
                            <!-- <td>
                              <div class="badge badge-outline-success">Approved</div>
                              <div class="badge badge-outline-warning">Pending</div>
                              <div class="badge badge-outline-danger">Rejected</div>
                            </td> -->
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title">Hoạt động cập nhật</h4>
                      <p class="text-muted mb-1 small">View all</p>
                    </div>
                    <div class="preview-list">
                    @foreach ($food_list_update as $food)
                      <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                          <img src="assets/images/faces/face6.jpg" alt="image" class="rounded-circle" />
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                          <div class="flex-grow">
                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                              <h6 class="preview-subject">{{$food->name}}</h6>
                              <p class="text-muted text-small">5 minutes ago</p>
                            </div>
                            <p class="text-muted">Well, it seems to be working now.</p>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
          </div> -->
    </div>
    </div>
</div>
            
@endsection