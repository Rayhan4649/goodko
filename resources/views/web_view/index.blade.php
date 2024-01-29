@extends('web_view.masterWeb')
@section('content')

<!-- ======= Bannar Section ======= -->
    <section>
      <div class="container"  style="padding-top: 0px;">
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <?php
            if($bannar_count > 0){?> 
            <?php foreach($bannar as $bannars){?>
            <div class="swiper-slide">
              <div >                
               <img src="<?php echo $bannars->image ; ?>" style="height: auto; width: 100%;">
              </div>
            </div>
            <?php }?> 
            <?php }?> 
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    
<!-- End Testimonials Section -->
<main id="main">
    <!-- ======= Team Section ======= -->
    <section>
      <div class="container" data-aos="fade-up">
        <div class="section-title ">
         <center><span style="font-weight:bold;font-size: 30px;">Our Products</span></center>
        </div>
        <div class="row">
     
<br>
 <?php  $sub_link = DB::table('link_sub_menu_content_image')->where('status',0)->get(); 
 foreach($sub_link as $result_value){?>

          <div class="col-lg-3">         
          <div class="pic"><a href=" {{URL::to('subMenuLinkDetailsImage/'.$result_value->id.'/'.$result_value->main_menu_id.'/'.$result_value->main_title_id)}}"><img src="{{URL::to($result_value->image)}}" style="height: auto; width: 100%;"> </a>
          </div>
              <div>
                <a href=" {{URL::to('subMenuLinkDetailsImage/'.$result_value->id.'/'.$result_value->main_menu_id.'/'.$result_value->main_title_id)}}"><br>
                <h5><center style="color: black;"><?php echo $result_value->title ;?></center></h5>
                </a>
            </div>
          </div>
  <?php } ?>

        </div>
      </div>
    </section><!-- End Team Section -->
   
  </main><!-- End #main -->

  @endsection











  