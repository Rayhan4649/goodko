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
                                 SUB MENU PAGE LINK
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
                    SUB MENU PAGE LINK
                </div>
            </div>
            <div class="portlet-body form">
                 {!! Form::open(['url' =>'editSubMenuPageLink','method' => 'post','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                <div class="form-body">
                    <div class="col-md-12">
                    
                    <hr/> 
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ; ?>" required="">
                    <input type="hidden" name="main_menu_id" value="<?php echo $main_menu_id ; ?>" required="">
                     <div class="col-md-12">
                                        <strong><center>IMAGE</center></strong> <hr/>
                                        <div class="portlet-body ">
                                        <table class="table table-striped table-hover table-bordered" >
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Title</th> 
                                                    <th>Image</th>
                                                    <th>Description</th>
                                                    <th>Catalogue</th>
                                                    <th>Action</th>
                                                    <th>Edit</th> 
                                                    <th>Delete</th>
                                                    <th>Page Setup </th>           
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php $i = 1 ;
                                                foreach ($result as $value) { ?>
                                                <tr>
                                                    <td><?php echo $i++ ;?></td>
                                                    <td><?php echo $value->title ; ?></td>
                                                    <td>
                                                    <?php if($value->image == null):?>
                                                    <span>No Image</span>
                                                    <?php else :?>    
                                                    <img width="50" height="50" src="{{URL::to($value->image)}}">
                                                    <?php endif;?>
                                                    </td>
                                                    <td><?php echo $value->des ; ?></td>
                                                    <td> <?php if($value->document != ''){?>
                <a target="_blank" href="{{URL::to($value->document)}}" title="Download" class="btn btn-success btn-sm">Donwload</a> 
                <?php } ?></td>

                                                    <td>
                                                    <?php if($value->status == "1"):?>
                                                    <a href="{{URL::to('subLinkActionChange/'.$value->id.'/'.$value->main_menu_id.'/'.$value->main_title_id.'/'.$value->status)}}" title="">
                                                    <button type="button" class="btn btn-success btn-sm">PUBLISH</button>
                                                    </a>
                                                    <?php else: ?>
                                                    <a href="{{URL::to('subLinkActionChange/'.$value->id.'/'.$value->main_menu_id.'/'.$value->main_title_id.'/'.$value->status)}}" title="">
                                                    <button type="button" class="btn btn-warning btn-sm">UNPUBLISH</button>
                                                    </a>
                                                    <?php endif; ?>
                                                    </td>

                                                    <td><a href="{{URL::to('editSubLinkPageUpdateInfo/'.$value->id.'/'.$value->main_menu_id.'/'.$value->main_title_id)}}" title="">
                                                    <button type="button" class="btn btn-info btn-sm">EDIT</button>
                                                    </a>
                                                    </td> 
                                                    <td><a href="{{URL::to('deleteSubLinkPageUpdateInfo/'.$value->id.'/'.$value->main_menu_id.'/'.$value->main_title_id)}}" title="">
                                                    <button type="button" class="btn btn-danger btn-sm">DELETE</button>
                                                    </a> 
                                                    </td>
                                                     <td>
                                                    <a href="{{URL::to('childMenuPageLink/'.$value->id.'/'.$value->main_menu_id.'/'.$value->main_title_id)}}" title="">
                                                    <button type="button" class="btn btn-info btn-sm">PAGE SETUP</button>
                                                    </a>  
                                                    </td>
                                                    
                                                </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
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