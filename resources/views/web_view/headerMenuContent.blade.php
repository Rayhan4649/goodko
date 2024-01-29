@extends('web_view.masterWeb')
@section('content')
<?php if($row->heder_menu_id == '1'):?>
<!-- ======= Bannar Section ======= -->
    <section>
      <div class="container" data-aos="zoom-in" style="padding-top: 0px;">
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            
            <?php
            if($bannar_count > 0){?> 
            <?php foreach($bannar as $bannars){?>
            <div class="swiper-slide">
              <div class="testimonial-item">                
               <img src="{{URL::to($bannars->image)}}" style="height: auto; width:100%;">
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
   <!-- ======= Features Section ======= -->
    <!-- ======= Team Section ======= -->
    <section>
      <div class="container" data-aos="fade-up">
        <center><h2><?php echo $row->name ; ?></h2></center>
        <p><?php echo $row->des ; ?></p>
        <div class="section-title ">
        
        </div>
        <div class="row">
          <?php foreach($result as $result_value){?>
          <div class="col-lg-3 ">         
          <div class="pic"><a href=" {{URL::to('headerMenuContentDetailsImage/'.$result_value->id.'/'.$result_value->heder_menu_id)}}"><img src="{{URL::to($result_value->image)}}" style="height: 250px; width: 100%;"></a>
          </div>
              <div>
                <a href=" {{URL::to('headerMenuContentDetailsImage/'.$result_value->id.'/'.$result_value->heder_menu_id)}}">
                <h5><center style="color: black;"><?php echo $result_value->title ;?></center></h5></a>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </section><!-- End Team Section -->  
  </main><!-- End #main -->
   <?php else: ?>
    <main id="main">
   <!-- ======= Features Section ======= -->
    <!-- ======= Team Section ======= -->
    <section>
      <div class="container" data-aos="fade-up">
        <center><h2><?php echo $row->name ; ?></h2></center>
        <p><?php echo $row->des ; ?></p>
        
        <div class="row">
          <?php foreach($result as $result_value){?>
          <div class="col-lg-3 ">         
          <div class="pic"><a href=" {{URL::to('headerMenuContentDetailsImage/'.$result_value->id.'/'.$result_value->heder_menu_id)}}"><img src="{{URL::to($result_value->image)}}" style="height: 250px; width: 100%;"></a>
          </div>
              <div>
                <a href=" {{URL::to('headerMenuContentDetailsImage/'.$result_value->id.'/'.$result_value->heder_menu_id)}}">
                <h5><center style="color: black;"><?php echo $result_value->title ;?></center></h5></a>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </section><!-- End Team Section -->  
  </main><!-- End #main -->
 <?php endif; ?>
  @endsection