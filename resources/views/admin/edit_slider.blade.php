@extends('admin_layout')
@section('admin_content')


 <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Product</a>
				</li>

			</ul>

		
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
					
					</div>
					<p class="alert-success" style="padding-left: 100px;">
						
				
						<?php
						$message=Session::get('message');
						if ($message) {
							echo $message;
							//session::put('message',null);
							Session::Flush();
						}

						?>
					</p>
					<div class="box-content">


						<form class="form-horizontal" action="{{url('/update-slider',$edit_slider_info->slider_id)}}" method="post" enctype="multipart/form-data">
                             
                                 {{ csrf_field() }}

						  <fieldset>
						


							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="slider_image" value="{{$edit_slider_info->slider_image}}" type="file" required="">
							  </div>
							</div>


							

							

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">save</button>
							 
							</div>
						  </fieldset>
						</form> 




					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection