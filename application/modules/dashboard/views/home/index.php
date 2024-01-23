
<div class="se-pre-con"></div>
<div class="row">
    
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">
                       
                    </div>
                </div>
            <div class="panel-body">
          <!-- Top Block Start -->
                <div class="col-md-2 col-xs-12">       
                    <div class="firstBlock row">
                        <div class="firstblocksecondlabel"><span class="spnHead"><?php echo display('total_employee')?></span></div>
                        <div class="counterdiv">
                            <span  class="fistblockinfo fa fa-group totalemployee"></span>
                            <span class="fistblockinfoCount count-number totalempoyeecounterpart"  id="totalEmployee"><?php echo (!empty($ttle_empl)?$ttle_empl:0);?></span>
                        </div>
                    </div>
                </div>
                            

                <div class="col-md-2 col-xs-12">       
                    <div class="firstBlock row">
                        <div class="firstblocksecondlabel"><span class="spnHead"><?php echo display('todays_present')?></span></div>
                        <div class="counterdiv">
                            <span class="fistblockinfo totalpresent fa fa-group"></span>
                            <span class="fistblockinfoCount totalempoyeecounterpart count-number"  id="activeemployee"><?php echo (!empty($present_empl)?$present_empl:0);?></span>
                        </div>
                    </div>
                </div>
                 <div class="col-md-2 col-xs-12">       
                    <div class="firstBlock row">
                        <div class="firstblocksecondlabel"><span class="spnHead"><?php echo display('todays_absent')?></span></div>
                       
                        <div class="counterdiv">
                            <span  class="fistblockinfo absentcount fa fa-group"></span>
                            <span class="fistblockinfoCount count-number totalempoyeecounterpart" id="activeemployee"><?php 
                            
                            $prandleave = (!empty($present_empl)?$present_empl:0) + (!empty($todys_leave)?$todys_leave:0);
                            echo $ttle_empl - $prandleave;
                            ?></span>
                        </div>
                    </div>
                </div>


                <div class="col-md-2 col-xs-12">       
                    <div class="firstBlock row">
                        <div class="firstblocksecondlabel"><span class="spnHead"><?php echo display('male')?></span></div>
                        <div class="counterdiv">
                            <span  class="fistblockinfo fa fa-male malecount"></span>
                            <span class="fistblockinfoCount count-number totalempoyeecounterpart" id="male"><?php echo (!empty($male)?$male:0);?></span>
                        </div>
                    </div>
                </div>

                 <div class="col-md-2 col-xs-12">       
                    <div class="firstBlock row">
                        <div class="firstblocksecondlabel"><span class="spnHead"><?php echo display('female')?></span></div>
                        <div class="counterdiv">
                            <span  class="fistblockinfo fa fa-female femalecount"></span>
                            <span class="fistblockinfoCount count-number totalempoyeecounterpart"  id="female"><?php echo (!empty($female)?$female:0);?></span>
                        </div>
                    </div>
                </div>
                
                    <div class="col-md-2 col-xs-12">       
                    <div class="firstBlock row">
                        <div class="firstblocksecondlabel"><span class="spnHead"><?php echo display('todays_leave')?></span></div>
                        <div class="counterdiv">
                            <span  class="fistblockinfo fa fa-plane leavecount"></span>
                            <span class="fistblockinfoCount count-number totalempoyeecounterpart"  id="leave"><?php echo (!empty($todys_leave)?$todys_leave:0);?></span>
                        </div>
                    </div>
                </div>
                <!-- Top Block End -->

                <!-- Second block start -->

    <div class="col-md-5">
        <div class="row chartrow">
           <canvas id="bar-chart-attendance" class="chartcontent"></canvas>
        </div>

    </div>
     <div class="col-md-5">
        <div class="row chartrow">
           <canvas id="bar-chart-recruitment" class="chartcontent"></canvas>
        </div>

    </div>  
     <div class="col-md-2">
        <div class="row chartrow">
             <div class="dbTopDiv row">
                    <div class="db2ndDiv">
                        <span class="spnHead noticehead"><?php echo display('latest_notice')?> 
               
                        </span>
                    </div>
                    <div class="divContinuedAbsent" >
                     <?php foreach($notice as $notices){?>   
                    <div class="leftdivcontent"><span data-empid="61"></span><a href="<?php echo base_url("noticeboard/Notice_controller/view_details/".$notices['notice_id']) ?>"><b><?php echo  $notices['notice_date'].' - '.$notices['notice_type'];?> </b></a></div>
                <?php }?>
                    
                  
                  </div>
      </div>
                </div>
        </div> 
                     <!-- Second block end --> 

                    <!-- Third part Start -->
                  
     <div class="col-md-5">
        <div class="row chartrow">
           <canvas id="bar-chart-absent" class="chartcontent"></canvas>
        </div>

    </div>
      <div class="col-md-5">
        <div class="row chartrow piealign">
       <canvas id="piechart" class="loanpiechart"></canvas> 
          
        </div>

    </div>

    <div class="col-md-2">
        <div class="row chartrow">
             <div class="dbTopDiv row">
                    <div class="db2ndDiv">
                        <span class="spnHead noticehead"><?php echo display('new_recruited_employee')?> 
               
                        </span>
                    </div>
                    <div class="divContinuedAbsent" >
                    <?php foreach($latestrecruitedemple as $recruitempl){?>    
                    <div class="leftdivcontent"><span data-empid="61"></span><b><?php echo $recruitempl['first_name'].' '.$recruitempl['last_name']?> </b><br><span ><?php echo display('hire_date')?>: </span><b><?php echo $recruitempl['hire_date'];?></b></div>
                <?php }?>
               
                  </div>
                   </div>
      </div>
                </div> 
      

                    <!-- Third part end -->

                    <!-- Forth part start -->

     
            <div class="col-md-6">
                <div class="row chartrow">
                   <canvas id="bar-chart-loanyear" class="chartcontent"></canvas>
                </div>

            </div>
              <div class="col-md-6">
                <div class="row chartrow">
                    <canvas id="scatter"  class="chartcontent"></canvas>
                </div>

            </div>  
            
        

                     <!-- Forth part end -->
                     </div>
                        </div>
                           
                <input type="hidden" name="" id="attendancelabel" value="<?php echo $attendanclabel;?>">
                <input type="hidden" name="" id="attendancedata" value="<?php echo $attendancdata;?>"> 
                <input type="hidden" name="" id="month" value='<?php echo $month;?>'>
                <input type="hidden" name="" id="recruitedemp" value="<?php echo $recruitedemp;?>"> 
                <input type="hidden" name="" id="abdfftdaylabel" value="<?php echo $abdfftdaylabel;?>">
                <input type="hidden" name="" id="abdfftdayval" value="<?php echo $abdfftdayval?>"> 
                <input type="hidden" name="" id="loanpayemntamnt" value="<?php echo (!empty($lnamountpaid->amount)?$lnamountpaid->amount:1);?>">
                <input type="hidden" name="" id="loanreceivedamnt" value="<?php echo (!empty($lnamountpaid->amount)?$lnamountpaid->amount:1);?>">
                <input type="hidden" name="" id="loanstatisticpayment" value="<?php echo $loanstatisticpayment;?>">
                <input type="hidden" name="" id="loanstatisticreceived" value="<?php echo $loanstatisticreceived;?>">
                <input type="hidden" name="" id="awardedempl" value="<?php echo $awardedempl;?>">
                <input type="hidden" name="" id="presentitle" value="<?php echo display('attendance_last_30days')?>">
                <input type="hidden" name="" id="attendancetitle" value="<?php echo display('attendance')?>">
                <input type="hidden" name="" id="employeetitle" value="<?php echo display('employee')?>">
                <input type="hidden" name="" id="absenttitle" value="<?php echo display('absent_15days')?>">
                <input type="hidden" name="" id="absent" value="<?php echo display('absent')?>">
                <input type="hidden" name="" id="recruitedtitle" value="<?php echo display('recruited')?>">
                <input type="hidden" name="" id="recruitedyeartitle" value="<?php echo display('recruited_current_year')?>">
                <input type="hidden" name="" id="loanpaymenttitle" value="<?php echo display('loanpayment')?>">
                <input type="hidden" name="" id="loanreceivettitle" value="<?php echo display('loanreceive')?>">
                <input type="hidden" name="" id="paymentrecvtitle" value="<?php echo display('loanpayment').' '.display('loanreceive')?>">
                <input type="hidden" name="" id="awardedtitle" value="<?php echo display('awarded')?>">
                <input type="hidden" name="" id="awardedcurrnttitle" value="<?php echo display('awarded').' '.display('current_year')?>">
                </div>
            
     

    
        <script src="<?php echo base_url('assets/plugins/counterup/chart.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/dashboardchart.js') ?>" type="text/javascript"></script>
 


