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
                                   Header List
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
                                            <span class="caption-subject bold uppercase" style="text-align:right;">HEADER MENU List</span>
                                        </div>
                                        <div class="tools">
                                            <a href="{{URL::to('addHeaderMenu')}}" title="Add">
                                                            <button type="button" id="add_button" class="btn btn-warning btn-sm"> <i class="fa-solid fa-circle-plus"></i>NEW HEADER MENU</button>
                                                        </a>  </div>
                                            
                                    </div>
                                    <div class="portlet-body ">
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                    <th>Sl NO</th>
                                                    <th>HEADER MENU </th> 
                                                    <th>PAGE SETUP </th> 
                                                    <th>ACTION </th>
                                                    <th>EDIT </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ;
                                                foreach ($result as $value) { ?>
                                                <tr>
                                                    <td><?php echo $i++ ;?></td>
                                                    <td><?php echo $value->h_menu_name ; ?></td>
                                                      <td> 
                                                        <?php if($value->status == "1"):?>
                                                        
                                                    <a href="{{URL::to('headerMenuPageSetup/'.$value->id)}}" title="">
                                                    <button type="button" class="btn btn-info btn-sm">PAGE SETUP</button>
                                                    </a>
                                                <?php else: ?>
                                                    <span style="color:green;">Continue For Main Menu</span>
                                                <?php endif;?>
                                                </td>
                                                <td>
                                                    <?php if($value->action == "1"):?>
                                                    <a href="{{URL::to('headerStatusChange/'.$value->id.'/'.$value->action)}}" title="">
                                                    <button type="button" class="btn btn-success btn-sm">PUBLISH</button>
                                                    </a>
                                                    <?php else: ?>
                                                    <a href="{{URL::to('headerStatusChange/'.$value->id.'/'.$value->action)}}" title="">
                                                    <button type="button" class="btn btn-warning btn-sm">UNPUBLISH</button>
                                                    </a>
                                                    <?php endif; ?>
                                                    
                                                </td>
                                                    <td>
                                                     <a href="{{URL::to('editServiceInfo/'.$value->id)}}" title="">
                                                    <button type="button" class="btn btn-info btn-sm">EDIT</button>
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