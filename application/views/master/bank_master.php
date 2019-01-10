 <!DOCTYPE html>
<html lang="en-us">
<head>
<?php $this->load->view('admin/layouts/meta'); ?>
</head>

<body class="layout layout-vertical layout-left-navigation layout-below-toolbar">
<main>
<div id="wrapper">
<aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
<?php $this->load->view('admin/layouts/site_bar'); 
?>
</aside>
<div class="content-wrapper">
<nav id="toolbar" class="bg-white">

<?php $this->load->view('admin/layouts/header'); ?>
</nav>
<div class="content custom-scrollbar">

<div id="project-dashboard" class="page-layout simple right-sidebar">

<div class="page-content-wrapper custom-scrollbar">

<!-- HEADER -->
<?php $this->load->view('admin/layouts/inside_header'); ?>
<!-- / HEADER -->
<!-- CONTENT -->
<div class="page-content p-6">
<div class="topTab" style="margin-top: 0px;">
       <form method="POST" id="bankForm" >
            <div class="row  col-md-12 text text-danger">
              <?php 
                echo validation_errors('<div class="text text-danger">', '</div>'); 
                echo validation_errors(); 
            ?> 
            </div>
            <div class="row form-group col-md-12">
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
            <div class="row form-group col-md-12">
                <div class="col-md-3">
                  <label class="control-label">Branch</label>
                   <input type="text" name="branch" id="branch" class="form-control"  required="required">
                </div>
                <div class="col-md-3">
                  <label class="control-label">IFSC Code</label>
                  <input type="text" name="ifscCode" id="ifscCode" class="form-control"  required="required">
                </div>
            </div>
            <div class="row form-group col-md-12">
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
        <div class="container  ">
          <table id="bankResult" class="table table-responsive col-md-12  ">
              <thead >
                   <th>Account Id</th>
                   <th>Bank Name</th>
                   <th>Account Holder</th>
                   <th>Account Number</th>
                   <th>Branch</th>
                   <th>IFSC Code</th>
                   <th>Action</th>
              </thead>               
          </table>
        </div>
</div>

</div>

</div>


</div>


</div>
</div>

</div>


</body>
</html>
<?php $this->load->view('admin/layouts/footer'); ?>