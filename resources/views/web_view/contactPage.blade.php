@extends('web_view.masterWeb')
@section('content')
<main id="main">
 <section>
    <div class="container" data-aos="fade-up">
       <div class="col-lg-6"style= "float: left;" > 
        <div class="col-md-12"style="text-align: left;padding-left: 5px;padding-right: 50px;">
            
            <div style="padding-bottom: 10px;">
                <span  >Fill out the form and we will get back to you shortly.</span>
            </div>
     
                                          <div class="portlet-body ">
                                           {!! Form::open(['url' =>'webContactInfo','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                                            <div class="form_maintain">
                                                    <div class="col-md-12">
                                                      <input type="text" name="name" class="form-control form-label" required="" placeholder="Name*">  
                                                     </div>
                                                    <div class="col-md-12">
                                                      <input type="email" name="email" class="form-control form-label" placeholder="Email*"required="">
                                                    </div>
                                                    <div class="col-md-12">
                                                      <input type="text" name="mobile" class="form-control form-label" required="" placeholder="Mobile Number*" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                    </div>
                                                    <div class="col-md-12">
                                                      <select name="sex" class="form-control form-label" >
                                                      <option value="">Select Sex</option>
                                                      <option value="1">Male</option>
                                                      <option value="2">Female</option>
                                                      </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                      <input type="text" name="your_company" class="form-control form-label" required="" placeholder="Company*">
                                                    </div>
                                                    <div class="col-md-12">
                                                      <textarea name="permanent_address" class="form-control form-label " placeholder="Company Address"></textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                      <textarea name="remarks" class="form-control form-label " placeholder="Message"></textarea>
                                                    </div>
                                                   </div>
                                                   <div class="col-md-12" style="text-align: right;">
                                                    <button type="submit" class="btn btn-primary" style="background-color:#AF0D5B ;">Submit</button>
                                                   </div>                                             
                                             {!! Form::close() !!}
                        <br> <br>                  </div>
      </div>     

         </div>
        <div class="col-lg-6" style= "float:right;"> 
         <footer >
    <div class="">
        <div class="row">
          <div class="col-lg-12" style="margin-right: 5px;padding-bottom: 5px;">
             <?php foreach($footer as $footers){?>
            <div>
             <a href="{{ URL::to('/') }}"> <img class="logo" style="height: 50px; width: 120px;" src="{{ URL::to('public/fontend/assets/img/goodko-med-2048x1116.png') }}" alt="logo" /> </a> 
               <br><br>                       
               <p style="color: black!important;">
                 <br/> 
                    <a href="mailto:info@goodko.com.bd"><i  class="fa-solid fa-envelope"style="color: black!important;font-size: 15px;"></i><span style="color: black!important;padding-left: 10px;"><?php echo $footers->company_email ; ?></span> </a>
                     <br/>       
                   <!-- <a href="tel:01612755677"> </a> -->
                    <a href="https://goodko.com.bd/"><i class="fa-solid fa-globe"style="color: black!important;padding-top: 10px;font-size: 15px;"></i><span style="color: black!important;padding-left: 10px;"><?php echo $footers->company_web ; ?></span></a>  <br/>                   
                     <i class="fa-solid fa-phone" style="color: black;padding-top: 10px;font-size: 15px;"></i>
                    <span> &nbsp;+<?php echo $footers->company_number_one ; ?><br/>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+<?php echo $footers->company_number_two ; ?>
                    </span>
                    <br/> 
                     <i class="fa-solid fa-building"style="color: black!important;padding-top: 10px;font-size: 15px;"></i>
                       <span style="color:black!important;padding-left: 7px;">Business Address: House-32&32/A, Road-1,<br/>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shekhertek,Mohammadpur, Dhaka-1207,
                         <br/>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bangladesh.                      
                         </span>
                      <br/>
                      <i class="fa-solid fa-house"style="color: black!important;padding-top: 10px;font-size: 15px;"></i>
                      <span style="color:black!important;padding-left: 4px;">Registered Address: 44/1, Collage Area,<br/>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Market City Complex (Biswas Builders)<br/>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1st Floor, Shop-29, Dhaka-1205, Bangladesh.
                      </span>
                <br/><br/>
              </p>
               <?php } ?>
              <div >
                <a href="https://www.facebook.com/goodko.bd/" ><i class="fa-brands fa-facebook" style="color:#1E3050!important;font-size:20px;padding-right: 10px;"></i></a>
                <a href="https://www.linkedin.com/in/sm-bayazid-rahmann/"><i class="fa-brands fa-linkedin"style="color: #1E3050!important;font-size:20px;padding-right: 10px;"></i></a>
                <a  href="https://wa.me/8801612755677 "><i class="fa-brands fa-whatsapp" style="color: green!important;font-size:20px;"></i></a>
               </div>
            </div>           
          </div>        
        </div>
     
      </div>
      </footer>     

        </div> 
    </div>
  </section>
</main>


<main id="main" style="display:none;">
  <!-- ======= Team Section ======= -->
<section >
  <div class="col-md-10"style= "background-color: black!important;padding-top: 0px;padding-left: 300px;position: center;">
    <div class="col-md-5"style= "background-color: black!important;width: 50%;float: left;">
         <span style="font-weight:bold;font-size:20px;padding-left: 5px;color: white;">Contact Info</span>    
      <div class="col-md-12"style="text-align: left;padding-left: 5px;">
            <?php foreach($footer as $footers){?>
            <div >
               <i class="fa-solid fa-envelope"style="color: white;"></i>
                <span style="color: white;"> &nbsp; <?php echo $footers->company_email ; ?>&nbsp;</span>
                <i class="fa-brands fa-whatsapp" style="color: white;margin-top: 10px;"></i>
                <span style="color: white;"> &nbsp;+<?php echo $footers->company_whatsup ; ?></span>
            </div>
             <?php }?>
                                          <div class="portlet-body form">
                                           {!! Form::open(['url' =>'webContactInfo','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                                            <div class="form_maintain">
                                                    <div class="col-md-12">
                                                      <input type="text" name="name" class="form-control form-label" required="" placeholder="Your Name*">  
                                                     </div>
                                                    <div class="col-md-12">
                                                      <input type="email" name="email" class="form-control form-label" placeholder="Your Email*"required="">
                                                    </div>
                                                    <div class="col-md-12">
                                                      <input type="text" name="mobile" class="form-control form-label" required="" placeholder="Your Mobile Number*" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                    </div>
                                                    <div class="col-md-12">
                                                      <select name="sex" class="form-control form-label" >
                                                      <option value="">Select Sex</option>
                                                      <option value="1">Male</option>
                                                      <option value="2">Female</option>
                                                      </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                      <input type="text" name="your_company" class="form-control form-label" required="" placeholder="Your Company*">
                                                    </div>
                                                    <div class="col-md-12">
                                                      <textarea name="permanent_address" class="form-control form-label " placeholder="Your Company Address"></textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                      <textarea name="remarks" class="form-control form-label " placeholder="Message"></textarea>
                                                    </div>
                                                   </div>
                                                   <div class="col-md-12" style="text-align: right;">
                                                    <button type="submit" class="btn btn-primary" style="background-color:#AF0D5B ;">Submit</button>
                                                   </div>                                             
                                             {!! Form::close() !!}
                        <br> <br>                  </div>
      </div>                                    
 </div>
 <div class="col-md-5"style= "width: 50%;float:right;">
 <footer id="footer">
    <div class="footer-top">
        <div class="row">
          <div class="col-lg-12" style="margin-left: 10px;margin-right: 10px;padding-left: 50px;padding-bottom: 5px;">
             <?php foreach($footer as $footers){?>
            <div>
             <a href="{{ URL::to('/') }}"> <img class="logo" style="color: white;height: 50px; width: 120px;" src="{{ URL::to('public/fontend/assets/img/goodko-med-2048x1116.png') }}" alt="logo" /> </a> 
               <br><br>                       
              <p style="color: white!important;">
                <i class="fa-solid fa-envelope"style="color: white;"></i>
                <span> &nbsp; <?php echo $footers->company_email ; ?></span> 
                <br/>
                <i class="fa-solid fa-globe"style="color: white;margin-top: 10px;"></i>
                <span> &nbsp; <?php echo $footers->company_web ; ?></span> 
                <br/>
                <i class="fa-brands fa-whatsapp" style="color: white;margin-top: 10px;"></i>
                <span> &nbsp;+<?php echo $footers->company_whatsup ; ?></span> 
                <br/>
                <i class="fa-solid fa-phone" style="color: white;margin-top: 10px;"></i>
                <span> &nbsp;+<?php echo $footers->company_number_one ; ?><br/>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+<?php echo $footers->company_number_two ; ?>
                </span>
                <br/>
                <i class="fa-solid fa-building"style="color: white; font-size: 12px;margin-top: 10px;"></i>
                <span>Business Address: &nbsp; <?php echo $footers->company_address ; ?></span>               
                <br/>  
                <i class="fa-solid fa-house"style="color: white; font-size: 12px;margin-top: 10px;"></i> 
                <span>Registered Address: &nbsp; <?php echo $footers->company_address_reg ; ?></span>               
                <br/> 
              </p>
               <?php } ?>
              <div class="social-links mt-3">
                <a href="https://www.facebook.com/goodko.bd/" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="linkedin" ><i class="bx bxl-linkedin"></i></a>
               </div>
            </div>           
          </div>        
        </div>
     
      </div>
      </footer>                                
  </div>
</div>
</section><!-- End Team Section -->
</main><!-- End #main -->
  @endsection
