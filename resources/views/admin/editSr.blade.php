          @extends('admin.masterManager')
          @section('content')
                <!-- BEGIN CONTENT -->
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
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
                                 <!-- BEGIN SAMPLE FORM PORTLET-->
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                          Edit SR
                                      </div>
                                    </div>
                                    <div class="portlet-body form">
                                             {!! Form::open(['url' =>'edtiSrInfo','method' => 'post','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                                            <div class="form-body">
                                                <div class="col-md-6">

                                                  <div class="form-group">
                                                    <label class="col-md-4 control-label">SR Name <span style="color:red; font-weight: bold">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control spinner" name="name" required="" value="<?php echo $result->name ; ?>">
                                                </div>
                                              </div>
                                               <div class="form-group">
                                                    <label class="col-md-4 control-label">Father's Name </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control spinner" name="father_name" value="<?php echo $result->father_name ; ?>">
                                             
                                                </div>
                                              </div>
                                                    <div class="form-group">
                                                    <label class="col-md-4 control-label">SR Mobile<span style="color:red; font-weight: bold">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="number" class="form-control spinner" name="mobile" required="" value="<?php echo $result->mobile ; ?>" readonly="">
                                             
                                                </div>
                                              </div>
                                                  <div class="form-group">
                                                    <label class="col-md-4 control-label">Email</label>
                                                    <div class="col-md-8">
                                                        <input type="email" class="form-control spinner" name="email" value="<?php echo $result->email ; ?>">
                                             
                                                </div>
                                              </div>
                                                  <div class="form-group">
                                                    <label class="col-md-4 control-label">NID</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control spinner" name="nid" value="<?php echo $result->nid ; ?>">
                                             
                                                </div>
                                              </div>
                                          </div>
                                          <div class="col-md-6">

                                                     <div class="form-group">
                                                    <label class="col-md-4 control-label">Address <span style="color:red; font-weight: bold">*</span></label>
                                                    <div class="col-md-8">
                                                        <textarea type="text" class="form-control spinner" name="address" required=""><?php echo $result->address; ?></textarea>
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
                                            <input type="hidden" name="id" value="<?php echo $id ; ?>" required="">
                                            <center>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn green">Update</button>
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
