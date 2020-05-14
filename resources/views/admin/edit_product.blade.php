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


			<form class="form-horizontal" action="{{url('/update-product/'.$edit_product_info->product_id)}}" method="post" enctype="multipart/form-data">
                             
                                 {{ csrf_field() }}

						  <fieldset>
						
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>

							  <div class="controls">

								<input type="text" class="input-xlarge" name="product_name" value="{{$edit_product_info->product_name}}" required="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Category ID</label>

							  <div class="controls">

								<input type="text" class="input-xlarge" name="category_id" value="{{$edit_product_info->category_id}}" required="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Manufacture ID</label>

							  <div class="controls">

								<input type="text" class="input-xlarge" name="manufacture_id" value="{{$edit_product_info->manufacture_id}}" required="">
							  </div>
							</div>

							         
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Products short Description </label>
							  <div class="controls">
								<textarea type="" class="cleditor" name="product_short_description" rows="3" required="">{{$edit_product_info->product_short_description}}</textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Products long Description </label>
							  <div class="controls">
								<textarea type="" class="cleditor" name="product_short_description" rows="3" required="">{{$edit_product_info->product_long_description}}</textarea>
							  </div>
							</div>


							<div class="control-group">
								<label class="control-label" for="date01">Product Price</label>
								<div class="controls">
									<input type="text" class="input-xlarge" name="product_price" value="{{$edit_product_info->product_price}}" required="" >
								</div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" value="{{$edit_product_info->product_name}}" type="file" required="">
							  </div>
							</div>


							<div class="control-group">
								<label class="control-label" for="date01">Product size </label>
								<div class="controls">
									<input type="text" class="input-xlarge" name="product_size" value="{{$edit_product_info->product_size}}" required="" >
								</div>
							</div>


							<div class="control-group">
								<label class="control-label" for="date01">Product color </label>
								<div class="controls">
									<input type="text" class="input-xlarge" name="product_color" value="{{$edit_product_info->product_color}}" required="" >
								</div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="textarea2">Publication Status  </label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1" required="">
							  </div>
							</div>

							

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">update Product</button>
							 
							</div>
						  </fieldset>
						</form> 




					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection