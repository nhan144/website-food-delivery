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
                            <h4 class="card-title">Tìm kiếm</h4>
                            <div class="form-group">
                              <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <button class="btn btn-sm btn-primary" type="button">Tìm</button>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Order status-->
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh sách đơn hàng đang trong hàng chờ</h4>
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
                            <th> Mã đơn</th>
                            <th> Tổng giá</th>
                            <th> Thời gian đặt hàng</th>
                            <th> Trạng thái</th>
                            <th> Thông tin đơn hàng</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($order_list as $order)
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td> {{$order->id}} </td>
                            <td> {{$order->price}} </td>
                            <td> {{$order->created_at }} </td>
                            <td> 
                            @if($order->status == 0)
                              <div class="badge badge-outline-warning">Đang chờ</div>
                            @elseif($order->status == 1)
                              <div class="badge badge-outline-success">Đã chuyển</div>
                            @else
                              <div class="badge badge-outline-danger">Hủy bỏ</div>
                            @endif
                            <td> 
                              <a href="{{url('/admin/order',[$order->created_at])}}">
                                <i class="mdi mdi-file-find"></i>
                              </a> 
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                        
                      </table>
                        <h4 class="card-title">Các trạng thái</h4>
                        <div class="badge badge-outline-warning">Đang chờ</div>
                        <div class="badge badge-outline-success">Đã chuyển</div>
                        <div class="badge badge-outline-danger">Hủy bỏ</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Row2-->
            <!-- <div class="row">
              <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title">Hoạt động cập nhật</h4>
                      <p class="text-muted mb-1 small">View all</p>
                    </div>
                    <div class="preview-list">
                      <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                          <img src="assets/images/faces/face6.jpg" alt="image" class="rounded-circle" />
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                          <div class="flex-grow">
                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                              <h6 class="preview-subject"></h6>
                              <p class="text-muted text-small">5 minutes ago</p>
                            </div>
                            <p class="text-muted">Well, it seems to be working now.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div> -->
    </div>
    </div>
</div>
            
@endsection