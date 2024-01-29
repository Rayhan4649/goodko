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
                                          SOFTWARE START </div>
                                    </div>
                                    <div class="portlet-body form"> 
                                        	 {!! Form::open(['url' =>'addBrancInfo','method' => 'post','role' => 'form','class'=>'form-horizontal','files' => true]) !!}
                                            <div class="form-body">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Name <span style="color:red; font-weight: bold">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control spinner" name="name" value="<?php echo $branc_info_query->name ; ?>" required=""></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"> Mobile</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control spinner" name="mobile" value="<?php echo $branc_info_query->mobile ; ?>"></div>
                                                </div>
                                                  <div class="form-group">
                                                    <label class="col-md-4 control-label">Address</label>
                                                    <div class="col-md-8">
                                                        <textarea type="text" class="form-control spinner" name="address"><?php echo $branc_info_query->address ; ?></textarea>
                                                        </div>
                                                </div>
                                                     <div class="form-group">
                                                    <label class="col-md-4 control-label"> Logo <span style="color:green">(Type - jpeg,jpg,png And Max Size - 2 MB) </span></label>
                                                    <div class="col-md-8">
                                                      <input type="file" class="form-control spinner" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                 <div class="form-group">
                                                    <label class="col-md-4 control-label"> Cash In Hand <span style="color:red; font-weight: bold">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control spinner" name="pettycash" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-md-4 control-label">Confirm Cash In Hand <span style="color:red; font-weight: bold">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control spinner" name="confirm_pettycash" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></div>
                                                </div>
                                                  <div class="form-group">
                                                   <label class="col-md-4 control-label">Opening Date<span style="color:red; font-weight: bold">*</span></label>
                                                    <div class="col-md-3">
                                                        <input class="form-control form-control-inline input-medium date-picker" data-date-format="dd-mm-yyyy"  type="text"  name="tr_date" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" required="">
                                            <center>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn green">Submit</button>
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