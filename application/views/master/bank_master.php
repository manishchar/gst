  <div class="container-fluid">
    <div class="col-md-12 ">
            <h4>Bank Details</h4>
            <div id="errorMessage"></div>
                <?php
                if($this->session->flashdata('message')){ ?>
                  <div class="alert alert-success">
                    <h5><?php echo $this->session->flashdata('message'); ?></h5>
                  </div>
                      <?php }elseif($this->session->flashdata('error')){ ?>
                   <div class="alert alert-danger">
                    <h5><?php echo $this->session->flashdata('error'); ?></h5>
                  </div>
                <?php } ?>
                <div class="form-group">
                  <form method="POST" id="bankForm" >
                      <div class="col-md-12 text text-danger">
                      <?php 
                      echo validation_errors('<div class="text text-danger">', '</div>'); 
                      echo validation_errors(); 
                      ?>
                      </div>
                      <div class="col-md-12">
                          <div class="col-md-3">
                            <label class="control-label">Account ID</label>
                            <?php //echo set_value('accountId'); ?>
                            
                              <input type="text" name="accountId" id="accountId" class="form-control" required="required">
                              <input type="text" name="id" id="id" class="form-control" hidden="hidden">
                          </div>
                          <div class="col-md-3">
                             <label class="control-label">Bank Name</label>
                            
                              <select class="form-control" name="bankName" id="bankName"  required="required">
                                <option value=""></option>
                                <option id="1" value="1">union bank of india</option>
                                <option id="2" value="2">state bank of india</option>
                                <option id="3" value="3">central bank of india</option>
                     
                              </select>
                          </div>
                          <div class="col-md-3">

                            <label class="control-label">Account Holder</label>
                            <div style="color: red;"><?php //echo form_error('accountHolder'); ?></div>

                             <input type="text" name="accountHolder" id="accountHolder" class="form-control"  required="required">
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">Account Number</label>
                            <input type="text" name="accountNumber" id="accountNumber" class="form-control"  required="required">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="col-md-3">
                            <label class="control-label">Branch</label>
                             <input type="text" name="branch" id="branch" class="form-control"  required="required">
                          </div>
                          <div class="col-md-3">
                            <label class="control-label">IFSC Code</label>
                            <input type="text" name="ifscCode" id="ifscCode" class="form-control"  required="required">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="col-md-6" style="display: inline-flex;padding: 0;margin: 10px 0px; ">
                            <label class="control-label"></label>
                             <select class="form-control" name=""  >
                                <option></option>
                                <option>union bank of india</option>
                                <option>state bank of india</option>
                                <option>central bank of india</option>
                     
                              </select>  
                          </div>
                          <div class="col-md-6 " style="display: inline-flex;padding: 0;margin: 0;">
                            <button type="submit" name="add" class="btn  " style="width: 120px;margin: 10px 10px; margin-left: 10px; background-color: blue; color: white;">Add</button> 
                            <button type="button" name="modify" id="bankUpdate"  class="btn  btn-primary   " style="width: 120px;margin: 10px 10px; color: white;">Modify</button>
                            <button type="button" name="delete" id="bankDelete"  class="btn  btn-secondery " style="width: 120px;margin: 10px 10px; background-color: red; color: white;">Delete</button> 
                          </div>
                          
                      </div>
                  </form>   
                </div>
                <div class="container">
                   <br/>
                    <table id="bankResult" class="table">
                        <thead>
                            <tr>  
                             <th>Account Id</th>
                             <th>Bank Name</th>
                             <th>Account Holder</th>
                             <th>Account Number</th>
                             <th>Branch</th>
                             <th>IFSC Code</th>
                             <th>Action</th>
                            </tr>
                        </thead>               
                    </table>
                </div>
    </div>
  