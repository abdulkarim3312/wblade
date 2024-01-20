@extends('frontend.user-dashboard.master')
@section('title')
    @include('frontend.orders.partials.title')
@endsection
@section('styles')
    <style>
        .btn-sm-custom{
            padding: 5px 5px;
            line-height: 16px;
            font-size: 16px;
        }
        .btn-sm-custom i {
            margin-right: 0px !important;
        }
        .social-widget-card-custom{
            cursor: pointer;
        }
        #users_table_filter{
            text-align: right;
        }
    </style>
@endsection
@section('user-content')
<div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('{{asset('backend/assets/img/curved-images/curved0.jpg')}}'); background-position-y: 50%;">
  <span class="mask bg-gradient-info opacity-6"></span>
</div>
<div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
  <div class="row gx-4">
      <div class="col-auto my-auto">
          <div class="h-100">
              <h5 class="mb-1">
                  {{ $user->name}}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                  {{ $user->email }}
              </p>
          </div>
      </div>
  </div>
</div>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12 col-xl-6">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Personal Info</h6>
          </div>
          <div class="card-body p-3">
            <ul class="list-group">
                <form action="{{ route('customer_profile_update') }}" method="POST" data-parsley-validate data-parsley-focus="first">
                    @csrf
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}" placeholder="Enter Email" required=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="email">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}" required=""/>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info"> Update</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-6">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-md-8 d-flex align-items-center">
                <h6 class="mb-0">Update password</h6>
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <ul class="list-group">
              <form id="passwordForm" name="passwordForm" method="POST" data-parsley-validate data-parsley-focus="first">
                  <div class="row ">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label" for="old_password">Old Password <span class="text-danger">*</span></label>
                              <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password" required=""/>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label" for="password">New Password <span class="text-danger">*</span></label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" required=""/>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password" required=""/>
                          </div>
                      </div>
                  </div>
                  <div class="row ">
                      <div class="col-md-12">
                          <button type="submit" class="btn btn-info" id="updateBtn"> <i class="icofont icofont-check"></i> Update</button>
                          <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
                      </div>
                  </div>
              </form>
          </ul>
          </div>
        </div>
      </div>
<section>
  <div class="row py-3">
    @include('frontend.user-dashboard.partials.messages')
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Orders placed</h6>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                        <div class="float-lg-end">
                            <a href="{{ route('orders.create') }}" class="btn btn-info float-right">Place a new order</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive p-0">
                    <table class="table table-flush dataTable-table" id="users_table">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl No</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type of Video</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number of Video</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Duration of Time</th>
                                <th width="20%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">First Delivery Charge</th>
                                <th width="20%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sub Total</th>
                                <th width="20%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Status</th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                              <td class="align-middle text-center text-sm"><p class="text-xs text-center font-weight-medium mb-0">{{ $loop->iteration }}</p></td>
                              <td class="align-middle text-center text-sm">
                                 @if ($item->video_type == 'basic')
                                      <p class="badge badge-sm text-xs bg-primary text-center font-weight-bold mb-0">{{ ucfirst($item->video_type ?? '') }}</p>
                                 @elseif ($item->video_type == 'pro-animation')
                                      <p class="badge badge-sm text-xs bg-success text-center font-weight-medium mb-0">{{ ucfirst($item->video_type) ?? '' }}</p>
                                 @elseif ($item->video_type == 'youtube')
                                      <p class="badge badge-sm text-xs bg-info text-center font-weight-medium mb-0">{{ ucfirst($item->video_type) ?? '' }}</p>
                                 @else
                                      <p class="badge badge-sm text-xs bg-warning text-center font-weight-medium mb-0">{{ ucfirst($item->video_type) ?? '' }}</p>
                                 @endif
                              </td>
                              <td class="align-middle text-center text-sm">
                                <p class="text-xs text-center font-weight-bold mb-0"><span class="badge badge-sm bg-info">{{ $item->number_of_videos }}</span></p>
                              </td>
                              <td class="align-middle text-center text-sm">
                                 @if ($item->first_video_duration)
                                      <span class="badge badge-sm bg-info">{{ $item->first_video_duration }} minutes</span>
                                 @endif
                                 @if ($item->second_video_duration)
                                      <span class="badge badge-sm bg-info">{{ $item->second_video_duration }} minutes</span>
                                 @endif
                                 @if ($item->third_video_duration)
                                      <span class="badge badge-sm bg-info">{{ $item->third_video_duration }} minutes</span>
                                 @endif
                              </td>
                              <td class="align-middle text-center text-sm">
                                  <span class="badge badge-sm bg-success">{{ $item->fast_delivery_charge ?? ''}}</span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $item->subtotal ?? ''}}</span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $item->total ?? ''}}</span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                 @if ($item->order_status == 'accepted')
                                      <span class="badge badge-sm bg-info text-xs font-weight-bold">{{ $item->order_status }}</span>
                                 @elseif ($item->order_status == 'pending')
                                      <span class="badge badge-sm bg-warning text-xs font-weight-bold">Pending</span>    
                                 @elseif ($item->order_status == 'delivered')
                                      <span class="badge badge-sm bg-info text-xs font-weight-bold">Delivered</span>    
                                 @elseif ($item->order_status == 'init')
                                      <span class="badge badge-sm bg-info text-xs font-weight-bold">Init</span>    
                                 @else
                                      <span class="badge badge-sm bg-danger text-xs font-weight-bold">Canceled</span>
                                 @endif
                              </td>   
                              <td class="align-middle text-center text-sm">
                                 @if ($item->payment_status == 'accepted')
                                      <span class="badge badge-sm bg-primary text-xs font-weight-bold">{{ $item->payment_status }}</span>
                                 @elseif ($item->payment_status == 'pending')
                                      <span class="badge badge-sm bg-warning text-xs font-weight-bold">Pending</span>   
                                 @else
                                      <span class="badge badge-sm bg-danger text-xs font-weight-bold">Rejected</span>
                                 @endif
                              </td>
                              <td>
                                  <a class="btn waves-effect waves-light btn-info btn-sm-custom ml-1 mb-0" title="View Order Details" href="{{ route('orders.show', $item->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
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
</section>
</div>

@endsection
    
@section('scripts')
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // update password
        $('#updateBtn').click(function (e) {
            e.preventDefault();
            let formData = {
                old_password: $('#passwordForm input[name="old_password"').val(),
                password: $('#passwordForm input[name="password"').val(),
                password_confirmation: $('#passwordForm input[name="password_confirmation"').val(),
            };
           
            $.ajax({
                data: formData,
                type: "POST",
                url: "{{ route('password_update') }}",
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if(response.success){
                       toastr.success(response.message); 
                    }else{
                        toastr.error(response.message); 
                    }
                    
                },
                error: function (error) {
                    $.each(error.responseJSON.errors, function(index, value){
                        toastr.error(value);
                    })
                }
            });
        });
        
    });
</script>
@endsection
