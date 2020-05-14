
        @include('frontlayout.front_header')
        @include('frontlayout.front_slider')

          @extends('layout')
                     
          @section('content')
          
          <?php

          $message=Session::get('shiping_id');
          if ($message) {
             $message;
            session::put('message',null);
        }

        ?>

                <h2 class="title text-center">Features Items</h2>
                          @foreach ($all_published_product as $v_published_product)
                      
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to( $v_published_product->product_image)}}" style="height: 200px; width: 200px;" alt="" />
                                            <h2>{{ $v_published_product->product_price }}Tk</h2>
                                            <p> {{ $v_published_product->product_name }}</p>
                                           
                            <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{ $v_published_product->product_price }} Tk</h2>
                                                <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}"><p>{{ $v_published_product->product_name }}</p></a>
                                                <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>{{ $v_published_product->manufacture_name }}</a></li>
                                        <li><a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}"><i class="fa fa-plus-square"></i>view product</a></li>
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
                                @foreach($all_published_product->chunk(3) as $chunk)
                                <div <?php if($count==1){?> class="item active" <?php }else{

                                    ?> class="item" <?php } ?>   >
                                    @foreach($chunk as $item) 

                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img style="width:200px;"  src="{{ $item->product_image }}" alt="" />
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