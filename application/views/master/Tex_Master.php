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
<div class="topTab" style="margin-top: 0px;">
         <form method="POST" id="texForm" >

               <div class="row">
                <div class="col-md-12 text text-danger">
                      <?php 
                      echo validation_errors('<div class="text text-danger">', '</div>'); 
                      //echo validation_errors(); 
                      ?>
                      </div>
                      
        <div class="col-md-4">
                <label class="control-label">Tax Name</label>
                <input type="text" name="texName" id="texName" class="form-control" required="required">
                <input type="text" name="id" id="id" class="form-control" hidden="hidden">
        </div>
                <div class="col-md-4">
                <label class="control-label">Tax Percentage</label>
                <input type="text" name="texPercentage" class="form-control" id="texPercentage" required="required">
                </div><div class="col-md-4">
               <label class="control-label">Tax Type</label>
                 <select type="text" class="form-control" name="texType" id="texType" required="required">
              
              <option value="0" disabled="" selected="">Select Tax</option>
              <option value="sales">Sales</option>
              <option value="purchase">Purchase</option>
              </select>
            </div></div>
                  <div class="row">       
                <div class="col-md-4">
                <label class="control-label">SGST</label>
                <input type="text" name="sgst" class="persant form-control" id="sgst" required="required">
         </div><div class="col-md-4">
                <label class="control-label">CGST</label>
                <input type="text" name="cgst" class="persant form-control" id="cgst" required="required">
                </div><div class="col-md-4">
                <label class="control-label">IGST</label>
                <input type="text" name="igst" class="persant form-control" id="igst" required="required">
        </div>
              </div>
        
         <div class="form-group ">
               <div class="row" style="margin: 100px 0px">
                      <div class="col-md-6" style="display: inline-flex;padding: 0;margin: 10px 0px; ">
                        <label class="control-label"></label>
                         <select class="form-control" name="GST1" id="GST1"  >
                          <?php
                          if($taxs){
                            foreach ($taxs as $key => $value) { ?>
                            <option value="<?= $value->id; ?>"><?= $value->texName ?></option>  
                            <?php }
                          }
                          ?>
                          </select>  
                      </div>
                      <div class="col-md-6 " style="display: inline-flex;padding: 0;margin: 0;">
                        <button type="submit" name="add" value="submit" id="texSubmit" class="btn  " style="width: 120px;margin: 10px 10px; margin-left: 10px; background-color: blue; color: white;">Add</button> 
                        <button type="button" name="modify" value="update" id="texUpdate" class="btn  btn-primary   " style="width: 120px;margin: 10px 10px; color: white;">Modify</button>
                        <button type="button" name="delete" value="delete" id="texDelete" class="btn  btn-secondery " style="width: 120px;margin: 10px 10px; background-color: red; color: white;">Delete</button> 
                      </div>
                      
                  </div>
             </div>
            </form>

              <div class="container">
    
<table id="texResult" class="table">
<thead>
    <tr>  
     <th>Tex Name</th>
     <th>Tex Percentage</th>
     <th>Tex Type</th>
     <th>SGST</th>
     <th>CGST</th>
     <th>IGST</th>
     <th>Action</th>
    </tr>
</thead>               
</table> 

                                             


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