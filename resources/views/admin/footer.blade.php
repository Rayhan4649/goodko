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
                                    FOOTER
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
                    Footer 
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(['url' =>'footerInfo','method' => 'post','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                <div class="form-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Email <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="email" class="form-control spinner" name="company_email" required="" value="<?php echo $result->company_email ; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Website <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control spinner" name="company_web" required="" value="<?php echo $result->company_web ; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">What's up <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="number" class="form-control spinner" name="company_whatsup" required="" value="<?php echo $result->company_whatsup ; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Number(1) <span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="number" class="form-control spinner" name="company_number" required="" value="<?php echo $result->company_number_one ; ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Number(2)</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control spinner" name="company_number_two"value="<?php echo $result->company_number_two ; ?>"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Office Address<span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <textarea type="text" class="form-control spinner" name="company_address" required=""><?php echo $result->company_address ; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Registered  Address<span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <textarea type="text" class="form-control spinner" name="company_address_reg" required=""><?php echo $result->company_address_reg ; ?></textarea>
                            </div>
                        </div>  
                        <input type="hidden" name="id" value="<?php echo $result->id;?>" required="">
                    </div>
                    <center>
                        <div class="form-group">
                            <div class="col-md-11">
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