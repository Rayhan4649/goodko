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
                                    Main Menu
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
                    Add Main Menu 
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(['url' =>'addMainMenuInfo','method' => 'post','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                <div class="form-body">
                    <div class="col-md-12"> 
                    <div class="form-group">
                            <label class="col-md-4 control-label">Select Header Menu <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                            <select type="text" class="form-control spinner" name="h_menu_id" required="">
                                <option value="">Select Header Menu</option>
                                <?php foreach ($result as $value) { ?>  
                                <option value="<?php echo $value->id ;?>"><?php echo $value->h_menu_name ;?></option> 
                                <?php } ?>
                                
                            </select>
                            </div>
                        </div>                       
                        <div class="form-group">
                            <label class="col-md-4 control-label">Main Menu Name <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control spinner" name="name" required>
                            </div>
                        </div> 
                        <div class="form-group"style="display: none;">
                            <label class="col-md-4 control-label">Main Menu Status <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                            <select type="text" class="form-control spinner" name="status" required="">
                                <option value="1">End</option>
                                <!-- <option value="">Select Main Menu Status</option>
                                <option value="0">Continue</option>
                                <option value="1">End</option> -->
                            </select>
                            </div>
                        </div>
                    </div>
                    <center>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
@section('js')
