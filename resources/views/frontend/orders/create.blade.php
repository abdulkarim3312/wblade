@extends('frontend.user-dashboard.master')

@section('title', 'Place Order')
@section('styles')
    <style>
        .error_border {
            border: 1px solid red;
        }
    </style>
@endsection
@section('user-content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card mb-4">
                <div class="card-header p-3 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Place Order</h6>
                            {{-- <p class="text-sm mb-0">Order no. <b>241342</b> from <b>23.02.2021</b></p>
                            <p class="text-sm">Code: <b>KF332</b></p> --}}
                        </div>
                        <a href="{{ route('orders.index') }}" class="btn btn-info text-white ms-auto mb-0">My orders</a>
                    </div>
                </div>
                <div class="card-body p-3 pt-0">
                    {{-- <hr class="horizontal dark mt-0 mb-4" /> --}}
                    {{-- <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="d-flex">
                                <div>
                                    <img
                                        src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1400&amp;q=80"
                                        class="avatar avatar-xxl me-3"
                                        alt="product image"
                                    />
                                </div>
                                <div>
                                    <h6 class="text-lg mb-0 mt-2">Gold Glasses</h6>
                                    <p class="text-sm mb-3">Order was delivered 2 days ago.</p>
                                    <span class="badge badge-sm bg-gradient-success">Delivered</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-auto text-end">
                            <a href="javascript:;" class="btn bg-gradient-info mb-0">Contact Us</a>
                            <p class="text-sm mt-2 mb-0">Do you like the product? Leave us a review <a href="javascript:;">here</a>.</p>
                        </div>
                    </div> --}}
                    {{-- action="{{ route('orders.store') }}"  --}}
                    <hr class="horizontal dark mt-4 mb-4" />
                    <form action="{{ route('orders.store') }}" method="POST" id="submissionForm">
                        @csrf
                        <div class="row">
                            {{-- <div class="col-lg-3 col-md-6 col-12">
                                <h6 class="mb-3">Track order</h6>
                                <div class="timeline timeline-one-side">
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="ni ni-bell-55 text-secondary"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Order received</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 AM</p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="ni ni-html5 text-secondary"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Generate order id #1832412</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:21 AM</p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="ni ni-cart text-secondary"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Order transmited to courier</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 8:10 AM</p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="ni ni-check-bold text-success text-gradient"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Order delivered</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 4:54 PM</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-8 col-md-8 col-12">
                                <h6 class="mb-3">Order Details</h6>
                                <div class="card card-body border card-plain border-radius-lg">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Types of video <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input video_type" type="radio" name="video_type"
                                                    id="basic" value="{{ old('video_type') ?? 'basic' }}" checked>
                                                <label class="form-check-label" for="basic">Basic</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input video_type" type="radio" name="video_type"
                                                    id="proAnimation" value="{{ old('video_type') ?? 'pro-animation' }}">
                                                <label class="form-check-label" for="proAnimation">Pro animations</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input video_type" type="radio" name="video_type"
                                                    id="youtube" value="{{ old('video_type') ?? 'youtube' }}">
                                                <label class="form-check-label" for="youtube">Youtube</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input video_type" type="radio" name="video_type"
                                                    id="corporate" value="{{ old('video_type') ?? 'corporate' }}">
                                                <label class="form-check-label" for="corporate">Corporate</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Number of videos<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input number_of_videos" type="radio"
                                                    name="number_of_videos" id="singleVideo"
                                                    value="{{ old('video_type') ?? 1 }}" checked>
                                                <label class="form-check-label" for="singleVideo">One</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input number_of_videos" type="radio"
                                                    name="number_of_videos" id="doubleVideos"
                                                    value="{{ old('video_type') ?? 2 }}">
                                                <label class="form-check-label" for="doubleVideos">Two</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input number_of_videos" type="radio"
                                                    name="number_of_videos" id="tripleVideos"
                                                    value="{{ old('video_type') ?? 3 }}">
                                                <label class="form-check-label" for="tripleVideos">Three</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Duration of videos (In minutes) <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="first_video_duration" id="first_video_duration"
                                                    class="form-control @error('first_video_duration') error_border @enderror"
                                                    value="{{ old('first_video_duration') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 d-none" id="second_video_time">
                                            <div class="form-group">
                                                <input type="text" name="second_video_duration"
                                                    id="second_video_duration"
                                                    class="form-control @error('second_video_duration') error_border @enderror"
                                                    value="{{ old('second_video_duration') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 d-none" id="third_video_time">
                                            <div class="form-group">
                                                <input type="text" name="third_video_duration"
                                                    id="third_video_duration"
                                                    class="form-control @error('third_video_duration') error_border @enderror"
                                                    value="{{ old('third_video_duration') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <label for="requirements" class="form-label">Requirements<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea class="form-control @error('third_video_duration') requirements @enderror" name="requirements"
                                                    id="requirements" cols="30" rows="5">{{ old('requirements') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <label for="raw_data_link" class="form-label">Raw data link</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea class="form-control" name="raw_data_link" id="raw_data_link" cols="30" rows="3">{{ old('raw_data_link') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <label for="no_data" class="form-label">No data</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="no_data"
                                                    id="no_data">
                                                <label class="custom-control-label" for="no_data">
                                                    We only provide video editing services, we can't shoot for you. Only
                                                    stock footage is available. Choose this if you have no data
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12 ms-auto">
                                <h6 class="mb-3">Order Summary</h6>
                                <div class="row mt-5 mb-5">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="fast_delivery"
                                                id="fast_delivery">
                                            <label class="custom-control-label" for="fast_delivery">
                                                For fast delivery (It will add additional charge)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-sm">
                                        Subtotal:
                                    </span>
                                    <span class="text-dark font-weight-bold ms-2">$<span id="subTotal">0.00</span></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-sm">
                                        Fast Delivery:
                                    </span>
                                    <span class="text-dark ms-2 font-weight-bold">$<span
                                            id="fastDeliveryCost">0.00</span></span>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <span class="mb-2 text-lg">
                                        Total:
                                    </span>
                                    <span class="text-dark text-lg ms-2 font-weight-bold">$<span
                                            id="totalCost">0.00</span></span>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <span class="mb-2 text-lg"></span>
                                    <input type="button" class="btn btn-lg btn-info" id="submitButton"
                                        value="Place Order">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var pricing = @json($pricing);
            var basic_video_per_minute_price = 0;
            var pro_animation_video_per_minute_price = 0;
            var youtube_video_per_minute_price = 0;
            var corporate_video_per_minute_price = 0;
            var fast_delivery_price = 0;
            if (pricing != 'undefined') {
                basic_video_per_minute_price = pricing.basic_video_per_minute_price
                pro_animation_video_per_minute_price = pricing.pro_animation_video_per_minute_price
                youtube_video_per_minute_price = pricing.youtube_video_per_minute_price
                corporate_video_per_minute_price = pricing.corporate_video_per_minute_price
                fast_delivery_price = pricing.fast_delivery_price
            }
            var video_type = $('input[name="video_type"]').val();
            var number_of_videos = $('input[name="number_of_videos"]').val();
            var first_video_duration = $('input[name="first_video_duration"]').val();
            var second_video_duration = $('input[name="second_video_duration"]').val();
            var third_video_duration = $('input[name="third_video_duration"]').val();
            var fast_delivery = $('input[name="fast_delivery"]').is(":checked");

            var firstVideoTotal = 0;
            var secondVideoTotal = 0;
            var thirdVideoTotal = 0;

            $('.video_type').on('change', function() {
                video_type = $(this).val()
                if (number_of_videos == 1) {
                    firstVideoTotal = calculateSubTotal($(this).val(), first_video_duration)
                }
                if (number_of_videos == 2) {
                    firstVideoTotal = calculateSubTotal($(this).val(), first_video_duration)
                    secondVideoTotal = calculateSubTotal($(this).val(), second_video_duration)
                }
                if (number_of_videos == 3) {
                    firstVideoTotal = calculateSubTotal($(this).val(), first_video_duration)
                    secondVideoTotal = calculateSubTotal($(this).val(), second_video_duration)
                    thirdVideoTotal = calculateSubTotal($(this).val(), third_video_duration)
                }
                calculateTotal()
            })


            $('.number_of_videos').on('change', function() {
                let selectedValue = $(this).val();
                if (selectedValue == 1) {
                    $('input[name="second_video_duration"]').val('');
                    $('input[name="third_video_duration"]').val('');
                    $('#second_video_time').addClass('d-none')
                    $('#third_video_time').addClass('d-none')
                    secondVideoTotal = 0
                    thirdVideoTotal = 0
                }
                if (selectedValue == 2) {
                    $('input[name="third_video_duration"]').val('');
                    $('#second_video_time').removeClass('d-none')
                    $('#third_video_time').addClass('d-none')
                    thirdVideoTotal = 0
                }
                if (selectedValue == 3) {
                    $('#second_video_time').removeClass('d-none')
                    $('#third_video_time').removeClass('d-none')
                }
                calculateTotal()
            });

            // $('.number_of_videos').on('change', function() {
            //     number_of_videos = $(this).val()
            //     if($(this).val() == 1){
            //         secondVideoTotal = 0
            //         thirdVideoTotal = 0
            //     }
            //     if($(this).val() == 2){
            //         thirdVideoTotal = 0
            //     }
            //     calculateTotal()
            // })

            $('input[name="first_video_duration"]').on('keyup', function(event) {
                first_video_duration = $(this).val()
                firstVideoTotal = calculateSubTotal(video_type, $(this).val())
                calculateTotal()
            });
            $('input[name="second_video_duration"]').on('keyup', function(event) {
                second_video_duration = $(this).val()
                secondVideoTotal = calculateSubTotal(video_type, $(this).val())
                calculateTotal()
            });
            $('input[name="third_video_duration"]').on('keyup', function(event) {
                third_video_duration = $(this).val()
                thirdVideoTotal = calculateSubTotal(video_type, $(this).val())
                calculateTotal()
            });

            function calculateSubTotal(videoType, fieldValue) {
                if (videoType == 'basic') {
                    return basic_video_per_minute_price * fieldValue
                }
                if (videoType == 'pro-animation') {
                    return pro_animation_video_per_minute_price * fieldValue
                }
                if (videoType == 'youtube') {
                    return youtube_video_per_minute_price * fieldValue
                }
                if (videoType == 'corporate') {
                    return corporate_video_per_minute_price * fieldValue
                }

            }
            $('#fast_delivery').on('change', function() {
                fast_delivery = $(this).prop('checked');
                calculateTotal()
            });

            function calculateTotal() {
                var subtotal = Number(firstVideoTotal) + Number(secondVideoTotal) + Number(thirdVideoTotal)
                var delivery_price = fast_delivery_price
                $('#subTotal').text(subtotal.toFixed(2))
                if (fast_delivery) {
                    $('#fastDeliveryCost').text(fast_delivery_price)
                } else {
                    $('#fastDeliveryCost').text('0.00')
                    delivery_price = '0.00'
                }
                var total = Number(subtotal) + Number(delivery_price)
                $('#totalCost').text(total.toFixed(2))
            }

            $('#submitButton').on('click', function(e) {
                e.preventDefault();
                var formData = $('#submissionForm').serialize();
                if ($('#no_data').prop('checked')) {
                    formData += '&no_data=1'
                } else {
                    formData += '&no_data=0';
                }
                if ($('#fast_delivery').prop('checked')) {
                    formData += '&fast_delivery=1'
                } else {
                    formData += '&fast_delivery=0';
                }
                // var form = this;
                $.ajax({
                    type: 'POST',
                    url: '/validate-form',
                    data: formData,
                    success: function(response) {
                        //$('.error-message').remove();
                        // form.reset();
                        if (response.success) {
                            const circles = document.querySelectorAll(".error_border");
                            circles.forEach((circle, index) => {
                                circle.classList.remove("error_border");
                            });
                            $('#submissionForm').submit();
                        }

                        // $('#submissionForm').attr('action', '{{ route('orders.store') }}').submit();
                        // toastr.success('Your request has been sent successfully!'); 
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            displayErrors(errors);
                        }
                    }
                });
            });

            function displayErrors(errors) {
                // Clear previous error messages
                // $('.error-message').remove();

                // Display new error messages
                $.each(errors, function(key, value) {
                    $('#' + key).addClass('error_border');
                    //  $('#' + key).after('<span class="error-message">' + value[0] + '</span>');
                });
            }
        });
    </script>
@endsection
