@extends('frontend.user-dashboard.master')
@section('title')
    @include('frontend.orders.partials.title')
@endsection
@section('styles')
    <style>
        .btn-sm-custom {
            padding: 5px 5px;
            line-height: 16px;
            font-size: 16px;
        }

        .btn-sm-custom i {
            margin-right: 0px !important;
        }

        .social-widget-card-custom {
            cursor: pointer;
        }

        #users_table_filter {
            text-align: right;
        }
    </style>
@endsection
@section('user-content')
    <div class="row py-3">
        <div class="col-lg-10 mx-auto">
            <div class="card mb-4">
                <div class="card-header p-3 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Order Details</h6>
                            <p class="text-sm mb-0">
                                Order no. <b class="text-info">{{ $order->order_number }}</b>
                            </p>
                        </div>
                        <a href="{{ route('orders.index') }}" class="btn btn-info text-white ms-auto mb-0">My orders</a>
                    </div>
                </div>
                <div class="card-body p-3 pt-0">
                    <hr class="horizontal dark mt-0 mb-4">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="d-flex">
                                <div>
                                    @if ($order->video_type == 'basic')
                                        <h6 class="badge badge-sm text-xs bg-primary text-lg mb-2 mt-2">{{ ucfirst($order->video_type) }} video </h6>
                                    @elseif ($order->video_type == 'pro-animation')
                                        <h6 class="badge badge-sm text-xs bg-success text-lg mb-2 mt-2">{{ ucfirst($order->video_type) }} video </h6>  
                                    @elseif ($order->video_type == 'youtube')  
                                        <h6 class="badge badge-sm text-xs bg-info text-lg mb-2 mt-2">{{ ucfirst($order->video_type) }} video </h6>
                                    @else  
                                        <h6 class="badge badge-sm text-xs bg-warning text-lg mb-2 mt-2">{{ ucfirst($order->video_type) }} video </h6>
                                    @endif
                                    
                                    <p class="text-sm mb-1"><b>Number of videos : </b><span class="badge badge-sm bg-info">{{ $order->number_of_videos }}</span></p>
                                    <p class="text-sm mb-1"><b>Duration of videos : </b>
                                        @if($order->first_video_duration)
                                            <span class="badge badge-sm bg-info">{{ $order->first_video_duration }} minutes</span>
                                        @endif
                                        @if($order->second_video_duration)
                                            <span class="badge badge-sm bg-info">{{ $order->second_video_duration }} minutes</span>
                                        @endif
                                        @if($order->third_video_duration)
                                            <span class="badge badge-sm bg-info">{{ $order->third_video_duration }} minutes</span>
                                        @endif
                                    </p>
                                    <p class="text-sm mb-1"><b>No data : </b>
                                        @if($order->no_data == 1)
                                            <span class="badge badge-sm bg-gradient-success">Yes</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-danger">No</span>
                                        @endif
                                    </p>
                                    <p class="text-sm mb-1"><b> Fast delivery : </b>
                                        @if($order->fast_delivery == 1)
                                            <span class="badge badge-sm bg-gradient-success">Yes</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-danger">No</span>
                                        @endif
                                    </p>
                                    <p class="text-sm mb-1"><b> Order status : </b>
                                        <span class="badge badge-sm bg-info">{{ $order->order_status }}</span>
                                    </p>
                                    <p class="text-sm mb-1"><b> Payment status : </b>
                                        <span class="badge badge-sm bg-primary">{{ $order->payment_status }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h6 class="text-lg mb-0 mt-2">Requirements</h6>
                            <p class="text-sm mb-1">{{ $order->requirements }}</p>
                            <h6 class="text-lg mb-0 mt-3">Raw data link</h6>
                            <p class="text-sm mb-1">{{ $order->raw_data_link }}</p>
                        </div>
                    </div>
                    <hr class="horizontal dark mt-4 mb-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <h6 class="mb-3">Track order</h6>
                            <div class="timeline timeline-one-side">
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="ni ni-bell-55 text-primary"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Order created</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                            {{ $order->order_init_at->format('d M g:i A') }}</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="ni ni-credit-card text-info"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Payment added</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                            {{ $order->order_accepted_at->format('d M g:i A') }}</p>
                                    </div>
                                </div>
                                @if ($order->order_status == 'canceled')
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="fa fa-trash text-danger"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Order cancelled</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                {{ $order->order_canceled_at ? $order->order_canceled_at->format('d M g:i A') : '' }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if ($order->order_status == 'delivered')
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="ni ni-check-bold text-success text-gradient"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Order delivered</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                {{ $order->order_delivered_at ? $order->order_delivered_at->format('d M g:i A') : '' }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12 mb-3">
                            <h6 class="mb-3">Payment details</h6>
                            @if($order->order_details)
                                <div class="card card-body border card-plain border-radius-lg">
                                    <p class="mb-1 text-sm"><b>Cardholder name: </b>{{ $order->order_details->card_holder_name }}</p>    
                                    <p class="mb-1 text-sm"><b>Card number: </b>****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;{{ $order->order_details->card_number }}</p>    
                                    <p class="mb-1 text-sm"><b>Card expiray date: </b>{{ $order->order_details->card_expiry_month }} / {{ $order->order_details->card_expiry_year }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-3 col-12 ms-auto">
                            <h6 class="mb-3">Order Summary</h6>
                            <div class="d-flex justify-content-between">
                                <span class="mb-2 text-sm">
                                    Subtotal
                                </span>
                                <span class="text-dark font-weight-bold ms-2">${{ $order->subtotal }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="mb-2 text-sm">
                                    Fast Delivery:
                                </span>
                                <span class="text-dark ms-2 font-weight-bold">${{ $order->fast_delivery_charge }}</span>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <span class="mb-2 text-lg">
                                    Total:
                                </span>
                                <span class="text-dark text-lg ms-2 font-weight-bold">${{ $order->total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            // alert('ok');
            $('#users_table').DataTable({
                aLengthMenu: [
                    [10, 25, 50, 100, 1000, -1],
                    [10, 25, 50, 100, 1000, "All"]
                ],
                "columnDefs": [{
                        "targets": 0,
                        "className": "text-center",
                    },
                    {
                        'bSortable': false,
                        'bSearchable': false,
                        "className": "text-center",
                        'aTargets': [-1]
                    }
                ]
            });

            $('.verifyUser').on('click', function() {
                let id = $(this).data('id')
                swal.fire({
                    title: "Are you sure?",
                    text: "User will be verified!",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3fc3ee",
                    confirmButtonText: "Yes, verify it!"
                }).then((result) => {
                    if (result.value) {
                        $("#verifyForm" + id).submit();
                    }
                })
            });

            $('.unverifyUser').on('click', function() {
                let id = $(this).data('id')
                swal.fire({
                    title: "Are you sure?",
                    text: "User will be unverified!",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3fc3ee",
                    confirmButtonText: "Yes, unverify it!"
                }).then((result) => {
                    if (result.value) {
                        $("#unverifyForm" + id).submit();
                    }
                })
            });

            $('.deleteItem').on('click', function() {
                let id = $(this).data('id')
                swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.value) {
                        $("#deleteForm" + id).submit();
                    }
                })
            });
        });
    </script>
@endsection
