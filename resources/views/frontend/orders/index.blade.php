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
    <div class="row">
        @include('frontend.user-dashboard.partials.messages')
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Order List</h6>
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
                                                <p class="badge badge-sm text-xs bg-success text-center font-weight-bold mb-0">{{ ucfirst($item->video_type) ?? '' }}</p>
                                           @elseif ($item->video_type == 'youtube')
                                                <p class="badge badge-sm bg-info text-xs bg-info text-center font-weight-bold mb-0">{{ ucfirst($item->video_type) ?? '' }}</p>
                                           @else
                                                <p class="badge badge-sm bg-warning text-xs bg-warning text-center font-weight-bold mb-0">{{ ucfirst($item->video_type) ?? '' }}</p>
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
                                            <span class="badge badge-sm text-xs bg-success">{{ $item->fast_delivery_charge ?? ''}}</span>
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
@endsection
    
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            // alert('ok');
            $('#users_table').DataTable({
                aLengthMenu: [[10,25, 50, 100, 1000, -1], [10,25, 50, 100, 1000, "All"]],
                "columnDefs": [
                    {
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

            $('.verifyUser').on('click',function(){
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
                        $("#verifyForm"+id).submit();
                    }
                })
            });

            $('.unverifyUser').on('click',function(){
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
                        $("#unverifyForm"+id).submit();
                    }
                })
            });

            $('.deleteItem').on('click',function(){
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
                        $("#deleteForm"+id).submit();
                    }
                })
            });
        });
    </script>
@endsection
