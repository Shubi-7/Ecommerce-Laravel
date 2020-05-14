           @include('frontlayout.front_header')
          @extends('layout')
          @section('content')
           <h2 class="title text-center">Features Items</h2>


                          @foreach ($category_by_product as $v_category_by_product)
                      
                          <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{URL::to( $v_category_by_product->product_image)}}" style="height: 200px; width: 200px;" alt="" />
                                        <h2>{{ $v_category_by_product->product_price }}Tk</h2>
                                        <p> {{ $v_category_by_product->product_name }}</p>

                                    <a href="{{url('/view_product/'.$v_category_by_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{ $v_category_by_product->product_price }} Tk</h2>

                                            <p>{{ $v_category_by_product->product_name }}</p>
                                            <a href="{{url('/view_product/'.$v_category_by_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="{{url('/view_product/'.$v_category_by_product->product_id)}}"><i class="fa fa-plus-square"></i>{{ $v_category_by_product->product_name }}</a></li>

                                        <li><a href="{{URL::to('/view_product/'.$v_category_by_product->product_id)}}"><i class="fa fa-plus-square"></i>view product</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                     @endforeach
                     
                 
                        
                    </div><!--features_items-->
                    

                  
                    
                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $count=1;?>
                                @foreach($category_by_product->chunk(3) as $chunk)
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