@extends('web_view.masterWeb')
@section('content')
<main id="main">
 <section>
    <div class="container" data-aos="fade-up">
       <div class="col-lg-6"style= "float: left;" > 
          <center><img src="{{URL::to($result->image)}}" style="height: 350px; width: 100%;"> </center> 
         </div>
        <div class="col-lg-6" style= "float:right;"> 
            <center><h2><?php echo $result->title ; ?></h2></center>
             <p><?php echo $result->des ; ?></p>   
        </div> 
    </div>
  </section>
</main>
  @endsection
