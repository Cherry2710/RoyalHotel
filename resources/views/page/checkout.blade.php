@extends('master')
@section('content')
<head>
<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

<!-- Bootstrap core CSS -->
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>
<!-- Custom styles for this template -->
<link href="form-validation.css" rel="stylesheet">
</head>
<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Checkout</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Checkout</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================--> 
    
  
  <body class="bg-light">
    <div class="container">
   <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your booking room</span>
        <span class="badge badge-secondary badge-pill">1</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
          
            <h6 class="my-0">Hotel: <b>{{$detail['hotelname']}}</b></h6>
            <h6 class="my-0">Type room: <b>{{$detail['typename']}}</b></h6>
            <h6 class="my-0">Price: <b>${{$detail['price']}}/night</b></h6>
            <h6 class="my-0">Arrival date: <b>{{$detail['arrival']}}</b></h6>
            <h6 class="my-0">Duration: <b>{{$detail['duration']}}</b></h6>
            <h6 class="my-0">Number of rooms: <b>{{$detail['quantity']}}</b></h6>
            
         
         
        </li>
       
       
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD):</span>
          <strong>{{$detail['total']}}
          </strong>
        </li>
      </ul>

     
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form action="{{ route('book') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Number phone</label>
          <div class="input-group">
            <input type="text" class="form-control" name="numberphone" id="numberphone" placeholder="NumberPhone" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your number phone is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email</label>
          <div class="input-group">
          <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address .
          </div>
        </div>
      </div>

        


       
        <hr class="mb-4">
        <!-- <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
                  I make a reservation for someone else
          </label>
        </div> -->
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <!-- <div class="custom-control custom-radio">
          <input id="paypal" name ="payment_method" type="radio" class = "custom-control-input" checked value ="local">
          <label class = "custom-control-label" for ="paypal" > Payment at out company></label>
          <br>
          <input id="vnPay" name ="payment_method" type="radio" class = "custom-control-input" value ="vnPay">
          <label class = "custom-control-label" for ="vnPay" > VnPay</label>
</div> -->




        <div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Direct Bank Transfer </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
										</div>						
									</li>

									
									
									<li class="payment_method_paypal">
										<input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="vnpay" data-order_button_text="Proceed to VnPay">
										<label for="payment_method_vnpay">VnPay</label>
										<div class="payment_box payment_method_vnpay" style="display: none;">
											Pay via VnPay; you can pay with your credit card if you don’t have a VnPay account
										</div>						
									</li>
								</ul>
							</div>
          
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
      </form>
    </div>
  </div>
<hr>
 </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="https://getbootstrap.com/docs/4.3/examples/checkout/form-validation.js"></script></body>
</html>

@endsection