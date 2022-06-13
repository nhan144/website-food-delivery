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
                            <form class="forms-sample"method="GET" action="{{url('admin/bill/search')}}">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ngày bắt đầu</label>
                                    <div class="col-sm-9">
                                    <input type="date" id="daysE" name="dayStart">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ngày kết thúc</label>
                                    <div class="col-sm-9">
                                    <input type="date" id="daysE" name="dayEnd">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <button class="btn btn-sm btn-primary" type="submit">Tìm</button>
                            </form>
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
                            <th> Người đặt</th>
                            <th> Thành tiền</th>
                            <th> Thời gian</th>
                            <th> Thông tin đơn hàng</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($bill_list as $bill)
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td> {{$bill->id}} </td>
                            <td> {{$bill->user_id}} </td>
                            <td> {{$bill->cash}} </td>
                            <td> {{$bill->created_at}}</td>
                            <td> 
                              <a href="{{url('/admin/bill',[$bill->id])}}">
                                <i class="mdi mdi-file-find"></i>
                              </a> 
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
    </div>
    </div>
</div>
            
@endsection