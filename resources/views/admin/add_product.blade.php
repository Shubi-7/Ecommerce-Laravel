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


						<form class="form-horizontal" action="{{url('/save-product')}}" method="post" enctype="multipart/form-data">
                             
                                 {{ csrf_field() }}

						  <fieldset>
						
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>

							  <div class="controls">

								<input type="text" class="input-xlarge" name="product_name" required="">
							  </div>
							</div>





							<div class="control-group">
								<label class="control-label"  for="selectError3">Product category</label>
								<div class="controls">
									<select id="selectError3" name="category_id" required="">
										<option value="">select category</option>

										<?php
										$all_published_category=DB::table('tbl_category')
										->where('publication_status',1)
										->get();


										foreach ($all_published_category as $v_category) { ?>
										<option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
										<?php }?>
										
									
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label"  for="selectError3">manufacture Name</label>
								<div class="controls">
									<select id="selectError3" name="manufacture_id" required="">
										<option value="">select manufacture</option>
										
										<?php
										$all_published_fanufacture=DB::table('tbl_manufactue')
										->where('publication_status',1)
										->get();


										foreach ($all_published_fanufacture as $v_manufacture) { ?>
											<option value="{{$v_manufacture->manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>
										<?php }?>
										
									</select>
								</div>
							</div>





							         
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Products short Description </label>
							  <div class="controls">
								<textarea type="" class="cleditor" name="product_short_description" rows="3" required=""></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Products long Description </label>
							  <div class="controls">
								<textarea type="" class="cleditor" name="product_long_description" rows="3" required="" ></textarea>
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="date01">Product Price</label>
								<div class="controls">
									<input type="text" class="input-xlarge" name="product_price" required="" >
								</div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image"  type="file" required="">
							  </div>
							</div>


							<div class="control-group">
								<label class="control-label" for="date01">Product size </label>
								<div class="controls">
									<input type="text" class="input-xlarge" name="product_size" required="" >
								</div>
							</div>


							<div class="control-group">
								<label class="control-label" for="date01">Product color </label>
								<div class="controls">
									<input type="text" class="input-xlarge" name="product_color" required="" >
								</div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status  </label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1" required="">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							 
							</div>
						  </fieldset>
						</form> 




					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection