@extends('web_view.masterWeb')
@section('content')
<main id="main">
   <!-- ======= Features Section ======= -->
    <!-- ======= Team Section ======= -->
    <section>
      <div class="container" data-aos="fade-up">
        <center><h2><?php echo $row->name ; ?></h2></center>
        <p><?php echo $row->des ; ?></p>
        <div class="section-title ">
         <center><span style="font-weight:bold;font-size: 30px;"></span></center>
        </div>
        <div class="row">
          <?php foreach($result as $result_value){?>
          <div class="col-lg-3 ">         
          <div class="pic"><a href=" {{URL::to('childMenuContentDetailsImage/'.$result_value->id.'/'.$result_value->child_menu_id)}}"><img src="{{URL::to($result_value->image)}}" style="height: 250px; width: 100%;"> </a>
          </div>
              <div>
                <a href=" {{URL::to('childMenuContentDetailsImage/'.$result_value->id.'/'.$result_value->child_menu_id)}}">
                <h5><center style="color: black;"><?php echo $result_value->title ;?></center></h5></a>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </section><!-- End Team Section -->
  </main><!-- End #main -->
  @endsection 