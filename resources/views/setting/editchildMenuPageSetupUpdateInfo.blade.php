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
                                    Edit Child Menu Content
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
                    Edit Child Menu Content
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(['url' =>'editchildMenuPageSetupUpdateInfoo','method' => 'post','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                <div class="form-body">
                    <div class="col-md-10">

                         <div class="form-group">
                            <label class="col-md-4 control-label">Title<span style="color:red; font-weight: bold">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control spinner" name="title"  value="<?php echo $result->title ; ?>">
                            </div>
                        </div> 

                         <div class="form-group">
                            <label class="col-md-4 control-label">Description</label>
                            <div class="col-md-8">
                                <textarea id="summernote" name="des"><?php echo $result->des ; ?></textarea>
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
@section('js')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>

  
@endsection