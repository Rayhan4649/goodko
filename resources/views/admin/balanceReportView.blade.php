@extends('admin.masterAdmin')
@section('content')
 <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">BALANCE MINI REPORT</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                       
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row widget-row">
                            <div class="col-md-4">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">Petty Cash Balance</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon bg-green icon-bulb"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">TK</span>
                                            <span class="widget-thumb-body-stat"><?php echo $pettycash ; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                            <div class="col-md-4">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">TOTAL BANK BALANCE</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon bg-red icon-layers"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">TK</span>
                                            <span class="widget-thumb-body-stat"><?php echo number_format($total_bank_balance,2) ; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                            <div class="col-md-4">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">TOTAL MOBILE BANK BALANCE</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">TK</span>
                                            <span class="widget-thumb-body-stat"><?php echo number_format($total_mobile_bank_balance,2) ; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                           
                        </div>
                        <div class="row">
                        <div class="col-md-6">  <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <span class="caption-subject bold uppercase">
                                             BANK BALANCE LIST
                                            </span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body">
                                         <div class="header">
                                
                                     </div>
                                        <div class="table-responsive">
                                        <table class="table table-bordered">
                                              <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Bank</th>
                                                    <th>Bank Branch</th>
                                                    <th>A/C Name</th>
                                                    <th>A/C No</th>
                                                    <th>Current Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php 
                                             $i = 1 ;
                                             foreach ($bank as $banks){ ?>
                                                <tr>
                                                    <td><?php echo $i++ ;?></td>
                                                    <td><?php echo $banks->bank_name ;?></td>
                                                    <td><?php echo $banks->branch ;?></td>
                                                    <td><?php echo $banks->account_name ;?></td>
                                                    <td><?php echo $banks->account_no ;?></td>
                                                    <td align="right"><?php echo $banks->total_balance ;?></td>
                                                </tr>
                                                <?php } ?>
                                 

                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                            </div>

                         <div class="col-md-6">
                              <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <span class="caption-subject bold uppercase">
                                            MOBILE BANK BALANCE LIST
                                            </span>
                                        </div>
                                      
                                    </div>
                                    <div class="portlet-body">
                                         <div class="header">
                                
                                     </div>
                                        <div class="table-responsive">
                                        <table class="table table-bordered">
                                              <thead>
                                                    <th>Sl No</th>
                                                    <th>Mobile Bank</th>
                                                    <th>Account Number</th>
                                                    <th>Current Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           <?php 
                                             $i = 1 ;
                                             foreach ($mobile as $mobiles){ ?>
                                                <tr>
                                                    <td><?php echo $i++ ;?></td>
                                                    <td><?php echo $mobiles->mobile_bank_name ;?></td>
                                                    <td><?php echo $mobiles->account_no ;?></td>
                                                    <td><?php echo $mobiles->total_balance ;?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                            </div>


                         </div>
                        </div>

  


                  <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->
                    </div><!-- END PAGE CONTENT BODY -->
                </div><!-- END PAGE CONTENT -->             
            </div><!-- END CONTAINER -->
@endsection