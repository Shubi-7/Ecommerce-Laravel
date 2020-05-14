 
<section id="slider"><!--slider-->
      <?php
      
      $all_published_slider=DB::table('tbl_slider')
       ->where('publication_status',1)
       ->get();
       ?>
       
     <div class="container" >
      <div class="row" > 
         <div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach( $all_published_slider as $v_slider )
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}">
                          
                        </li>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach( $all_published_slider as $v_slider)
                        <div class="item {{ $loop->first?'active':''}}" style="padding-left: 5px;">
                          <img src="{{ $v_slider->slider_image }}">
                        </div>
                    @endforeach
                </div>

                <!-- Controls -->
          
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">

                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
          <a class="right carousel-control col-md-offset-10" style="right: 0px;" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
            </a>
          

         </div>
   </div>
 </div>



  </section><!--/slider-->
