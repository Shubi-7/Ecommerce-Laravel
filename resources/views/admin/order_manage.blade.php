@extends('admin_layout')
@section('admin_content')


			
			<!-- start: Content -->
		
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Order Details</a></li>
			</ul>
			<p class="alert-success" style="padding-left: 350px;">
				<?php
				$message=Session::get('message');
				if ($message) {
					echo $message;
					session::put('message',null);
					//Session::Flush();
				}

				?>
			</p>
			   

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Orders</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order ID</th>
								  <th>Customer Name</th>
								  <th>Order Total</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead> 

                          
						 
						  <tbody>
						  		<tr>
								@foreach($all_order_info as $v_order)
								
								
								<td>{{ $v_order->order_id }}</td>
								<td class="center">{{ $v_order->customer_name }}</td>
								<td class="center">{{ $v_order->order_total }}</td>
								<td class="center">{{ $v_order->order_status }}</td>
								
						




								<td class="center">
									
									<a class="btn btn-danger" href="{{URL::to('/unactive/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>

								
									<!-- <a class="btn btn-success" href="{{URL::to('/active/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a> -->
								


									<a class="btn btn-info" href="{{URL::to('/view-order/'.$v_order->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete/'.$v_order->order_id)}}" id="delete">
										<i class="halflings-icon white trash" ></i> 
									</a>
								</td>

								 
							</tr>
								@endforeach
							
							  
						  	 

							                                  
							  </tbody>

							

						 </table>  
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>     
					</div>
				</div><!--/span-->
			</div><!--/row-->
			
			
	




@endsection