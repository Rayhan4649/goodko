<?php
$admin_id       = Session::get('admin_id');
$type           = Session::get('type');
$branch_id      = Session::get('branch_id');

       if($admin_id == null && $type == null){
       return Redirect::to('/admin')->send();
       exit();
        }

       if($admin_id == null && $type != '2'){
       return Redirect::to('/admin')->send();
       exit();
        }

        if($type != '2'){
       return Redirect::to('/admin')->send();
       exit();
        }
       if($branch_id == ''){
       return Redirect::to('/admin')->send();
       exit();
        }
        $branch_type_query = DB::table('branch')->where('id',$branch_id)->first();
        ?>
<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>Goodko Admin</title>
        <link href="{{URL::to('public/fontend/assets/img/goodko-med-2048x1116.png')}}" rel="icon"  />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{URL::to('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" />
        <!--<link href="{{URL::to('public/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css')}}" />-->
        <link href="{{URL::to('public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <link href="{{URL::to('public/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{URL::to('public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />

        <!--<link href="{{URL::to('public/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />-->
        <!--<link href="{{URL::to('public/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />-->
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{URL::to('public/assets/global/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{URL::to('public/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{URL::to('public/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
       <link href="{{URL::to('public/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{URL::to('public/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{URL::to('public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/global/plugins/clockface/css/clockface.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css')}}" rel="stylesheet" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
        <!-- /<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">



        <!-- END THEME LAYOUT STYLES -->
        <!--<link rel="shortcut icon" href="favicon.ico" />-->
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.animate-charcter
{
   text-transform: uppercase;
  background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: white;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
  display: inline-block;
      font-size: 14px;
}

@keyframes textclip {
  to {
    background-position: 200% center;
  }
}
        i{
            color: black!important;
        }
        i.fa-solid{
            color: black!important;
        }
        span.title{
           color:white;
           font-weight: bold;
        }
        .sub-menu a {
            font-size:11px !important;
            color:white;
        }
        .portlet-title{
            background: #4267B2!important;
        }

        button.btn.green {
            background: #4267B2!important;
            border:1px solid #4267B2!important;
            text-transform: uppercase;
        }
        .btn-success{
            background: #0eb047!important;
            border:1px solid #0eb047!important;
            text-transform: uppercase;

        }

        button.btn.green:hover {
            background:#fdd670!important;
            border:1px solid #4267B2!important;
            text-transform: uppercase!important;
            color:#4267B2 !important;
            font-weight: bold;
        }
        div.portlet {
            border:1px solid #4267B2!important;
        }
        div.portlet-body{
        background-color: aliceblue!important ;
        font-family: Arial!important;
        }
        .caption-subject{
            padding-left: 7px!important;
            color: white!important;
        }
        .icon-settings{
            display: none!important;
        }
        .form-body{
            background-color: aliceblue!important ;
        }
        .btn.btn-info{
            background: #4267B2!important;
        }
        #add_button{
        color: black !important;
        background: antiquewhite !important;
        font-weight: bold !important;
        border: 3px black !important;
        border-radius: 8px !important;
        border-style: groove!important;
        }
       .widget-thumb.bordered{
            border: 2px solid dodgerblue!important;
        }
      
  @-webkit-keyframes blinker {
  from {opacity: 1.0;}
  to {opacity: 0.0;}
}
.blink{
    text-decoration: blink;
    -webkit-animation-name: blinker;
    -webkit-animation-duration: 3s;
    -webkit-animation-iteration-count:infinite;
    -webkit-animation-timing-function:ease-in-out;
    -webkit-animation-direction: alternate;
} 
/*#pettycash_amount_block{
    animation: mymovepettycash 5s infinite;
}*/

@keyframes mymove {
  from {background-color: #4267B2;}
  to {background-color: red;}
}
/*@keyframes mymovepettycash {
  from {background-color: #4267B2;}
  to {background-color: blue;}
}*/
.caption{
    text-transform: uppercase;
}

</style>
</head>
    <!-- END HEAD -->
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-fixed">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top" style="background: #4267B2;">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{ URL::to('/managerDashboard') }}" style="padding-top: 12px;">
                            <!-- <img src="{{ URL::to('public/fontend/assets/img/goodko-med-2048x1116.png') }}" alt="logo" class="logo-default" /> -->
                             <span style="color:white;font-weight: bold;" class="blink"><?php
                                $branch_query = DB::table('branch')->where('id',$branch_id)->first();
                               
                             ?>
                             NUMERIC SOFTWARE                                 
                             </span>
                             </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="hidden-xs" style="text-decoration: none ;">
                         <span class="animate-charcter" style="font-size: 28px;color: white;font-weight: bold";>
                            <?php if($branch_type_query->image != ""){?>
                             <img height="30" width="50" alt="" class="img-circle" src="{{URL::to($branch_type_query->image)}}" />
                            <?php }?>
                            <?php
                              $company_name_setting_query = DB::table('setting')->first();
                              echo $company_name_setting_query->company_name ;
                            ?></span>
                    </a>
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                                     <li style="padding-top: 11px;padding-right: 8px;">
                                    <span style="color:white;">
                                    <a href="{{URL::to('databaseBackup')}}" class="nav-link ">
                                    <span class="title" style="color: white">ব্যাকআপ ডাটাবেস</span>
                                    <span class="selected"></span>
                                </a>
                                    </span>
                            </li>
                             <li style="padding-right: 8px; display:none;">
                                    <a href="{{URL::to('saleType')}}" style="color: black;
                                font-weight: bold;">SALE</a>
                            </li>
                             <li style="padding-right: 8px; display:none;">
                                    <a href="{{URL::to('collectType')}}" style="color:black;
                                font-weight: bold;">COLLECT</a>
                            </li>
                            <li style="padding-top: 11px;padding-right: 8px;display: none;">
                                    <span style="color:white;">Cash :<?php

                                    $count___pettycash_amount___query = DB::table('pettycash')->where('branch_id',$branch_id)->count();
                                    if($count___pettycash_amount___query > 0){
                                    $cash = DB::table('pettycash')->where('branch_id',$branch_id)->first();
                                    $__now_peetycahs_amount = $cash->pettycash_amount ;
                                       echo $cash->pettycash_amount ;
                                   }else{
                                    $__now_peetycahs_amount = 0 ;
                                    echo 0.00;
                                   }
                                  ?>
                                    </span>
                            </li>
                              <li style="padding-top: 11px;padding-right: 8px;">
                                    <span style="color:white;">
                                    <a href="{{URL::to('managerLogout')}}" class="nav-link ">
                                    <span class="title" style="color: white">LOG OUT</span>
                                    <span class="selected"></span>
                                </a>
                                    </span>
                            </li>
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user" id="dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <?php if(Session::get('photo') != '' ):?>
                                      <img alt="" class="img-circle" src="<?php echo Session::get('photo') ; ?>" />
                                    <?php else:?>
                                     <img alt="" class="img-circle" src="public/assets/layouts/layout/img/avatar.jpg" />
                                    <?php endif;?>
                                    <span class="username username-hide-on-mobile" style="color: white;font-weight: bold;"><?php echo Session::get('admin_name');?>  </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{URL::to('managerChangePassword')}}">
                                        <i class="icon-calendar"></i> Change Password </a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('managerLogout')}}">
                                        <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <div class="page-sidebar navbar-collapse collapse" style="background: #13537e;">
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="false" data-slide-speed="200" style="padding-top: 20px">
                         <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                         </li>
                            <li class="nav-item start">
                                <a href="{{URL::to('managerDashboard')}}" class="nav-link ">
                                   <i class="fa-sharp fa-solid fa-gauge" style="color:white!important;"></i>
                                    <span class="title" >DASHBOARD</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                                  <li class="nav-item">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                       <i class="fa-solid fa-sliders" style="color:white!important;"></i>
                                        <span class="title">MENU</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu" >                                        
                                        <li class="nav-item">
                                            <a href="{{URL::to('manageHeaderMenu')}}" class="nav-link">
                                                <i class="fa-solid fa-sliders"style="color:white!important;"></i>
                                                <span class="title">HEADER MENU</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{URL::to('manageMainMenu')}}" class="nav-link">
                                                <i class="fa-solid fa-sliders"style="color:white!important;"></i>
                                                <span class="title">MAIN MENU</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" style="display:none;">
                                            <a href="{{URL::to('manageSubMenu')}}" class="nav-link">
                                                <i class="fa-solid fa-sliders"style="color:white!important;"></i>
                                                <span class="title">SUB MENU</span>
                                            </a>
                                        </li>
                                        <li class="nav-item"style="display:none;">
                                            <a href="{{URL::to('manageChildMenu')}}" class="nav-link">
                                                <i class="fa-solid fa-sliders"style="color:white!important;"></i>
                                                <span class="title">CHILD MENU</span>
                                            </a>
                                        </li>                                       
                                    </ul>
                                </li>
        <!-- -------------------------------End DASHBOARD--------------------------------- -->
        <!-- ----------------------------------Start Bannar------------------------------- -->
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                       <i class="fa-solid fa-sliders" style="color:white!important;"></i>
                                        <span class="title">BANNER</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu" >
                                        <li class="nav-item"style="display:none;">
                                            <a href="{{URL::to('addbannar')}}" class="nav-link">
                                                <i class="icon-diamond"></i>
                                                <span class="title">ADD BANNAR</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{URL::to('manageBannar')}}" class="nav-link">
                                                <i class="fa-solid fa-sliders"style="color:white!important;"></i>
                                                <span class="title">BANNER</span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
        <!-- -----------------------------------End Bannar--------------------------------- -->
            <li class="nav-item" style="display:none;">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                       <i class="fa-solid fa-sliders" style="color:white!important;"></i>
                                        <span class="title">PAGE SETTING</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu" >
                                        <li class="nav-item">
                                            <a href="{{URL::to('pageSetup')}}" class="nav-link">
                                                <i class="fa-solid fa-sliders"style="color:white!important;"></i>
                                                <span class="title">Page Setup</span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
        <!-- -----------------------------------Start CLIENTS------------------------------ -->
                             <li class="nav-item" style="display:none;">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-diamond"></i>
                                        <span class="title">CLIENTS</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="{{URL::to('addCategory')}}" class="nav-link">
                                                <i class="icon-diamond"></i>
                                                <span class="title">ADD CATEGORY</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{URL::to('manageCategory')}}" class="nav-link">
                                                <i class="icon-diamond"></i>
                                                <span class="title">MANAGE CATEGORY</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{URL::to('addClient')}}" class="nav-link">
                                                <i class="icon-diamond"></i>
                                                <span class="title">ADD CLIENT</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{URL::to('manageClient')}}" class="nav-link">
                                                <i class="icon-diamond"></i>
                                                <span class="title">MANAGE CLIENT</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
        <!-- ----------------------------END CLIENTS---------------------------------------- --> 
        <!-- -------------------------Start PRODUCTS---------------------------------------- --> 
                                 <li class="nav-item" style="display:none;">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                     <i class="fa-solid fa-truck-medical" style="color:white!important;"></i>
                                        <span class="title">PRODUCTS</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu" >
                                        <li class="nav-item" style="display:none;">
                                            <a href="{{URL::to('addCategory')}}" class="nav-link">
                                                <i class="icon-diamond"></i>
                                                <span class="title">ADD CATEGORY</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{URL::to('manageCategory')}}" class="nav-link">
                                                <i class="fa-solid fa-table-list" style="color:white!important;"></i>
                                                <span class="title">CATEGORY</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" style="display:none;">
                                            <a href="{{URL::to('addSubCategory')}}" class="nav-link">
                                                <i class="icon-diamond"></i>
                                                <span class="title">ADD CATEGORY</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{URL::to('manageSubCategory')}}" class="nav-link">
                                                <i class="fa-solid fa-table-list" style="color:white!important;"></i>
                                                <span class="title">SUB CATEGORY</span>
                                            </a>
                                        </li>
                                        <li class="nav-item"style="display:none;">
                                            <a href="{{URL::to('addProduct')}}" class="nav-link">
                                                <i class="icon-diamond"></i>
                                                <span class="title">ADD PRODUCT</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{URL::to('manageProduct')}}" class="nav-link">
                                              <i class="fa-solid fa-truck-medical" style="color:white!important;"></i>
                                                <span class="title">PRODUCCT</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
        <!-- ---------------------------END PRODUCTS--------------------------------------- --> 
        <!-- ----------------------------------Start OFFICER------------------------------- -->
                             <li class="nav-item" style="display:none;">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-diamond"></i>
                                        <span class="title">OFFICER</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="{{URL::to('addOfficer')}}" class="nav-link">
                                                <i class="icon-diamond"></i>
                                                <span class="title">ADD OFFICER</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{URL::to('manageOfficer')}}" class="nav-link">
                                                <i class="icon-diamond"></i>
                                                <span class="title">MANAGE OFFICER</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
        <!-- ---------------------------END OFFICER---------------------------------------- -->
        <!-- ---------------------------------Start SERVICES------------------------------- -->
                             <li class="nav-item" style="display:none;">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-diamond"></i>
                                        <span class="title">SERVICES</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="{{URL::to('addService')}}" class="nav-link">
                                                <i class="icon-diamond"></i>
                                                <span class="title">ADD SERVICE</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{URL::to('manageService')}}" class="nav-link">
                                                <i class="icon-diamond"></i>
                                                <span class="title">MANAGE SERVICE</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
        <!-- --------------------------END SERVICES---------------------------------------- --> 
        <!-- ----------------------------Start WEB CLIENT---------------------------------- -->
                                          <li class="nav-item">
                                            <a href="{{URL::to('web_client')}}" class="nav-link">
                                               <i class="fa-solid fa-globe"style="color:white!important;"></i>
                                                <span class="title">WEB CLIENT</span>
                                            </a>
                                        </li>
                                          <li class="nav-item">
                                            <a href="{{URL::to('web_message')}}" class="nav-link">
                                               <i class="fa-solid fa-globe"style="color:white!important;"></i>
                                                <span class="title">WEB MESSAGE</span>
                                            </a>
                                        </li>
        <!-- -------------------------------End WEB CLIENT---------------------------------- --> 
        <!-- ---------------------------------Start FOOTER---------------------------------- -->
                                          <li class="nav-item">
                                            <a href="{{URL::to('footer')}}" class="nav-link">
                                                <i class="fa-solid fa-shoe-prints" style="color:white!important;"></i>
                                                <span class="title">FOOTER</span>
                                            </a>
                                        </li>
        <!-- ------------------------------------End FOOTER---------------------------------- -->
                              
                               <li class="nav-item start">
                                <a href="{{URL::to('managerLogout')}}" class="nav-link ">
                                    <i class="fa-solid fa-key" style="color:white!important;"></i>
                                    <span class="title" style="color:white!important;">LOG OUT</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->

                        <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->
                    </div><!-- END PAGE CONTENT BODY -->
                </div><!-- END PAGE CONTENT -->
            </div><!-- END CONTAINER -->

                <!-- BEGIN QUICK SIDEBAR -->
                <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-login"></i>
                </a>
                <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                    <div class="page-quick-sidebar">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                                    <span class="badge badge-danger">2</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                                    <span class="badge badge-success">7</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-bell"></i> Alerts </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-info"></i> Notifications </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-speech"></i> Activities </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-settings"></i> Settings </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                                <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                    <h3 class="list-heading">Staff</h3>
                                    <ul class="media-list list-items">
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-success">8</span>
                                            </div>
                                            <img class="media-object" src="public/assets/layouts/layout/img/avatar3.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Bob Nilson</h4>
                                                <div class="media-heading-sub"> Project Manager </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="media-object" src="public/assets/layouts/layout/img/avatar1.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Nick Larson</h4>
                                                <div class="media-heading-sub"> Art Director </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-danger">3</span>
                                            </div>
                                            <img class="media-object" src="public/assets/layouts/layout/img/avatar4.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Deon Hubert</h4>
                                                <div class="media-heading-sub"> CTO </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="media-object" src="public/assets/layouts/layout/img/avatar2.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ella Wong</h4>
                                                <div class="media-heading-sub"> CEO </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <h3 class="list-heading">Customers</h3>
                                    <ul class="media-list list-items">
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-warning">2</span>
                                            </div>
                                            <img class="media-object" src="public/assets/layouts/layout/img/avatar6.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Lara Kunis</h4>
                                                <div class="media-heading-sub"> CEO, Loop Inc </div>
                                                <div class="media-heading-small"> Last seen 03:10 AM </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="label label-sm label-success">new</span>
                                            </div>
                                            <img class="media-object" src="public/assets/layouts/layout/img/avatar7.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ernie Kyllonen</h4>
                                                <div class="media-heading-sub"> Project Manager,
                                                    <br> SmartBizz PTL </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="media-object" src="public/assets/layouts/layout/img/avatar8.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Lisa Stone</h4>
                                                <div class="media-heading-sub"> CTO, Keort Inc </div>
                                                <div class="media-heading-small"> Last seen 13:10 PM </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-success">7</span>
                                            </div>
                                            <img class="media-object" src="public/assets/layouts/layout/img/avatar9.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Deon Portalatin</h4>
                                                <div class="media-heading-sub"> CFO, H&D LTD </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="media-object" src="public/assets/layouts/layout/img/avatar10.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Irina Savikova</h4>
                                                <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-danger">4</span>
                                            </div>
                                            <img class="media-object" src="public/assets/layouts/layout/img/avatar11.jpg" alt="...">
                                            <div class="media-body">
                                                <h4 class="media-heading">Maria Gomez</h4>
                                                <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                                <div class="media-heading-small"> Last seen 03:10 AM </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="page-quick-sidebar-item">
                                    <div class="page-quick-sidebar-chat-user">
                                        <div class="page-quick-sidebar-nav">
                                            <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                                <i class="icon-arrow-left"></i>Back</a>
                                        </div>
                                        <div class="page-quick-sidebar-chat-user-messages">
                                            <div class="post out">
                                                <img class="avatar" alt="" src="public/assets/layouts/layout/img/avatar3.jpg" />
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:15</span>
                                                    <span class="body"> When could you send me the report ? </span>
                                                </div>
                                            </div>
                                            <div class="post in">
                                                <img class="avatar" alt="" src="public/assets/layouts/layout/img/avatar2.jpg" />
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                    <span class="datetime">20:15</span>
                                                    <span class="body"> Its almost done. I will be sending it shortly </span>
                                                </div>
                                            </div>
                                            <div class="post out">
                                                <img class="avatar" alt="" src="public/assets/layouts/layout/img/avatar3.jpg" />
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:15</span>
                                                    <span class="body"> Alright. Thanks! :) </span>
                                                </div>
                                            </div>
                                            <div class="post in">
                                                <img class="avatar" alt="" src="public/assets/layouts/layout/img/avatar2.jpg" />
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                    <span class="datetime">20:16</span>
                                                    <span class="body"> You are most welcome. Sorry for the delay. </span>
                                                </div>
                                            </div>
                                            <div class="post out">
                                                <img class="avatar" alt="" src="public/assets/layouts/layout/img/avatar3.jpg" />
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:17</span>
                                                    <span class="body"> No probs. Just take your time :) </span>
                                                </div>
                                            </div>
                                            <div class="post in">
                                                <img class="avatar" alt="" src="public/assets/layouts/layout/img/avatar2.jpg" />
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                    <span class="datetime">20:40</span>
                                                    <span class="body"> Alright. I just emailed it to you. </span>
                                                </div>
                                            </div>
                                            <div class="post out">
                                                <img class="avatar" alt="" src="public/assets/layouts/layout/img/avatar3.jpg" />
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:17</span>
                                                    <span class="body"> Great! Thanks. Will check it right away. </span>
                                                </div>
                                            </div>
                                            <div class="post in">
                                                <img class="avatar" alt="" src="public/assets/layouts/layout/img/avatar2.jpg" />
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Ella Wong</a>
                                                    <span class="datetime">20:40</span>
                                                    <span class="body"> Please let me know if you have any comment. </span>
                                                </div>
                                            </div>
                                            <div class="post out">
                                                <img class="avatar" alt="" src="public/assets/layouts/layout/img/avatar3.jpg" />
                                                <div class="message">
                                                    <span class="arrow"></span>
                                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                                    <span class="datetime">20:17</span>
                                                    <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="page-quick-sidebar-chat-user-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Type a message here...">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn green">
                                                        <i class="icon-paper-clip"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                                <div class="page-quick-sidebar-alerts-list">
                                    <h3 class="list-heading">General</h3>
                                    <ul class="feeds list-items">
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> You have 4 pending tasks.
                                                            <span class="label label-sm label-warning "> Take action
                                                                <i class="fa fa-share"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> Just now </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-bar-chart-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 20 mins </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 24 mins </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> New order received with
                                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 30 mins </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 24 mins </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Web server hardware needs to be upgraded.
                                                            <span class="label label-sm label-warning"> Overdue </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 2 hours </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-briefcase"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 20 mins </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <h3 class="list-heading">System</h3>
                                    <ul class="feeds list-items">
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> You have 4 pending tasks.
                                                            <span class="label label-sm label-warning "> Take action
                                                                <i class="fa fa-share"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> Just now </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-danger">
                                                                <i class="fa fa-bar-chart-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 20 mins </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-default">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 24 mins </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> New order received with
                                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 30 mins </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 24 mins </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Web server hardware needs to be upgraded.
                                                            <span class="label label-sm label-default "> Overdue </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 2 hours </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-briefcase"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 20 mins </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                                <div class="page-quick-sidebar-settings-list">
                                    <h3 class="list-heading">General Settings</h3>
                                    <ul class="list-items borderless">
                                        <li> Enable Notifications
                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                        <li> Allow Tracking
                                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                        <li> Log Errors
                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                        <li> Auto Sumbit Issues
                                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                        <li> Enable SMS Alerts
                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    </ul>
                                    <h3 class="list-heading">System Settings</h3>
                                    <ul class="list-items borderless">
                                        <li> Security Level
                                            <select class="form-control input-inline input-sm input-small">
                                                <option value="1">Normal</option>
                                                <option value="2" selected>Medium</option>
                                                <option value="e">High</option>
                                            </select>
                                        </li>
                                        <li> Failed Email Attempts
                                            <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                                        <li> Secondary SMTP Port
                                            <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                                        <li> Notify On System Error
                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                        <li> Notify On SMTP Error
                                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    </ul>
                                    <div class="inner-content">
                                        <button class="btn btn-success">
                                            <i class="icon-settings"></i> Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                        </div>
        
                <!-- END QUICK SIDEBAR -->
                   @yield ('content')
            </div>
            <!-- END CONTAINER -->

            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> <?php echo date('Y') ;?> &copy; <span style="font-family:'SolaimanLipi','Arial';font-size:16px;font-weight:bold;"><?php echo $company_name_setting_query->company_name ;?></span>
                   &nbsp;|&nbsp;Developed By:&nbsp;<a style="text-decoration:none;color:#ed7000 !important;font-weight:bold;" href="https://numericsoftbd.com/" target="_blank"><b>NUMERIC SOFTWARE</b></a>
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!-- BEGIN QUICK NAV -->
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{URL::to('public/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
             <script src="{{URL::to('public/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{URL::to('public/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <!--<script src="{{URL::to('public/assets/global/plugins/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>-->
        <!-- <script src="{{URL::to('public/assets/global/plugins/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{URL::to('public/assets/global/plugins/amcharts/amcharts/pie.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{URL::to('public/assets/global/plugins/amcharts/amcharts/radar.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{URL::to('public/assets/global/plugins/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{URL::to('public/assets/global/plugins/amcharts/amcharts/themes/patterns.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{URL::to('public/assets/global/plugins/amcharts/amcharts/themes/chalk.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{URL::to('public/assets/global/plugins/amcharts/ammap/ammap.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{URL::to('public/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{URL::to('public/assets/global/plugins/amcharts/amstockcharts/amstock.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{URL::to('public/assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>-->
        <script src="{{URL::to('public/assets/global/plugins/horizontal-timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
        <!--<script src="{{URL::to('public/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>-->
        <script src="{{URL::to('public/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
        <!--<script src="{{URL::to('public/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{URL::to('public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{URL::to('public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>-->
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- data table -->
        <script src="{{URL::to('public/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>

        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{URL::to('public/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <script src="{{URL::to('public/assets/pages/scripts/table-datatables-responsive.min.js')}}" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{URL::to('public/assets/pages/scripts/table-datatables-editable.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{URL::to('public/assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{URL::to('public/assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{URL::to('public/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/clockface/js/clockface.js')}}" type="text/javascript"></script>
          <script src="{{URL::to('public/assets/bootstrap-select.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!--     Summernote         -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


        <!-- END PAGE LEVEL PLUGINS -->

        <script>
          // Text Editor
            $(document).ready(function() {
                $('#summernote').summernote();
            });
               $(document).ready(function() {
                $('#short_des').summernote();
            });
        </script>

    <!--     <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script> -->
    </body>

</html>
 @yield ('js')
