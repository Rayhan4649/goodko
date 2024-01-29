<?php
$admin_id       = Session::get('admin_id');
$type           = Session::get('type');

       if($admin_id == null && $type == null){
       return Redirect::to('/admin')->send();
       exit();
        }

       if($admin_id == null && $type != '1'){
       return Redirect::to('/admin')->send();
       exit();
        }

        if($type != '1'){
       return Redirect::to('/admin')->send();
       exit();
        }

        ?>
<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>POS</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{URL::to('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{URL::to('public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/global/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <link href="{{URL::to('public/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{URL::to('public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{URL::to('public/assets/global/css/components-rounded.css')}}" rel="stylesheet" id="style_components" type="text/css" />
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
        <link href="{{URL::to('public/assets/layouts/layout/css/personal.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('public/assets/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
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

        @font-face {
        font-family: SolaimanLipi;
        src: local('SolaimanLipi'),
             url('<?php echo URL::to('public/assets/fonts/solaimanlipi.woff'); ?>') format('woff'),
             url('<?php echo URL::to('public/assets/fonts/solaimanlipi.woff2'); ?>') format('woff2');
        }

        i{
            color: white!important;
        }
        span.title{
           color:white;
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
        </style>
    </head>
    <!-- END HEAD -->
    <body style="font-family:'SolaimanLipi','Arial';" class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-fixed" style="text-transform: uppercase;">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top" style="background: #4267B2;">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">

                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{ URL::to('/adminDashboard') }}">
                            <img src="{{ URL::to('public/assets/layouts/layout/img/logo.png') }}" alt="logo" class="logo-default" /> </a>
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

                    <a href="javascript:;" class="hidden-xs" style="text-decoration: none;">
                         <span  style="font-size: 30px;color: white;">

                            <?php
                              $company_name_setting_query = DB::table('setting')->first();
                              echo $company_name_setting_query->company_name ;

                            ?>
                     </span>
                    </a>
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN SALES NOTIFICATION -->
                            <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                                   <li style="padding-top: 11px;padding-right: 8px;">
                                    <span style="color:white;">
                                    <a href="{{URL::to('databaseBackup')}}" class="nav-link ">
                                    <span class="title" style="color: yellow">ব্যাকআপ ডাটাবেস</span>
                                    <span class="selected"></span>
                                </a>
                                    </span>

                            </li>
                             <li style="padding-top: 11px;padding-right: 8px;display: none;">
                                    <span style="color:white;">Cash :<?php $count = DB::table('pettycash')->where('branch_id',0)->count();
                                    if($count > 0){
                                    $cash = DB::table('pettycash')->where('branch_id',0)->first();
                                    echo $cash->pettycash_amount ;
                                }else{
                                    echo '0.00';
                                }
                                    ?>
                                    </span>

                            </li>
                            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="{{URL::to('managerBalanceTransferReceiveByAdmin')}}" class="dropdown-toggle">

                                    <i class="icon-bell"></i>
                                    <span class="badge badge-danger"> <?php
                                      $count_balance = DB::table('balance_transfer')->where('status',0)->count();
                                      echo $count_balance ;
                                    ?></span>
                                </a>

                            </li>
                            <!-- END SALES NOTIFICATION -->

                            <!-- BEGIN BANK TRANSANCTION NOTIFICATION -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-envelope-open"></i>
                                    <span class="badge badge-default">
                                        <?php
                                        date_default_timezone_set('Asia/Dhaka');
                                        $rcdate       = date('Y-m-d');
                                      $count_sale = DB::table('sale')->where('sale_date', $rcdate)->count();
                                      echo $count_sale ;
                                    ?> </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>Today Sale
                                            <span class="bold"><?php echo $count_sale ;?></span> <?php if($count_sale > 1){echo "Invoices";}else{echo "Invoice";}?> </h3>
                                        <!--<a href="app_inbox.html">view all</a>-->
                                    </li>
                                </ul>
                            </li>
                            <!-- END BANK TRANSANCTION NOTIFICATION -->

                            <!-- BEGIN COLLECTION NOTIFICATION -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-envelope-open"></i>
                                    <span class="badge badge-primary">
                                        <?php $count_collection = DB::table('collection')->where('created_at', $rcdate)->count();
                                      echo $count_collection ; ?> </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>You have
                                            <span class="bold"><?php echo $count_collection ;?></span> <?php if($count_collection > 1){echo "Payment Collections";}else{echo "Payment Collection";}?></h3>
                                        <!--<a href="app_inbox.html">view all</a>-->
                                    </li>

                                </ul>
                            </li>
                            <!-- END COLLECTION NOTIFICATION -->

                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <?php if(Session::get('photo') != '' ):?>
                                      <img alt="" class="img-circle" src="<?php echo Session::get('photo') ; ?>" />
                                    <?php else:?>
                                     <img alt="" class="img-circle" src="public/assets/layouts/layout/img/avatar.jpg" />
                                    <?php endif;?>

                                    <span class="username username-hide-on-mobile"><?php echo Session::get('admin_name'); ?>  </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">

                                    <li>
                                        <a href="{{URL::to('adminChangePassword')}}">
                                            <i class="icon-calendar"></i> Change Password </a>
                                    </li>

                                    <li>
                                        <a href="{{URL::to('adminLogout')}}">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!--<li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <i class="icon-logout"></i>
                                </a>
                            </li>-->
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
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse" style="background: #13537e;">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="false" data-slide-speed="200" style="padding-top: 20px;">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <?php $pettycash_insert_count = DB::table('pettycash')->count();?>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                            <?php if($pettycash_insert_count == '0'){?>
                            <li class="nav-item start">
                                <a href="{{URL::to('addAdminOpeningBalance')}}" class="nav-link ">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">SOFTWARE START</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                        <?php } ?>
                            <?php if($pettycash_insert_count > '0'){?>
                            <li class="nav-item start">
                                <a href="{{URL::to('adminDashboard')}}" class="nav-link ">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">DASHBOARD</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="nav-item start">
                                <a href="{{ URL::to('balanceReport') }}" class="nav-link">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">BALANCE REPORT</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="nav-item start">
                                <a href="{{URL::to('adminBalanceSheet')}}" class="nav-link ">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">BALANCE SHEET</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">CUSTOMER THANA</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('addCustomerThana')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Add Thana</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageCustomerThana')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Manage Thana</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">LEDGER</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('customerLedger')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Customer Ledger</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{URL::to('supplierLedger')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Supplier Ledger</span>
                                        </a>
                                    </li>

                                       <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('combineLedger')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">যৌথ লেজার</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('investorLedger')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Investor Ledger</span>
                                        </a>
                                    </li>
                                     <li class="nav-item" style="display: none;">
                                        <a href="{{URL::to('lendLedger')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Lend Ledger</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">REPORTS</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item" style="display: none;">
                                        <a href="{{URL::to('adminIncomeReport')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ইনকাম স্টেটমেন্ট</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display: none;">
                                        <a href="{{URL::to('adminProfitCostReport')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">লাভের প্রতিবেদন</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('adminNetProfitLoseReport')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Net Profit/Lose Report</span>
                                        </a>
                                    </li>
                                    <li class="nav-item"  style="display:none;">
                                        <a href="{{URL::to('adminSaleProfitReport')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">বিক্রয় লাভের প্রতিবেদন</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('availableStock')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Current Stock</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('adminPurchaseReport')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Purchase </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('adminSalesReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Sale </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{URL::to('adminCategoryWiseSalesReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Category Sale</span>
                                        </a>
                                    </li>

                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('adminSupplierPaymentReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">পেমেন্ট প্রতিবেদন</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display: none;">
                                        <a href="{{URL::to('adminSupplierCashReceiveReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">সাপ্লায়ার নগদ গ্রহণ রিসিভ প্রতিবেদন</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('adminCollectionReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">কালেকশন প্রতিবেদন </span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('adminExpenseReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">খরচের প্রতিবেদন</span>
                                        </a>
                                    </li>
                                      <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('adminInvestorReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">বিনিয়োগকারী প্রতিবেদন</span>
                                        </a>
                                    </li>

                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('adminBankStatement')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ব্যাংক লেনদেন</span>
                                        </a>
                                    </li>
                                      <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('adminBankToCashReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ব্যাংক থেকে ক্যাশ প্রতিবেদন</span>
                                        </a>
                                    </li>
                                        <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('adminCashToBankReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> ক্যাশ থেকে  ব্যাংক প্রতিবেদন</span>
                                        </a>
                                    </li>

                                <li class="nav-item"  style="display:none;">
                                        <a href="{{URL::to('adminBankLoanBankStatement')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">লোন ব্যাংক লেনদেন</span>
                                        </a>
                                    </li>
                                          <li class="nav-item"  style="display:none;">
                                        <a href="{{URL::to('adminBankLoanBankStatementReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">লোন ব্যাংক স্টেটমেন্ট</span>
                                        </a>
                                    </li>
                                           <li class="nav-item"  style="display:none;">
                                        <a href="{{URL::to('adminProductionReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">উৎপাদন প্রতিবেদন</span>
                                        </a>
                                    </li>

                                       <li class="nav-item" style="display: none;">
                                        <a href="{{URL::to('adminMobileToCashReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">মোবাইল থেকে ক্যাশ প্রতিবেদন</span>
                                        </a>
                                    </li>
                                    <li class="nav-item"  style="display:none;">
                                        <a href="{{URL::to('monthlyCurrentSalarySheet')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">মাসিক কর্মী বেতন শীট</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('adminSalaryReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">বেতন প্রতিবেদন</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('adminAdvanceSalaryReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">অগ্রিম বেতন প্রতিবেদন</span>
                                        </a>
                                    </li>
                                    <li class="nav-item"  style="display:none;">
                                        <a href="{{URL::to('adminLendReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ধার প্রতিবেদন</span>
                                        </a>
                                    </li>

                                    <li class="nav-item"  style="display:none;">
                                        <a href="{{URL::to('adminAllCustomerDueReport')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">সকল কাস্টমারের বাকি</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">BRANCH / MANAGER</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('addBranch')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Add Branch</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageBranch')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Manage Branch</span>
                                        </a>
                                    </li>
                                      <li class="nav-item">
                                        <a href="{{URL::to('addBranchManager')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Add Branch Manager</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageBranchManager')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Manage Branch Manager</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('addSr')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Add SR</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageSr')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Manage SR</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                                <li class="nav-item" style="display: none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">প্রডাক্ট</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                      <li class="nav-item">
                                        <a href="{{URL::to('addBrand')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ব্র্যান্ড যুক্ত </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageBrand')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ব্র্যান্ড ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                                                        <li class="nav-item">
                                        <a href="{{URL::to('addCategory')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ক্যাটেগরী যুক্ত</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageCategory')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ক্যাটেগরী ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                        <li class="nav-item">
                                        <a href="{{URL::to('addUnit')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ইউনিট যুক্ত</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageUnit')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ইউনিট ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                      <li class="nav-item">
                                        <a href="{{URL::to('addColor')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">কালার যুক্ত</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageColor')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">কালার ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('addWarranty')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ওয়্যারেন্টি যুক্ত</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageWarranty')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ওয়্যারেন্টি ব্যবস্থাপনা </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('addProduct')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">প্রডাক্ট যুক্ত</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageProduct')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">প্রডাক্ট ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                        <li class="nav-item">
                                        <a href="{{URL::to('addProductionPercentage')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">উতপাদন প্রডাক্ট শতাংশ যু্ক্ত</span>
                                        </a>
                                    </li>
                                        <li class="nav-item">
                                        <a href="{{URL::to('manageProductionPercentage')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">উতপাদন প্রডাক্ট শতাংশ ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                           <li class="nav-item" style="display: none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">বিনিয়োগ</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('addInvestor')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">বিনিয়োগকারী যুক্ত </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageInvestor')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">বিনিয়োগকারী ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('receiveInvestorAmount')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">বিনিয়োগ গ্রহণ</span>
                                        </a>
                                    </li>
                                     <li class="nav-item">
                                        <a href="{{URL::to('manageReceiveInvestorAmount')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> গ্রহণকৃত বিনিয়োগ ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('returnInvestorAmount')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">বিনিয়োগ ফেরৎ দিন</span>
                                        </a>
                                    </li>
                                      <li class="nav-item">
                                        <a href="{{URL::to('manageReturnInvestorAmount')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">বিনিয়োগ ফেরৎ ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                     <li class="nav-item">
                                        <a href="{{URL::to('profitAmountToInvestor')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">লভ্যাংশ প্রদান</span>
                                        </a>
                                    </li>
                                      <li class="nav-item">
                                        <a href="{{URL::to('manageprofitAmountToInvestor')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">লভ্যাংশ প্রদান ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item" style="display: none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">ব্যাংক</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('addBank')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ব্যাংক যুক্ত </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageBank')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ব্যাংক ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                                                        <li class="nav-item">
                                        <a href="{{URL::to('cashToBankTransaction')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ক্যাশ থেকে ব্যাংক লেনদেন</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageCashToBank')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ক্যাশ থেকে ব্যাংক লেনদেন ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('bankToCashTransaction')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ব্যাংক থেকে ক্যাশ লেনদেন</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageBankToCash')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ব্যাংক থেকে ক্যাশ লেনদেন ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                <li class="nav-item">
                                        <a href="{{URL::to('addBankInterestAmt')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> ব্যাংক হতে সুদ প্রাপ্তি</span>
                                        </a>
                                    </li>

                                       <li class="nav-item">
                                        <a href="{{URL::to('manageBankInterestAmt')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> ব্যাংক হতে সুদ প্রাপ্তি ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                       <li class="nav-item">
                                        <a href="{{URL::to('addBankCutAmt')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ব্যাংক কর্তৃক কর্তনকৃত অর্থ</span>
                                        </a>
                                    </li>
                                        <li class="nav-item">
                                        <a href="{{URL::to('manageBankCutAmt')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ব্যাংক কর্তৃক কর্তনকৃত অর্থ ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{URL::to('getLoanFromBank')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> ব্যাংক হতে লোন গ্রহন</span>
                                        </a>
                                    </li>
                                      <li class="nav-item">
                                        <a href="{{URL::to('getLoanFromBankManage')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> ব্যাংক হতে লোন ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                          <li class="nav-item">
                                        <a href="{{URL::to('returnGetLoanFromBank')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> ব্যাংক লোন ফেরত</span>
                                        </a>
                                    </li>
                                          <li class="nav-item">
                                        <a href="{{URL::to('returnGetLoanFromBankManage')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> ব্যাংক লোন ফেরত ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                        <li class="nav-item">
                                        <a href="{{URL::to('paymentInterestOfBankLoan')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> লোন সুদ প্রদান</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{URL::to('managePaymentInterestOfBankLoan')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> লোন সুদ প্রদান ব্যবস্থাপনা </span>
                                        </a>
                                    </li>

                                       <li class="nav-item">
                                        <a href="{{URL::to('dailyCCLoanInstalllment')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> সি সি লোন ইনন্সটলমেন্ট </span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                               <li class="nav-item" style="display: none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">স্টক</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('addStock')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">স্টক যুক্ত</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display: none;">
                                        <a href="{{URL::to('manageStock')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">সিরিয়াল প্রডাক্ট ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                     <li class="nav-item">
                                        <a href="{{URL::to('nonserialManageStock')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> স্টক প্রডাক্ট ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" style="display:none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">সাপ্লায়ার</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('addSupplier')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">সাপ্লায়ার যুক্ত</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageSupplier')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">সাপ্লায়ার ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{URL::to('supplierCustomerRelarion')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">সাপ্লায়ার কাষ্টমার রিলেশন</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{URL::to('manageSupplierCustomerRelarion')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">সাপ্লায়ার কাষ্টমার রিলেশন ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" style="display:none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">ক্রয়</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('addPurchase')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ক্রয় </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('managePurchase')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ক্রয় ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" style="display:none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">পেমেন্ট</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('supplierPayment')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">সাপ্লায়ার পেমেন্ট</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('managePayment')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">পেমেন্ট ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('supplierCashReceive')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">সাপ্লায়ার থেকে নগদ টাকা গ্রহণ</span>
                                        </a>
                                    </li>

                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('manageCashReceive')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">নগদ গ্রহণ ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" style="display: none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">ইনকাম/এক্সপেন্স</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('addIncomeExpenseCategory')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">পণ্যের ধরন</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageIncomeExpenseCategory')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">পণ্যের ধরন ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('makeIncomeExpense')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ইনকাম/এক্সপেন্স লেনদেন</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageIncomeExpense')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ইনকাম/এক্সপেন্স ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('adminIncomeExepnseStatement')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ইনকাম স্টেটমেন্ট</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" style="display:none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">খরচ / আয়</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('addExpenseCategory')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">খরচের ধরন যুক্ত</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageExpenseCategory')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">খরচের ধরন ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('addExpenseForm')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">খরচ</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageExpense')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">খরচ ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                       <li class="nav-item">
                                        <a href="{{URL::to('addIncomeCategory')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">আয়ের ধরন যুক্ত</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageIncomeCategory')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">আয়ের ধরন ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                           <li class="nav-item">
                                        <a href="{{URL::to('addIncomeForm')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">আয়</span>
                                        </a>
                                    </li>
                                        <li class="nav-item">
                                        <a href="{{URL::to('manageIncome')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">আয় ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                             
                                <li class="nav-item" style="display: none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">মোবাইল ব্যাংকিং</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('addMobileBank')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">মোবাইল ব্যাংক যুক্ত </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageMobileBank')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">মোবাইল ব্যাংক মুছুন</span>
                                        </a>
                                    </li>
                                     <li class="nav-item">
                                        <a href="{{URL::to('addMobileBankAccount')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">মোবাইল ব্যাংক অ্যাকাউন্ট যুক্ত </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item" style="display:none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">এইচআর ব্যবস্থাপনা</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item" style="display: none;">
                                        <a href="{{URL::to('addDesignation')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">এইচআর পদবি যুক্ত </span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display: none;">
                                        <a href="{{URL::to('manageDesignation')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">এইচআর পদবি যুক্ত ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display: none;">
                                        <a href="{{URL::to('addEmp')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">কর্মী যুক্ত</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display: none;">
                                        <a href="{{URL::to('manageEmp')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">কর্মী ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{URL::to('addDailyLabourCost')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">দৈনিক লোড/আনলোড হাজিরা যু্ক্ত</span>
                                        </a>
                                    </li> 

                                        <li class="nav-item">
                                        <a href="{{URL::to('dailyLabourCostList')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">দৈনিক লোড/আনলোড হাজিরা ব্যবস্থাপনা</span>
                                        </a>
                                    </li>  

                                    <li class="nav-item">
                                        <a href="{{URL::to('addNightShiftCost')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">রাত্রী শিফট যুক্ত</span>
                                        </a>
                                    </li> 

                                        <li class="nav-item">
                                        <a href="{{URL::to('manageNightShiftCost')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">রাত্রী শিফট ব্যবস্থাপনা</span>
                                        </a>
                                    </li>  

                                </ul>
                            </li>
                               <li class="nav-item" style="display:none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">হাজিরা</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('addDailyStaffAttendence')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">হাজিরা গ্রহন </span>
                                        </a>
                                    </li>
                                      <li class="nav-item">
                                        <a href="{{URL::to('manageDailyStaffAttendence')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">হাজিরা গ্রহন ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item" style="display:none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">বেতন</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('manageSalary')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">বেতন বৃদ্ধি / হ্রাস</span>
                                        </a>
                                    </li>

                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('salaryPaymentForm')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">বেতন দেওয়া</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('salaryManage')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">বেতন ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('advanceSalaryForm')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">অগ্রিম বেতন প্রদান</span>
                                        </a>
                                    </li>
                                     <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('manageAdvanceSalary')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">অগ্রিম বেতন প্রদান ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                     <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('advanceSalaryPaidForm')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">অগ্রিম বেতন ফেরত </span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('managePaidAdvanceSalary')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">অগ্রিম বেতন ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                     <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('dueAdvanceSalaryList')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> অগ্রিম বকেয়া বেতন</span>
                                        </a>
                                    </li>

                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('payDailyExchageLabourCost')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">দৈনিক বদলি হাজিরা প্রদান</span>
                                        </a>
                                    </li>
                                         <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('managePayDailyExchageLabourCost')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">দৈনিক বদলি হাজিরা প্রদান ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('payDailyLabourCost')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> দৈনিক লোড/আনলোড হাজিরা প্রদান</span>
                                        </a>
                                    </li>

                                       <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('managePayDailyLabourCost')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title"> দৈনিক লোড/আনলোড হাজিরা প্রদান ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                     <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('nightShiftLabourCost')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">  রাত্রী শিফট হাজিরা প্রদান</span>
                                        </a>
                                    </li>
                                      <li class="nav-item" style="display:none;">
                                        <a href="{{URL::to('manageNightShiftLabourCost')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">  রাত্রী শিফট হাজিরা ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item" style="display:none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">ধার</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('addBorrow')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ধার ব্যক্তি যুক্ত</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageBorrow')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ধার ব্যক্তি ব্যবস্থাপনা </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('sendMoneyToBorrow')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">টাকা ধার দেওয়া</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageSendMoneyToBorrow')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">টাকা ধার দেওয়া ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('receiveMoneyFromBorrow')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ধার টাকা গ্রহণ</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageReceiveMoneyFromBorrow')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ধার টাকা গ্রহণ ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                        <li class="nav-item">
                                        <a href="{{URL::to('profitAmountFromLendPerson')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">লভ্যাংশ গ্রহন</span>
                                        </a>
                                    </li>
                                      <li class="nav-item">
                                        <a href="{{URL::to('manageProfitAmountFromLendPerson')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">লভ্যাংশ গ্রহন ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                                <li class="nav-item" style="display:none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">কোম্পানী  কমিশন</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                       <li class="nav-item">
                                        <a href="{{URL::to('addCommissionNote')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">কমিশন নোট</span>
                                        </a>
                                    </li>
                                        <li class="nav-item">
                                        <a href="{{URL::to('manageCommissionNote')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">কমিশন নোট ব্যবস্থাপনা</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('addCommissionForm')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">কমিশন যুক্ত</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('manageCommission')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">কমিশন ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                                <li class="nav-item" style="display:none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title"> লেনদেন </span>
                                    <span class="arrow"></span>
                                </a>
                                <?php
                                 $count = DB::table('balance_transfer')->where('status',0)->count();
                                ?>
                                <ul class="sub-menu">
                                     <li class="nav-item">
                                        <a href="{{URL::to('managerBalanceTransferReceiveByAdmin')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">নগদ গ্রহণ <span style="color:red;">(<?php echo $count ;?>)</span></span>
                                        </a>
                                    </li>
                                     <li class="nav-item">
                                        <a href="{{URL::to('adminManageReceiveCash')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">নগদ গ্রহণ  ব্যবস্থাপনা</span>
                                        </a>
                                    </li>

                                     <li class="nav-item">
                                        <a href="{{URL::to('adminSendCashToManager')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ম্যানেজার কে ক্যাশ প্রদান</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('adminManageSendCash')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ক্যাশ প্রদান ব্যবস্থাপনা</span>
                                        </a>
                                    </li>


                                    <li class="nav-item" style="display: none;">
                                        <a href="{{URL::to('adminMobileToCashTransaction')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">মোবাইল থেকে ক্যাশ</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="display: none;">
                                        <a href="{{URL::to('manageAdminMobileToCashTransaction')}}" class="nav-link ">
                                            <i class="icon-diamond"></i>
                                            <span class="title">মোবাইল থেকে ক্যাশ মুছুন</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                         
                                <li class="nav-item" style="display:none;">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">ক্যাশবুক</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{URL::to('adminSelfFullCashbook')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">ফুল ক্যাশবুক</span>
                                        </a>
                                    </li>

                                     <li class="nav-item">
                                        <a href="{{URL::to('adminTodaySelfCashbook')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">আজকের ক্যাশবুক</span>
                                        </a>
                                    </li>
                                      <li class="nav-item">
                                        <a href="{{URL::to('adminDatewiseSelfCashbook')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">তারিখ অনুসারে নিজের ক্যাশবুক</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('adminOverAllFullCashbook')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">সমস্ত ক্যাশবুক</span>
                                        </a>
                                    </li>
                                      <li class="nav-item">
                                        <a href="{{URL::to('adminTodayOverAllCashbook')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">আজকের সমস্ত ক্যাশবুক</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('adminDateWiseOverAllCashbook')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">তারিখ অনুসারে সমস্ত ক্যাশবুক</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">SETTING</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                        <li class="nav-item">
                                        <a href="{{URL::to('stockAlert')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Stock Alert</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{URL::to('companyInfoSetting')}}" class="nav-link">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Company Info</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                          <li class="nav-item start">
                                <a href="{{URL::to('databaseBackup')}}" class="nav-link ">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">ব্যাকআপ ডাটাবেস</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                        <?php }?>

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
                    
                       
                    </div>
                </div>
                <!-- END QUICK SIDEBAR -->
                   @yield ('content')

            </div>
            <!-- END CONTAINER -->

            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> <?php echo date('Y') ;?> &copy; <span style="font-family:'SolaimanLipi','Arial';font-size:16px;font-weight:bold;"><?php echo $company_name_setting_query->company_name ;?></span>
                   &nbsp;|&nbsp;Developed by:&nbsp;<a style="text-decoration:none;color:#ed7000 !important;font-weight:bold;" href="https://asianitinc.com/" target="_blank"><b>ASIAN IT INC</b></a>
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
        <script src="{{URL::to('public/assets/global/plugins/horizontal-timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('public/assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>

        <script src="{{URL::to('public/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>

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

        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>

</html>
 @yield ('js')
