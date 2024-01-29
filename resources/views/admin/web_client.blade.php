          @extends('admin.masterManager')
          @section('content')
                <!-- BEGIN CONTENT -->
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                         <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                   Web Client List 
                                </li>
                            </ul>
                        </div>
                        <h1 class="page-title"></h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1--> 
     <?php if(Session::get('succes') != null) { ?>
   <div class="alert alert-info alert-dismissible" role="alert">
  <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
  <strong><?php echo Session::get('succes') ;  ?></strong>
  <?php Session::put('succes',null) ;  ?>
</div>
<?php } ?>
<?php
if(Session::get('failed') != null) { ?>
 <div class="alert alert-danger alert-dismissible" role="alert">
  <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
 <strong><?php echo Session::get('failed') ; ?></strong>
 <?php echo Session::put('failed',null) ; ?>
</div>
<?php } ?>

  @if (count($errors) > 0)
    @foreach ($errors->all() as $error)      
 <div class="alert alert-danger alert-dismissible" role="alert">
   <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
  <strong>{{ $error }}</strong>
</div>
@endforeach
@endif
<div class="row">
 
                            <div class="col-md-12">
                                 
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase" style="text-align:right;">Web Client List</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body ">
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Time & Date</th>
                                                    <th>Client Name </th> 
                                                    <th>Client Email </th>
                                                    <th>Client Number </th>
                                                    <th>Client  Company</th>
                                                    <th>Address </th>
                                                    <th>CLient Message</th>      
                                                    <th style="display:none;">Delete</th>                                     
                                                </tr>
                                            </thead>
                                             <tbody>
                                                <?php $i = 1 ;
                                                foreach ($result as $value) { ?>
                                                <tr>
                                                    <td><?php echo $i++ ;?></td>
                                                    <td><?php echo date('h:i:s a',strtotime($value->created_time))  ; ?><br><?php echo $value->created_at ;?></td>
                                                    <td><?php echo $value->name ; ?></td>
                                                    <td><?php echo $value->email ; ?></td>
                                                    <td><?php echo $value->number ; ?></td>
                                                    <td><?php echo $value->your_company ; ?></td>
                                                    <td><?php echo $value->permanent_address ; ?></td>
                                                               
                                                    <td><?php echo $value->remarks ; ?></td>              
                                                    <td style="display:none;">
                                                    <a href="{{URL::to('deleteInfo/'.$value->id)}}" title="">
                                                    <button type="button" class="btn btn-danger btn-sm">DELETE</button>
                                                    </a>
                                                    </td>                                                        
                                                </tr>
                                                <?php } ?>
                                            
                                            </tbody>
                                        </table> 
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->
                    </div><!-- END PAGE CONTENT BODY -->
                </div><!-- END PAGE CONTENT -->             
            </div><!-- END CONTAINER -->
@endsection