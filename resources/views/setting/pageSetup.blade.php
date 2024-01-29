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
                                   Page Setup
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
                                            <span class="caption-subject bold uppercase" style="text-align:right;">Page Setup</span>
                                        </div>
                                        <div class="tools">

                                             </div>                                            
                                    </div>
                                    <div class="portlet-body ">
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Header Menu</th> 
                                                    <th>Main Menu</th>
                                                    <th>Sub Menu</th>                        
                                                    <th>Child Menu </th>                                                             
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ;
                                                foreach ($result as $value) { ?>
                                                <tr>
                                                    <td><?php echo $i++ ;?></td>
                                                    <td>
                                                        <table class="table table-striped table-hover table-bordered">
                                                            <tr>

                                                    <td><?php echo $value->h_menu_name ;?></td> 
                                                    <td>
                                             
                                                    <?php if($value->status == "1"):?>
                                                    <a href="{{URL::to('headerMenuPageSetup/'.$value->id)}}" title="">
                                                    <button type="button" class="btn btn-info btn-sm">PAGE SETUP</button>
                                                    </a>
                                                    <?php else: ?>
                                                    <?php endif; ?>
                                                </td>
                                                </tr>
                                                    </table>
                                                    </td>   
                                                    <td>
                                                        <table class="table table-striped table-hover table-bordered">
                                                        <?php
                                                        // main menu of this header menu
                                                        $main_menu_of_this_header_menu_query = DB::table('tbl_main_menu')->where('h_menu_id',$value->id)->get(); ?>
                                                        <?php foreach($main_menu_of_this_header_menu_query as $main_menu_of_this_header_menu_query_value){?>
                                                              <tr>
                                                           <td> <?php echo  $main_menu_of_this_header_menu_query_value->main_menu_name ;?></td>
                                                           <td>
                                                            <?php if($main_menu_of_this_header_menu_query_value->status == "1"):?>
                                                                    <a href="{{URL::to('mainMenuPageSetup/'.$main_menu_of_this_header_menu_query_value->id)}}" title="">
                                                    <button type="button" class="btn btn-info btn-sm">PAGE SETUP</button>
                                                    </a>

                                                            <?php else: ?>

                                                            <?php endif ; ?>
                                                            </td>
                                                            </tr>
                                                        <?php } ?>
                                                   
                                                        </table>
                                                        
                                                    </td>  
                                                    <td>
                                                        jkkk
                                                    </td>  
                                                    <td></td>                                               
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