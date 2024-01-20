@extends('frontend.user-dashboard.master')

@section('title', 'Order Payment')
@section('styles')
<style>
    .error_border{
        border: 1px solid red;
    }
    #card-errors {
        color: red;
    }

    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border-radius: 0.5rem !important;
        border: 1px solid #d2d6da !important;
        box-shadow: none !important;
        transition: box-shadow 0.15s ease, border-color 0.15s ease;
        background-color: #fdfdff;
    }

    /* .StripeElement {
            background-color: white;
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        } */
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
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
                            <h6>Please make payment</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pt-0">
                    <hr class="horizontal dark mt-4 mb-4" />
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <form action="{{ route('orders.update',$order->id) }}" method="POST" id="payment-form">
                                @csrf
                                @method('PUT')
                                <h6 class="mb-3">Payment Details</h6>
                                <div class="card card-body border card-plain border-radius-lg">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="cardholder_name" id="cardholder_name" class="form-control @if($errors->has('cardholder_name')) error_border @endif" placeholder="Name on card" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="card-element"></div>
                                        </div>
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-between mt-4">
                                                <span class="mb-2 text-lg"></span>
                                                <input type="submit" class="btn btn-lg btn-info" id="submitButton" value="Make Payment">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-12 ms-auto">
                            <h6 class="mb-3">Order Summary</h6>
                            <div class="d-flex justify-content-between">
                                <span class="mb-2 text-sm">
                                    Subtotal:
                                </span>
                                <span class="text-dark font-weight-bold ms-2">${{ $order ? $order->subtotal : ''  }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="mb-2 text-sm">
                                    Fast Delivery:
                                </span>
                                <span class="text-dark ms-2 font-weight-bold">${{ $order ? $order->fast_delivery_charge : ''  }}</span>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <span class="mb-2 text-lg">
                                    Total:
                                </span>
                                <span class="text-dark text-lg ms-2 font-weight-bold">${{ $order ? $order->total : ''  }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#payment-form').show()

            var elements = stripe.elements();
            var style = {
                base: {
                    color: "#32325d",
                    lineHeight: "18px",
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: "antialiased",
                    fontSize: "16px",
                    "::placeholder": {
                        color: "#aab7c4"
                    }
                },
                invalid: {
                    color: "#dc3545",
                    iconColor: "#dc3545"
                }
            };


            const card = elements.create("card", {
                style: style,
                hidePostalCode: true
            });

            card.mount("#card-element");

            
            card.addEventListener("change", function (event) {
                var displayError = document.getElementById("card-errors");
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = "";
                }
            });

            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        stripeTokenHandler(result.token);
                    }
                });
            });
            // Send Stripe Token to Server
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                // Add Stripe Token to hidden input
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                // Submit form
                form.submit();
            }
            
        });
    </script>
@endsection