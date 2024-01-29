<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="{{URL::to('public/fontend/assets/img/goodko-med-2048x1116.png')}}" rel="icon"  />
  <title>Goodko </title>
  <title>goodko.com | the best, products</title> 
  <title>goodko.com.bd | the best products</title> 
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <!--<link href="assets/img/favicon.png" rel="icon">-->
  <link href="{{URL::to('public/fontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon"/>
   <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
   <link href="{{URL::to('public/fontend/assets/vendor/aos/aos.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('public/fontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('public/fontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('public/fontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('public/fontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('public/fontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('public/fontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{URL::to('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Template Main CSS File -->
  <link href="{{URL::to('public/fontend/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
  <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
  <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
  <!-- =======================================================
  * Template Name: Dewi - v4.8.1
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<style>
  body {
  font-family: 'Open Sans';
  color: black;
  font-size: 14px;
}
.nav-link{
    color: white!important;     
    font-weight: bold;
    font-weight: 900;
    padding-top: none;
    }
#header{
    background-color: white!important;
    height: 80px;
    transition: all 0.5s;
    z-index: 997;
    padding: 2px 2px;
    }

.navbar>ul>li>a:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: -6px;
  left: 0;
  background-color:white!important;
  visibility: hidden;
  width: 0px;
  transition: all 0.3s ease-in-out 0s;
} 
.navbar>ul>li {
  white-space: nowrap;
  padding: 8px 12px;
}
.navbar-mobile.navbar>ul>li>a {
   white-space: nowrap;
  padding: 8px 0px;
}
.navbar>ul>li>a:hover {
  color:#AF0D5B!important;
}
.footer-top{
  background-color:#AF0D5B!important;
  font-size: 15px;

} 
#footer{
   background-color:black!important;
   font-size: 15px;
   padding-top: 10px;
   
    }
.bx {
    color: white!important;     
    font-weight: bold;
    font-weight: 900;
    }
    .bxy {
   color: white!important;     
    font-size: 15px;
    }
#footer_color {
    color: white!important;     
    font-weight: bold;
    font-weight: 900;
    }
#footer_color_about{
    color: white!important;     
    font-size: 14px;
}
#footer_color_product{
    color: white!important;     
    font-size: 14px;
}
  .back-to-top {
  position: fixed;
  visibility: hidden;
  opacity: 0;
  right: 15px;
  bottom: 15px;
  z-index: 996;
  background: #AF0D5B!important;
  width: 40px;
  height: 40px;
  border-radius: 4px;
  transition: all 0.4s;
}
a:hover {
/* // color: #AF0D5B!important;*/
color: white;
text-decoration: none;
}
#footer .footer-top .social-links a:hover {
  background: #AF0D5B!important;
  color: #fff;
  text-decoration: none;
}
.btn-bpm{
background-color: green;
}
section{
  padding: 20px;
}
.whatsapp_float{
  position: fixed;
  bottom: 70px;
  right: 20px;
  background-color: none;
}
.mobile-nav-toggle{
  color: #AF0D5B!important;
}

.header_menu_show
{
 color:black!important;
 font-weight: bold;
}
.header_menu_show:hover{
  color:#AF0D5B!important;
}
#header_one{
   background-color:#AF0D5B!important;
   padding-top:12px;
   height: 45px;
   font-size: 12px;
}
.navbar-mobile a, .navbar-mobile a:focus {
    padding: 0px;
    font-size: 12px;
    color: black!important;
}
.navbar-mobile .nav-link {
    padding: 0px;
    font-size: 12px;
    color: white!important;
}
.navbar-mobile .#header_one {
    padding: 0px;
    font-size: 7px;
    color: white!important;
}
.col-lg-2 li{
  list-style: none;
}
.col-lg-3 li{
  list-style: none;
}
.main_menu_show:hover{
  text-transform: uppercase;
    color: white;
    display: block;
    padding: 10px 13px;
    border-radius: 6px;
    transition: 0.3s;
    margin: 0 1px;
    color:white!important;
    background-color:#AF0D5B ;
}
</style>
</head>
<body>
  <header id="header_one">
    <div  class="container ">
       <div class="col-lg-6"style= "float: left;" > 
        <a href="https://www.facebook.com/goodko.bd/" ><i class="fa-brands fa-facebook" style="color:white!important;padding-left:7px;padding-right: 10px;"></i></a>
                <a href="https://www.linkedin.com/in/sm-bayazid-rahmann/"><i class="fa-brands fa-linkedin"style="color: white!important;padding-right: 10px;"></i></a>
                <a  href="https://wa.me/8801612755677 "><i class="fa-brands fa-whatsapp" style="color: white!important;padding-right: 10px;"></i></a>
                 <a  style="display: none;" href="mailto:info@goodko.com.bd"><i class="fa-solid fa-envelope"style="color: white!important;"></i></a>
         </div>
         <div class="container">
        <div class="col-lg-6 " style= "float:right;text-align: right;"> 
            <i class="fa-solid fa-phone" style="font-weight:bold;color: white!important;font-size: 12px;display: none;"></i>
        <?php 
             $footers = DB::table('footer')->where('status',0)->first();
             ?>
          <span style="font-weight:bold;color: white!important;display: none;"> +<?php echo $footers->company_number_one ; ?></span>  
          <a  href="mailto:info@goodko.com.bd"> <i class="fa-solid fa-envelope"style="font-weight:bold;color: white!important;padding-left: 5px"></i></a>
               <a href="mailto:info@goodko.com.bd"> <span style="font-weight:bold;color: white!important;"> &nbsp; <?php echo $footers->company_email ; ?></span> </a>
        </div> 
    </div>
  </div>
</header>
  <!-- ======= Header ======= -->
  <header id="header">
    <div  class="container d-flex align-items-center justify-content-between">
  <!-- <h1 class="logo"><a style="color: white;height: 50px; width: 30px;" href="{{URL::to('/')}}" >Goodko</a></h1> -->
     <a href="{{ URL::to('/') }}"> <img class="logo" style="height: 80px; width: 130px;padding-top: 5px;" src="{{ URL::to('public/fontend/assets/img/goodko-med-2048x1116.png') }}" alt="logo" /> </a>
      <nav id="navbar" class="navbar"  >
        <ul>
              <!------------------------- start ----------------------------->
              <?php $heder_menu_query = DB::table('tbl_header_menu')->where('action',0)->get(); ?>
              <?php foreach($heder_menu_query as $heder_menu_query_value){?>
                
                <?php if($heder_menu_query_value->status == "1"):?>
                  <li>
                  <a  href="{{URL::to('headerMenuContent/'.$heder_menu_query_value->id)}}"
                  ><span class="header_menu_show"><?php echo $heder_menu_query_value->h_menu_name ; ?></span></a></li>
                <?php else: ?>
                  <li class="dropdown">
                  <a  href="#"
                  ><span class="header_menu_show" ><?php echo $heder_menu_query_value->h_menu_name ; ?></span>
                  <i class="bi bi-chevron-right"style="color:black!important;font-weight: bold;"></i
                ></a>

              <?php endif;?>

               <ul>
                <?php $main_menu_query = DB::table('tbl_main_menu')->where('h_menu_id',$heder_menu_query_value->id)->where('action',0)->get() ;
                foreach($main_menu_query as $main_menu_query_value){?>
                
               <?php if($main_menu_query_value->status == "1"):?>
                 <li><a class="main_menu_show" href="{{URL::to('mainMenuContent/'.$main_menu_query_value->id)}}"
                  ><span ><?php echo $main_menu_query_value->main_menu_name ; ?></span>
                  </a></li>
              <?php else:?>
                <li class="dropdown" >
                  <a class="main_menu_show" href="#"
                  ><span ><?php echo $main_menu_query_value->main_menu_name ; ?>
                  <i class="bi bi-chevron-right"></i> </span></a>
              <?php endif;?>
                
              </li>
              <?php } ?>
            </ul>
          </li>
             <?php } ?>
              <!------------------------ end start -------------------------->
          <li><a href="{{ URL::to('/contactPage') }}" class="header_menu_show"style="font-weight: bold;" >Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

@yield ('content')
 <div class="whatsapp_float">
      <a href=" https://wa.me/8801612755677" target="_blank"><i class="fa-brands fa-whatsapp" style="color: green!important;font-size: 45px;"></i></a>
    </div>
  <!-- ======= Footer ======= -->
  <footer id="footer">  
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-8">
             <?php 
             $footers = DB::table('footer')->where('status',0)->first();
             ?>
            <div >
              <a href="{{ URL::to('/') }}"> <img class="logo" style="color: white;height: 50px; width: 100px;" src="{{ URL::to('public/fontend/assets/img/goodko-med-2048x1116.png') }}" alt="logo" /> </a>
               <br><br>      
              <p style="color: white!important;"> 
                 <br/> 
                    <a href="mailto:info@goodko.com.bd"><i  class="fa-solid fa-envelope"style="color: white!important;font-size: 15px;"></i><span style="color: white!important;padding-left: 10px;"><?php echo $footers->company_email ; ?></span> </a>
                     <br/>       
                   <!-- <a href="tel:01612755677"> </a> -->
                    <a href="https://goodko.com.bd/"><i class="fa-solid fa-globe"style="color: white!important;padding-top: 10pxfont-size: 15px;"></i><span style="color: white!important;padding-left: 10px;"><?php echo $footers->company_web ; ?></span></a>  <br/>                   
                     <i class="fa-solid fa-phone" style="color: white;padding-top: 10px;font-size: 15px;"></i>
                    <span> &nbsp;+<?php echo $footers->company_number_one ; ?><br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+<?php echo $footers->company_number_two ; ?>
                    </span>
                    <br/> 
                     <i class="fa-solid fa-building"style="color: white!important;padding-top: 10px;font-size: 15px;"></i>
                       <span style="color: white!important;padding-left: 7px;">Business Address: House-32&32/A, Road-1,<br/>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shekhertek,Mohammadpur, Dhaka-1207,
                         <br/>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bangladesh.                      
                         </span>
                      <br/>

                      <i class="fa-solid fa-house"style="color: white!important;padding-top: 10px;font-size: 14px;"></i>
                      <span style="color: white!important;padding-left: 5px;">Registered Address: 44/1, Collage Area,<br/>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Market City Complex (Biswas Builders)<br/>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1st Floor, Shop-29, Dhaka-1205, Bangladesh.
                      </span>
                <br/> 
              </p>              
            </div>           
          </div>
           <div class="col-lg-4 col-md-6 ">
             <a href="https://www.facebook.com/goodko.bd/" ><i class="fa-brands fa-facebook" style="color:white!important;font-size:40px;padding-right: 20px;padding-top: 20px;"></i></a> 
               
            <a href="https://www.linkedin.com/in/sm-bayazid-rahmann/"><i class="fa-brands fa-linkedin"style="color: white!important;font-size:40px;padding-right: 20px;"></i></a> 

            <a  href="https://wa.me/8801612755677 "><i class="fa-brands fa-whatsapp" style="color: white!important;font-size:40px;"></i></a><br>
          </div>
          <div class="col-lg-2 col-md-6 footer-links"style="display:none;">
            <h4  style="color:white!important!important;font-size: 18px; font-weight: bold;padding-left: 30px;">About Us</h4>
            <ul>
              <li><i class="bxy bx-chevron-right"></i> <a id="footer_color_about" href="{{ URL::to('/aboutGoodko') }}">About Goodko</a></li>
              <li style="display: none;"><i class="bxy bx-chevron-right"></i> <a id="footer_color_about" href="#">Why Choose Us</a></li>
              <li style="display: none;"><i class="bxy bx-chevron-right"></i> <a id="footer_color_about" href="#">Certificate</a></li>
              <li style="display: none;"><i class="bxy bx-chevron-right"></i> <a id="footer_color_about" href="#">Facility</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6 footer-links" style="display:none;">
          <h4 style="color:white!important!important;font-size: 18px; font-weight: bold;padding-left: 30px;">Bussiness & Products</h4>
            <ul style="display:none;">
              <li><i class="bx-chevron-right"></i> <a id="footer_color_product"href="#"></a></li>
            </ul>
              <ul>
              <li><i class="bx-chevron-right"></i> <a id="footer_color_product"href="#">Biochemistry Analyzer</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6">
            <h4 style="color:white!important!important;font-size: 18px; font-weight: bold;padding-top:20px">Message</h4>          
                {!! Form::open(['url' =>'messageInfo','method' => 'post','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                
              <input type="text" class="form-control" name="name" required="" placeholder="Name *">
                  <br/>
              <input type="email" class="form-control" name="email" required="" placeholder="Email *">
                  <br/>
              <textarea type="text" class="form-control " name="message"placeholder="Message *" required=""></textarea>
              <br/>
              <button type="submit" class="btn btn-primary" style="background-color: #AF0D5B;">Send</button>
               {!! Form::close() !!}  
          </div>
        </div>
      </div>
  </footer><!-- End Footer -->
<footer>
  <div class="footer-top">
  <div class="container">
      <div class="copyright" style="color:white!important;padding-top: 10px;padding-bottom: 10px;height: 40px;">
        <center>
        &copy; Copyright 2023 Reserved by  <span ><a style="color:white!important;"href="{{ URL::to('/') }}">Goodko <sup>TM</sup> </a></span></center>
      </div>
      <div class="credits"style="color:black;!important;font-size: 18px; display: none;">
        Designed by <a style="color:#AF0C5B!important;" href="https://www.numericsoftbd.com/">Numeric Software</a>
      </div>
    </div> 
     </div>
   </footer>
  <div id="preloader"></div>
  <a href="#" style="color:#AF0C5B!important;"class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
<script src="{{URL::to('public/fontend/assets/vendor/purecounter/purecounter_vanilla.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/fontend/assets/vendor/aos/aos.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/fontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/fontend/assets/vendor/glightbox/js/glightbox.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/fontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/fontend/assets/vendor/swiper/swiper-bundle.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/fontend/assets/vendor/php-email-form/validate.js')}}" type="text/javascript"></script>
<!--<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <!-- Template Main JS File -->
  <script src="{{URL::to('public/fontend/assets/js/main.js')}}"></script>
  <!-- <script src="assets/js/main.js"></script> -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
       // $('body').on('click','[name="header_menu"]',function(e){
       //  e.preventDefault();
       //  alert($('[name="header_menu"]').each());
       // });

    </script>
</body>
</html>
@yield ('js')