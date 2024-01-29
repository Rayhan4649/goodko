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
                                    Edit Main Menu
                                </li>
                            </ul>
                        </div>
<h1 class="page-title"></h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<?php if (Session::get('succes') != null) { ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
        <strong><?php echo Session::get('succes');  ?></strong>
        <?php Session::put('succes', null);  ?>
    </div>
<?php } ?>
<?php
if (Session::get('failed') != null) { ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
        <strong><?php echo Session::get('failed'); ?></strong>
        <?php echo Session::put('failed', null); ?>
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
    <div class="col-md-6">
        <!-- BEGIN SAMPLE FORM PORTLET-->

        <div class="portlet box blue  b">
            <div class="portlet-title">
                <div class="caption">
                    Edit Main Menu 
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(['url' =>'editMainInfo','method' => 'post','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                <div class="form-body">
                    <div class="col-md-8">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Header Menu <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                 <select class="form-control spinner selectpicker" data-live-search="true" name="header_id" required="">
                                 <option value="<?php echo $result->h_menu_id; ?>">
                                 <?php if($result->h_menu_id != "0"){
                                 $header_menu_query = DB::table('tbl_header_menu')->where('id',$result->h_menu_id)->first();
                                echo  $header_menu_query->h_menu_name ;
                                }else{
                                echo "Select Header Menu";
                                }
                                ?>  

                                </option>
                                <?php foreach ($header as $header_value) { ?>
                                <option value="<?php echo $header_value->id ;?>"><?php echo $header_value->h_menu_name ;?></option>
                                <?php } ?>          
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-4 control-label">Main Menu <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control spinner" name="service" required value="<?php echo $result->main_menu_name ; ?>">
                            </div>
                        </div> 
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ; ?>" required="">
                    <center>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </center>
                    {!! Form::close() !!}
                </div>
                <!-- END SAMPLE FORM PORTLET-->

            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div><!-- END PAGE CONTENT BODY -->
</div><!-- END PAGE CONTENT -->
</div><!-- END CONTAINER -->
@endsection