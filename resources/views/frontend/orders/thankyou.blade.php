@extends('frontend.user-dashboard.master')

@section('title', 'Order Confirm')
@section('styles')
<style>
   
</style>
@endsection
@section('user-content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card mb-4">
                <div class="card-body p-3 pt-0">
                    <hr class="horizontal dark mt-4 mb-4" />
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="card card-body border card-plain border-radius-lg">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center">Congratulations! Order has been placed successfully. You can track your order status here <a href="{{ route('orders.show', ($order ? $order->id : '')) }}">{{ $order ? $order->order_number : ''  }}</a></p>
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
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
        });
    </script>
@endsection