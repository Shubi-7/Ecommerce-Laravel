@include('frontlayout.front_header')
   @extends('layout')
   @section('content')
<section id="cart_items">
		<div class="container">
	

			<div class="register-req">
				<p>Please Fillup this Form</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
				
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Shiping Details</p>
							<div class="form-one">
								<form action="{{url('/save_shiping_details')}}" method="post">
								          {{ csrf_field() }}								
									<input type="text" name="shiping_email" placeholder="Email*">							
									<input type="text" name="shiping_first_name" placeholder="First Name *">
									<input type="text" name="shiping_last_name" placeholder="Last Name *">
									<input type="text" name="shiping_address" placeholder="Address *">
									<input type="text" name="shiping_mobile_number" placeholder="Mobile Number *">
									<input type="text" name="shiping_city" placeholder="City *">
									<input type="submit" class="btn btn-sm btn-default" value="Done" placeholder="City *">
								</form>
							</div>
						
						</div>
					</div>
									
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			
		
		
		</div>
	</section> <!--/#cart_items-->

	@endsection