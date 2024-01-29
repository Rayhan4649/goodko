@extends('web_view.masterWeb')
@section('content')


    <main id="main">
         
     <?php  $sub_link = DB::table('link_sub_menu_content_image')->where('main_title_id',$result->id)->where('main_menu_id',$result->main_menu_id)->where('status',0)->get(); {?>

        <?php if(count($sub_link) == "0"):?>
         <section>
              <div class="container" data-aos="fade-up">
        <div class="col-lg-2"style= "float: left;" > 
          <div class="col-md-11"style="text-align: left;padding-left: 5px;">
            <div style="padding-bottom: 10px;">                
            </div>                   
          </div> 
        </div>
       <div class="col-lg-3"style= "float: left;padding-bottom: 20px;" > 
          <img src="{{URL::to($result->image)}}" style="height: 300px; width: 100%;">
         </div>
        <div class="col-lg-5" style= "float:left;padding-left: 30px;"> 
            <center><h2><?php echo $result->title ; ?></h2></center>
             <p><?php echo $result->des ; ?></p> 
              <?php if($result->document != ''){?>
                <a target="_blank" href="{{URL::to($result->document)}}" title="Download" class="btn btn-success btn-sm">Donwload</a> 
                <?php } ?>   
        </div>
        <div class="col-lg-2"style= "float: left;" > 
          
         </div>
    </div>
          </section>
   
     <?php else: ?>
 <section>
    <div class="container" data-aos="fade-up">
        <div class="col-lg-12" style= "padding-bottom: 50px;"> 
            <center><h2><?php echo $result->title ; ?></h2></center>
             <p><?php echo $result->des ; ?></p>   
        </div> 
         <div class="row">
          <?php foreach($sub_link as $result_value){?>
          <div class="col-lg-3 ">         
          <div class="pic"><a href=" {{URL::to('subMenuLinkDetailsImage/'.$result_value->id.'/'.$result_value->main_menu_id.'/'.$result_value->main_title_id)}}"><img src="{{URL::to($result_value->image)}}" style="height: 300px; width: 100%;"> </a>
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
 </section>
 <?php endif; ?>
 <?php }?>
</main>

  @endsection
