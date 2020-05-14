@include('frontlayout.front_header')
  @extends('layout')
  @section('content')						
					
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to($product_by_details->product_image)}}" alt="" />
								<h3>ZOOM</h3>
							</div>
						

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="{{URL::to('frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
								<h2>{{$product_by_details->product_name}}</h2>
								<p>color:{{$product_by_details->product_color}}</p>
								<img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
								<span>
									<span>{{$product_by_details->product_price}}Tk</span>
									<form action="{{url('/add-to-cart')}}" method="post">
										{{ csrf_field() }}
									<label>Quantity:</label>
									<input name="qty" type="text" value="1" />
									<input type="hidden" name="product_id" value="{{$product_by_details->product_id}}">
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>

									</form>
								</span>

								<p><b>Availability:</b>In Stock </p>
								<p><b>condition:</b>New</p>


								<p><b>brand:</b> {{$product_by_details->manufacture_name}}</p>
								<p><b>category:</b> {{$product_by_details->category_name}}</p>
								<p><b>size:</b> {{$product_by_details->product_size}}</p>
							
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					  <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                            

                                <?php $count=1;?>
                                @foreach($product_by_details_releted_post->chunk(3) as $chunk)
                                <div <?php if($count==1){?> class="item active" <?php }else{

                                    ?> class="item" <?php } ?>   >
                                    @foreach($chunk as $item) 

                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img style="width:200px;"  src="{{ url('/'.$item->product_image) }}" alt="" />
                                                    <h2>INR {{$item->product_price}}</h2>
                                                    <p>{{$item->product_name}}</p>
                                                    <a href="{{ url('view_product/'.$item->product_id) }}"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                                <?php  $count++; ?>
                                @endforeach 

                                 
                            </div>
                             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>           
                        </div>
                    </div><!--/recommended_items-->
					
 @endsection