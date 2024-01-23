
<?php  $timezone = $this->db->select('timezone')->from('setting')->get()->row();
                               date_default_timezone_set($timezone->timezone); ?>
<div class="form-group text-right">
<?php if($this->permission->method('attendance','create')->access()): ?>
 <?php  if($this->session->userdata('isAdmin')==1 || $this->session->userdata('supervisor')==1){?> 
<button type="button" class="btn btn-primary btn-md" data-target="#add1" data-toggle="modal"  >
<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo display('bulk_checkin')?></button> 
<?php } ?>
  <?php endif; ?> 

</div>
          
<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel ">
                <div class="panel-heading" >
                    <div class="panel-title">
                        <h4><?php echo display('attendance') ?></h4>
                    </div>
                </div>
                <div class="panel-body">


      <?php echo  form_open('attendance/Home/create_atten') ?>
                        <div class="form-group row">
                          <input type="hidden" name="attendanc_id" value="<?php echo (!empty($editdata)?$editdata->atten_his_id:'')?>">
                            <label for="employee_id" class="col-sm-3 col-form-label"><?php echo display('emp_id') ?> *</label>
                            <div class="col-sm-4">
                       <?php  if($this->session->userdata('isAdmin')==1 || $this->session->userdata('supervisor')==1){?> 
                              <?php echo form_dropdown('employee_id',$dropdownatn,(!empty($editdata)?$editdata->uid:''),'class="form-control codeigniterselect" id="employee_id"') ?>
                              <?php }else{?> 
                                <input type="text" name="employee_name" class="form-control" value="<?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?>" readonly>
                                 <input type="hidden" name="employee_id" id="employee_id" class="form-control" value="<?php echo $this->session->userdata('employee_id');?>">
                               <?php }?>
                               
                            </div>
                        </div> 
                        <div class="form-group row">
                          <label for="intime" class="col-sm-3 col-form-label"><?php echo display('in_time')?>*</label>
                          <div class="col-sm-4">
                            <input type="text" name="intime" id="" class="form-control datetimepicker" value="<?php echo (!empty($editdata)?$editdata->time:'')?>">
                          </div>

                        </div>
                         <div class="form-group row">
                          <label for="out_time" class="col-sm-3 col-form-label"><?php echo display('out_time')?>*</label>
                          <div class="col-sm-4">
                            <input type="text" name="out_time" id="" class="form-control datetimepicker" value="<?php echo (!empty($editdata)?$editdata->time:'')?>">
                          </div>

                        </div>
                          <div class="form-group text-center">
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('check_in') ?></button>
                        </div>
                    <?php echo form_close() ?>
                          
                        </div>         
                      
   

   
   
  
                   

                </div>  
            </div>
        </div>
 
 
 <!--  signout modal start --> 
 <div id="signout" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><center> <?php echo display('checkout')?></center></strong>
            </div>
            <div class="modal-body">
           
   <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-bd">
               
                <div class="panel-body">
                 <?php echo  form_open('attendance/Home/checkout') ?>

                    <input name="att_id" id="att_id" type="hidden" value="">
                 
                        <div class="form-group row">
                            
                            <div class="col-sm-9">
                                <input name="sign_in" class=" form-control" type="hidden"  value=""  id="sign_in" readonly="readonly" >
                            </div>
                        </div>
                     
  
                       <center> <span id="clock"></span></center>
             
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary"><?php echo display('confirm_clock')?></button>
                        </div>

                    <?php echo form_close() ?>


                </div>  
            </div>
        </div>
    </div>
             
    </div>
     
            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>

<div id="add1" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('add_attendance')?></strong>
            </div>
            <div class="modal-body">
           <div class="container" >    
             <br>
             
             <?php if (isset($error)): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success') == TRUE): ?>
                <div class="form-control alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            <h3><?php echo display('download_sample_file')?> <a href="<?php echo base_url('assets/data/bulkdata/bulkattendance.xlsx') ?>" class="btn btn-primary"><i class="fa fa-download"></i> <?php echo display('download_sample_file')?></a></h3>
              
                       <?php echo form_open_multipart('attendance/Home/importcsv',array('class' => 'form-vertical', 'id' => 'validate','name' => 'insert_attendance'))?>
                    <input type="file" name="upload_csv_file" id="userfile" ><br><br>
                    <input type="submit" name="submit" value="UPLOAD" class="btn btn-primary">
       <?php echo form_close()?>
           
        
            
        </div>     

    </div>

</div>
</div>
</div>
<!-- Start Modal -->

 