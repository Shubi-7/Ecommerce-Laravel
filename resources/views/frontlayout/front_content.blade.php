 <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                <?php
                                    $all_published_category=DB::table('tbl_category')
                                    ->where('publication_status',1)
                                    ->get();

                               
                                foreach ($all_published_category as $v_category) { ?>
                                  
                              
                                 <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="{{URL::to('product_by_category/'.$v_category->category_id)}}">{{$v_category->category_name}}</a></h4>
                                    </div>
                                </div>


                                     <?php }?>                                                        
                          
                        </div><!--/category-products-->
                        </div>
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">

                            
                                
                                <ul class="nav nav-pills nav-stacked">
                                   <?php
                                   $all_published_fanufacture=DB::table('tbl_manufactue')
                                   ->where('publication_status',1)
                                   ->get();


                                   foreach ($all_published_fanufacture as $v_manufacture) { ?>
                                    <li><a href="#"> <span class="pull-right">(50)</span>{{$v_manufacture->manufacture_name}}</a></li>
                                <?php }?>
                            </ul>
                                    


                            </div>
                        </div><!--/brands_products-->
                        
                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->



                      @yield('content')



                  </div>
            </div>
        </div>
    </div>
    </section>