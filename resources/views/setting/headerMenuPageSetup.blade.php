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
                                    HEADER MENU PAGE SETUP
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
                    HEDER MENU PAGE SETUP
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(['url' =>'addHeaderMenuPageSetup','method' => 'post','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                <div class="form-body">
                    <div class="col-md-12"> 
                    <h4><center><strong><?php echo $header_menu_info->h_menu_name ; ?></strong></center></h4> 
                    <hr/>                       
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control spinner" name="title">
                            </div>
                        </div> 
                         <div class="form-group">
                            <label class="col-md-2 control-label">Content</label>
                            <div class="col-md-10">
                                <textarea id="summernote" name="des"></textarea>                                
                            </div>
                        </div> 

                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ; ?>" required="">
                     <div class="col-md-12">
                                        <strong><center>IMAGE</center></strong> <hr/>
                                      <div class="field_wrapper">
                                          <div class="form-group">
                                             <label class="col-md-2 control-label">Image Title</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="doc_name[]">
                                            </div>
                                              <label class="col-md-2 control-label">Image</label>
                                            <div class="col-sm-3">
                                               <input type="file" class="form-control spinner" name="doc_image[]">
                                            </div>
                                        
                                               <a href="javascript:void(0);" class="add_button" id="add_button" title="Add field"> <button type="button" class="btn btn-success"> Add New</button></a>
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
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>

<script>
    $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div>   <div class="form-group"><label class="col-md-2 control-label">Image Title</label><div class="col-md-3"><input type="text" class="form-control"  name="doc_name[]"></div><label class="col-md-2 control-label">Image</label><div class="col-sm-3"><input type="file" class="form-control"  name="doc_image[]"></div><a href="javascript:void(0);" class="remove_button"> <button type="submit" class="btn btn-danger waves-effect waves-light"> Remove</button></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@endsection