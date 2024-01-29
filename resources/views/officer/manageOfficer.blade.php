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
                                   Officer List 
                                    <i class="fa fa-circle"></i>
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
                                            <span class="caption-subject bold uppercase" style="text-align:right;">Officer List</span>
                                        </div>
                                        <div class="tools">

                                            <a href="{{URL::to('addOfficer')}}" title="Add">
                                                            <button type="button" id="add_button" class="btn btn-warning btn-sm"> <i class="fa-solid fa-circle-plus"></i>New Officer</button>
                                                        </a>  </div>
                                            
                                    </div>
                                    <div class="portlet-body ">
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Officer Name </th> 
                                                    <th>Education</th>
                                                    <th>Officer Designation </th>
                                                    <th>Email </th>
                                                    <th>Number </th>
                                                    <th>Description </th>
                                                    <th>Officer Image</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>                                                   
                                                                                                        
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ;
                                                foreach ($result as $value) { ?>
                                                <tr>
                                                    <td><?php echo $i++ ;?></td>
                                                    <td><?php echo $value->officer_name ; ?></td>
                                                    <td><?php echo $value->education ; ?></td>
                                                    <td><?php echo $value->officer_designation ; ?></td>
                                                    <td><?php echo $value->email ; ?></td>
                                                    <td><?php echo $value->number ; ?></td>                                    
                                                    <td><?php echo $value->description ; ?></td>
                                                    <td>
                                                    <?php if($value->image == null):?>
                                                    <span>No Image</span>
                                                    <?php else :?>    
                                                    <img width="50" height="50" src="<?php echo $value->image ;?>">
                                                    <?php endif;?>
                                                    </td>
                                                    <td>
                                                    <a href="{{URL::to('editOfficerInfo/'.$value->id)}}" title="">
                                                    <button type="button" class="btn btn-info btn-sm">EDIT</button>
                                                    </a>
                                                    </td>

                                                    <td>
                                                    <a href="{{URL::to('deleteOfficerInfo/'.$value->id)}}" title="">
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