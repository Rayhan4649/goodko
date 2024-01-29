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
                                    <a href="index.html">Dashboard</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                            </ul>
                        </div>
                        <br>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row widget-row">
                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered" style="background:#E7505A;">
                                    <h4 style="font-family:'SolaimanLipi';font-size:15px;color:#fff;" class="widget-thumb-heading">Purchase Order Stock Value</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon" style="background:#555555;"><img src="{{ URL::to('public/images/dashboard.png') }}" alt="softxbd"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle" style="color:#fff;">TK</span>
                                            <span class="widget-thumb-body-stat" style="font-size: 15px;color:#fff;"><?php //echo $pettycash ; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered" style="background:#26C281;">
                                    <h4 style="font-family:'SolaimanLipi';font-size:15px;color:#fff;" class="widget-thumb-heading">Clossing Stock</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon" style="background:#555555;"><img src="{{ URL::to('public/images/dashboard.png') }}" alt="softxbd"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle" style="color:#fff;">TK</span>
                                            <span class="widget-thumb-body-stat" style="font-size: 15px;color:#fff;"><?php echo number_format($purchase_stock_value,2) ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered" style="background:#E87E04;">
                                    <h4 style="font-family:'SolaimanLipi';font-size:15px;color:#fff;" class="widget-thumb-heading">Production Completed Stock</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon" style="background:#555555;"><img src="{{ URL::to('public/images/dashboard.png') }}" alt="softxbd"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle" style="color:#fff;">TK</span>
                                            <span class="widget-thumb-body-stat" style="font-size: 15px;color:#fff;"><?php echo number_format($productoin_purchase_stock_value,2) ;?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered" style="background:#4B77BE;">
                                    <h4 style="font-family:'SolaimanLipi';font-size:15px;color:#fff;" class="widget-thumb-heading">All Sale Value</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon" style="background:#555555;"><img src="{{ URL::to('public/images/dashboard.png') }}" alt="softxbd"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle" style="color:#fff;">TK</span>
                                            <span class="widget-thumb-body-stat" style="font-size: 15px;color:#fff;"><?php echo number_format($sale_bill_payment,2); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                        </div>

                            <div class="row widget-row">
                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">Bank Balance</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon" style="background:#555555;"><img src="{{ URL::to('public/images/dashboard.png') }}" alt="softxbd"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">TK</span>
                                            <span class="widget-thumb-body-stat" style="font-size: 16px;;"><?php echo number_format($total_bank_balance,2) ; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">Sales Stokc Value</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon" style="background:#555555;"><img src="{{ URL::to('public/images/dashboard.png') }}" alt="softxbd"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">TK</span>
                                            <span class="widget-thumb-body-stat" style="font-size: 16px;;"><?php echo number_format($sale_stock_value,2) ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">Today Purchase Balance</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon" style="background:#555555;"><img src="{{ URL::to('public/images/dashboard.png') }}" alt="softxbd"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">TK</span>
                                            <span class="widget-thumb-body-stat" style="font-size: 16px;;"><?php echo number_format($total_today_purchase_amount,2) ;?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">Total Purchase Balance</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon" style="background:#555555;"><img src="{{ URL::to('public/images/dashboard.png') }}" alt="softxbd"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">TK</span>
                                            <span class="widget-thumb-body-stat" style="font-size: 16px;;"><?php echo number_format($total_purchase_amount,2); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                        </div>

                        <div class="row widget-row">
                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">Mobile Bank Balance</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon" style="background:#555555;"><img src="{{ URL::to('public/images/dashboard.png') }}" alt="softxbd"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">TK</span>
                                            <span class="widget-thumb-body-stat" style="font-size: 16px;;"><?php echo number_format($total_mobile_bank_balance,2) ; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">Supplier Due</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon" style="background:#555555;"><img src="{{ URL::to('public/images/dashboard.png') }}" alt="softxbd"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">TK</span>
                                            <span class="widget-thumb-body-stat" style="font-size: 16px;;"><?php echo number_format($total_supplier_due,2) ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">Customer Due</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon" style="background:#555555;"><img src="{{ URL::to('public/images/dashboard.png') }}" alt="softxbd"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle">TK</span>
                                            <span class="widget-thumb-body-stat" style="font-size: 16px;;"><?php echo number_format($total_customer_due,2) ;?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div>
                                       <div class="row">
                        <div class="col-md-6">  <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <span class="caption-subject bold uppercase">
                                            MAX PRODUCT SALE LIST   
                                            </span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body">
                                         <div class="header">
                                
                                     </div>
                                        <div class="table-responsive" style="background: #9ec0d4;">
                                        <table class="table table-bordered">
                                              <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Product</th>
                                                    <th>Sale Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $msi = 1 ;
                                                 foreach ($max_product_sale as $max_product_sale_value) { ?>
                                                <tr>
                                                    <td><?php echo $msi++ ; ?></td>
                                                    <td><?php echo $max_product_sale_value->product_name ;  ?></td>
                                                    <td align="right"><?php echo $max_product_sale_value->max_total_qty ;  ?></td>
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
                                            MAX CUSTOMER DUE
                                            </span>
                                        </div>
                                      
                                    </div>
                                    <div class="portlet-body">
                                         <div class="header">
                                
                                     </div>
                                        <div class="table-responsive" style="background: #e4b9c1;">
                                        <table class="table table-bordered">
                                              <thead>
                                                    <th>Sl</th>
                                                    <th>Customer Name</th>
                                                    <th>Mobile</th>
                                                    <th>Total Due Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php 
                                                 $mcd = 1 ;
                                                 foreach ($max_customer_due as $max_customer_due_value) { ?>
                                                <tr>
                                                    <td><?php echo $mcd++ ; ?></td>
                                                    <td><?php $custoemr_query_for_query = DB::table('customer')->where('id',$max_customer_due_value->customer_id)->first(); echo $custoemr_query_for_query->customer_name ;  ?></td>
                                                    <td><?php echo $custoemr_query_for_query->mobile ;?></td>
                                                    <td align="right"><?php echo $max_customer_due_value->total_due_amount ; ?></td>
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
