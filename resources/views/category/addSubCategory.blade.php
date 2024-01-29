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
                                    Sub Category 
                                    <i class="fa fa-circle"></i>
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
                    Add Sub Category 
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(['url' =>'addSubCategoryInfo','method' => 'post','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                <div class="form-body">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Category <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                              <select class="form-control spinner selectpicker" data-live-search="true"  name="category_id" id="category_id" data="category_id" required="">
                                <option value="">Select Category</option>
                                 <?php foreach ($result as $value) { ?>
                                 <option value="<?php echo $value->id ;?>"><?php echo $value->category;?></option>
                                <?php } ?>
                              </select>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sub Category <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control spinner" name="sub_category" required="">
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