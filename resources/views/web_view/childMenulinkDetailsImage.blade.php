@extends('web_view.masterWeb')
@section('content')
<main id="main">
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
        <div class="col-lg-4" style= "float:left;padding-left: 30px;"> 
            <center><h2><?php echo $result->title ; ?></h2></center>
             <p><?php echo $result->des ; ?></p> 
             <?php if($result->document != ''){?>
                <a target="_blank" href="{{URL::to($result->document)}}" title="Download" class="btn btn-success btn-sm">Donwload</a> 
                <?php } ?> 
        </div>
        <div class="col-lg-3"style= "float: left;" > 
          
         </div>
    </div>
  </section>
</main>
  @endsection
