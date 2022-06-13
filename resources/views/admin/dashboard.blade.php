@extends('admin.layouts.master')
@section('title', 'Home')
@section('content')
<!-- partial -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$rate_point}}</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Đánh giá trung bình các món ăn</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ number_format($total_income ?? '333', 0, '', '.') }}</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Tổng thu nhập (vnđ)</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ number_format($today_income ?? '333', 0, '', '.') }}</h3>
                          <p class="text-danger ml-2 mb-0 font-weight-medium"></p>
                        </div>
                      </div>
                      <div class="col-3">
                        <!-- <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                         -->
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Thu nhập hôm nay (vnđ)</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{Auth::user()->store->adminNewOrder->count()}}</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                        <a href="{{route('admin.order')}}" style="text-decoration:none"><span class="mdi mdi-arrow-top-right icon-item"></span></a>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Đơn hàng đang chờ</h6>
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title">Top 5 món ăn đánh giá cao</h4>
                      <p class="text-muted mb-1 small"></p>
                    </div>
                    <div class="preview-list">
                    @foreach($top_5_rate as $fod)
                      <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                          <img src="{{$fod->img}}" alt="image" class="rounded-circle" />
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                          <div class="flex-grow">
                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                              <h6 class="preview-subject">{{$fod->name}}</h6>
                              <p class="text-muted text-small">{{floor($fod->average_rate * 2) / 2}}</p>
                            </div>
                            <p class="text-muted"></p>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Thông báo</h4>
                      <p class="text-muted mb-1">Thời gian</p>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                        
                          @foreach(Auth::user()->adminNewNotice as $notice)
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-primary">
                                <i class="mdi mdi-bell"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">{{$notice->title}}</h6>
                                <p class="text-muted mb-0">{{$notice->content}}</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">{{$notice->getSubtractMin()}} giờ trước</p>
                                <p class="text-muted mb-0">{{$notice->created_at->format('Y-m-d')}}</p>
                              </div>
                            </div>
                          </div>
                          @endforeach
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- <div class="row">
              <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body"> -->
                  <!-- <div class="card-body">
                    <h4 class="card-title">Đánh giá từ khách hàng</h4>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Transfer to Paypal</h6>
                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">$236</h6>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Tranfer to Stripe</h6>
                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">$593</h6>
                      </div>
                    </div>
                  </div> -->
              <!-- 
              <div class="col-md-12 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">To do list</h4>
                    <div class="add-items d-flex">
                      <input type="text" class="form-control todo-list-input" placeholder="enter task..">
                      <button class="add btn btn-primary todo-list-add-btn">Add</button>
                    </div>
                    <div class="list-wrapper">
                      <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                        <li>
                          <div class="form-check form-check-primary">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Create invoice </label>
                          </div>
                          <i class="remove mdi mdi-close-box"></i>
                        </li>
                        <li>
                          <div class="form-check form-check-primary">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Meeting with Alita </label>
                          </div>
                          <i class="remove mdi mdi-close-box"></i>
                        </li>
                        <li class="completed">
                          <div class="form-check form-check-primary">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                          </div>
                          <i class="remove mdi mdi-close-box"></i>
                        </li>
                        <li>
                          <div class="form-check form-check-primary">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Plan weekend outing </label>
                          </div>
                          <i class="remove mdi mdi-close-box"></i>
                        </li>
                        <li>
                          <div class="form-check form-check-primary">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                          </div>
                          <i class="remove mdi mdi-close-box"></i>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>-->
              </div>
            </div> 
            
@endsection