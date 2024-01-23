<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/attendance.css" />
<div class="row">
<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Tables</a></li>
    <li><a data-toggle="tab" href="#menu1" >Fields</a></li>
    <li><a data-toggle="tab" href="#menu2" >Summary</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <div class="row">
        <div class="col-sm-12 col-md-11">
            <div class="panel">
                
                <div class="panel-body">
                    <div class="row">
 <label><input type="checkbox" name="tables[]" class="ckb" value="department" id="" > Department</label><br>                  
<label><input type="checkbox" name="tables[]" class="ckb" value="employee_history" id="" > Employee History</label><br>
<label><input type="checkbox" name="tables[]" class="ckb" value="employee_equipment" id="" > Assets</label><br>
<label><input type="checkbox" name="tables[]" class="ckb" value="equipment" id="" > Equipment</label><br>
<label><input type="checkbox" name="tables[]" class="ckb" value="custom_table" id="" > Custom Table</label><br>
</div>
                        <div class="form-group text-right">
                           
             <input type="button" class="btn btn-primary btnNext" onclick="checktable()" value="NEXT">
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
    <div id="menu1" class="tab-pane fade in">
    <div class="row">
        <div class="col-sm-12 col-md-11">
            <div class="panel">
                
                <div class="panel-body">
                      <div id="fields"></div>
              
                        <div class="form-group text-right">
                           
                          <input type="button" class="btn btn-primary btnPrevious"  value="Previous">
             <input type="button" class="btn btn-primary btnNext" onclick="checkedfield()" value="NEXT">   
             </div>     
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
   <div id="menu2" class="tab-pane fade in">
    <div class="row">
        <div class="col-sm-12 col-md-11">
            <div class="panel">
                
                <div class="panel-body">
               
                        <table class="table table-bordered table-hover"  id="equipment_table">
                              <thead>
                                  <tr>
                                     <th>Field</th> 
                                     <th>Operator</th> 
                                     <th>Value</th> 
                                     <th>Action</th> 
                                  </tr>
                              </thead>
                                <tbody id="equipmnet_info">
                                    <tr>
                                       
                                        <td>
                                           <div class="col-sm-4">
                                             <select name="selectfield[]" id="ssf1"  class="form-control selectbox">
                                             </select>
                                           </div>
                                        </td>
                                        <td> <div class="col-sm-4">
                           <select class="form-control selectbox" name="operator[]" id="operator1">
                               <option value="">Select Oprator</option>
                               <option value="=">=</option>
                               <option value=">">></option>
                               <option value="<"><</option>
                               <option value="<="><=</option>
                               <option value=">=">>=</option>
                               <option value="!=">!=</option>
                           </select>
                        </div></td>
                            <td> <div class="col-sm-4">
                            <input name="value[]" class="form-control selectbox" type="text" placeholder="Value" id="q1" value="">
                        </div></td>
                                        <td> <input type="button"name="sdfsd" id="add_invoice_item" class="btn btn-info"  onclick="addasset('equipmnet_info');" value="add"  />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

              <div class="form-group text-right">
                           
                          <input type="button" class="btn btn-primary btnPrevious"  value="Previous">
             <button type="button" class="btn btn-primary btnNext" onclick="results()" ><i class='fa fa-search' aria-hidden='true'></i> <?php echo display('search')?></button>        
                    </div>
                    <div class="table-responsive">
                      <div id="result"></div>
                  </div>
                    </div>
                    </div>
                    </div>
                    
                    </div>
                    </div>
                    </div>
                </div>
                </div>
            
 <script src="<?php echo base_url('assets/js/attendance.js') ?>" type="text/javascript"></script>