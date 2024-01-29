@extends('web_view.masterWeb')
@section('content')


<main id="main">
         
     <?php   $child_link = DB::table('link_child_menu_content_image')->where('sub_link_id',$result->id)->where('main_title_id',$result->main_title_id)->where('main_menu_id',$result->main_menu_id)->where('status',0)->get(); {?>

        <?php if(count($child_link) == "0"):?>
         <section>
            <div class="container" data-aos="fade-up">
               <div class="col-lg-6"style= "float: left;" > 
                  <center><img src="{{URL::to($result->image)}}" style="height: 350px; width: 100%;"> </center> 
                 </div>
                <div class="col-lg-6" style= "float:left;padding-left: 30px;"> 
                    <center><h2><?php echo $result->title ; ?></h2></center>
                     <p><?php echo $result->des ; ?></p>  
                      <?php if($result->document != ''){?>
                <a target="_blank" href="{{URL::to($result->document)}}" title="Download" class="btn btn-success btn-sm">Donwload</a> 
                <?php } ?>  
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
          <?php foreach($child_link as $values){?>
        <div class="col-lg-3 ">         
          <div class="pic"><a href=" {{URL::to('childMenulinkDetailsImage/'.$values->id.'/'.$values->main_menu_id.'/'.$values->main_title_id.'/'.$values->sub_link_id)}}"><img src="{{URL::to($values->image)}}" style="height: 300px; width:100%;"> </a>
          </div>
              <div>
                <a href=" {{URL::to('childMenulinkDetailsImage/'.$values->id.'/'.$values->main_menu_id.'/'.$values->main_title_id.'/'.$values->sub_link_id)}}"><br>
                <h5><center style="color: black;"><?php echo $values->title ;?></center></h5>
                <p style="color: black;"><?php echo substr($values->des,0,50);?>...<span style="font-size: 14px;color: #AF0D5B;">Read More</span></p></a>
            </div>
          </div>
        <?php } ?>
        </div>
    </div>
 </section>
 <?php endif; ?>
 <?php }?>
</main>


<main id="main" style="display:none;">
  <section style="display:none;">
    <div class="container" data-aos="fade-up">
        <div class="col-lg-12" style= "float:right;padding-bottom: 50px;"> 
            <center><h2><?php echo $result->title ; ?></h2></center>
             <p><?php echo $result->des ; ?></p>   
        </div> 

        <div class="row">
          <?php
          $child_link = DB::table('link_child_menu_content_image')->where('sub_link_id',$result->id)->where('main_title_id',$result->main_title_id)->where('main_menu_id',$result->main_menu_id)->where('status',0)->get();
           foreach($child_link as $values){?>
        <div class="col-lg-4 ">         
          <div class="pic"><a href=" {{URL::to('childMenulinkDetailsImage/'.$values->id.'/'.$values->main_menu_id.'/'.$values->main_title_id.'/'.$values->sub_link_id)}}"><img src="{{URL::to($values->image)}}" style="height: 300px; width: 400px;"> </a>
          </div>
              <div>
                <a href=" {{URL::to('childMenulinkDetailsImage/'.$values->id.'/'.$values->main_menu_id.'/'.$values->main_title_id.'/'.$values->sub_link_id)}}"><br>
                <h5><center style="color: black;"><?php echo $values->title ;?></center></h5>
                <p style="color: black;"><?php echo substr($values->des,0,250);?>...<span style="font-size: 14px;color: #AF0D5B;">Read More</span></p></a>
            </div>
          </div>
        <?php } ?>
        </div>
       
    </div>
  </section>
</main>
  @endsection
