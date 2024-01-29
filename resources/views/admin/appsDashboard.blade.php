@extends('admin.masterApps')
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
                                <a href="{{URL::to('appsPartyCustomerLedger')}}" title="Ledger" class="btn btn-success btn-lg" style="margin-bottom: 10px;">Customer Ledger</a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{URL::to('appsPartyCollection')}}" title="Collection" class="btn btn-primary btn-lg" style="margin-bottom: 10px;">Collection</a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{URL::to('appsManagePartyCollection')}}" title="Collection" class="btn btn-primary btn-lg" style="margin-bottom: 10px;">Manage Collection</a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{URL::to('appsManagerCollectionReport')}}" title="Collection Reports" class="btn btn-warning btn-lg">Collection Reports</a>
                            </div>

                        </div>

        
                  <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->
                    </div><!-- END PAGE CONTENT BODY -->
                </div><!-- END PAGE CONTENT -->             
            </div><!-- END CONTAINER -->
@endsection