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
                                    Edit Officer
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
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->

        <div class="portlet box blue  b">
            <div class="portlet-title">
                <div class="caption">
                    Edit Officer Info
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(['url' =>'editOfficerInfoo','method' => 'post','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                <div class="form-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Officer Name <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control spinner" name="officer_name" required value="<?php echo $result->officer_name ; ?>" >
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-4 control-label">Officer Education <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control spinner" name="education" required value="<?php echo $result->education ; ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Officer Designation <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control spinner" name="officer_designation" required value="<?php echo $result->officer_designation ; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Officer's Email <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="email" class="form-control spinner" name="email" required value="<?php echo $result->email ; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Number <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control spinner" name="number" required value="<?php echo $result->number ; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Description <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <textarea type="text" class="form-control spinner" name="description" required value=""><?php echo $result->description ; ?></textarea>
                            </div>
                        </div>
                         <div class="form-group">
                             <label class="col-md-4 control-label">Current Image</label>
                                <div class="col-md-8">
                                    <?php 
                                        if($result->image == ""):?>
                                             <span style="color:red;">Image Not Found</span>
                                                <?php else:?>
                                                    <img width="50" height="50" src="{{URL::to($result->image)}}">
                                                    <?php endif;?>                            
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                    <div class="col-md-8">
                                      <input type="file" class="form-control spinner" name="image">
                                  </div>
                           </div>                                       
                   
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ; ?>">

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