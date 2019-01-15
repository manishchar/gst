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
  <!-- <div id="errorMessage"></div>
                <?php
                //if($this->session->flashdata('message')){ ?>
                  <div class="alert alert-success">
                    <h5><?php //echo $this->session->flashdata('message'); ?></h5>
                  </div>
                      <?php //elseif($this->session->flashdata('error')) ?>
                   <div class="alert alert-danger">
                    <h5><?php //echo $this->session->flashdata('error'); ?></h5>
                  </div>
                <?php  ?> -->
    <form id="productForm" method="POST" enctype="multipart/form-data">
  
            
               <div class="row form-group col-md-12">
               <div class="col-md-12 text text-danger">
                      <?php 
                      echo validation_errors('<div class="text text-danger">', '</div>'); 
                      echo validation_errors(); 
                      ?>
                      </div>
                      <?php foreach($product as $value){?>
                <div class="col-md-3">
                <label class="control-label">Product Code</label>
                <input type="text" name="productCode" value="<?php echo $value->productCode ?>" class="form-control" id="productCode" readonly="readonly">
                 <input type="text" name="id" value="<?php echo $value->id ?>" class="form-control" id="id" hidden="hidden">

                </div>
              <div class="col-md-3">
                <label class="control-label">Product Group</label>
                <input type="text" name="productGroup" value="<?php echo $value->productGroup ?>" class="form-control" id="productGroup">
              </div>
              <div class="col-md-3">
                        <label class="control-label">Product Name</label>
                        <input type="text" name="productName" value="<?php echo $value->productName ?>" class="form-control" id="productName">
              </div>
              <div class="col-md-3">
                        <label class="control-label">Product Type</label>
               
                     <input type="text" class="form-control" value="<?php echo $value->productType ?>" name="productType" id="productType">
                            
                            
              </div>
    </div>

<div class="row form-group col-md-12">              
    <div class="col-md-3">
    <label class="control-label">Product Description</label>
    <input type="text" name="productDescription" value="<?php echo $value->productDescription ?>" class="form-control" id="productDescription">
    </div>
    <div class="col-md-3">
    <label class="control-label">Selling Price</label>
    <input type="text" name="sellingPrice" value="<?php echo $value->sellingPrice ?>" class="form-control" id="sellingPrice">
    </div>
    <div class="col-md-3">
    <label class="control-label">Product Price</label>
    <input type="tex" name="productPrice" value="<?php echo $value->productPrice ?>" class="form-control" id="productPrice">
    </div>
    <div class="col-md-3">
    <label class="control-label">MRP Price</label>
    <input type="tex" name="mrpPrice" value="<?php echo $value->mrpPrice ?>" class="form-control" id="mrpPrice">
    </div>
</div>
<div class="row form-group col-md-12">
    <div class="col-md-3">
        <label class="control-label">Opening Stock    </label>
        <input type="text" name="openingStock" value="<?php echo $value->openingStock ?>" class="form-control" id="openingStock">
    </div> 
    <div class="col-md-3">
        <label class="control-label">Unit Type</label>
        <input type="text" class="form-control" value="<?php echo $value->unit ?>" name="unitType" id="unit">
              
              
    </div>
                    
    <div class="col-md-3">
        <label class="control-label">Sales Tex Type</label>
        <input type="text" class="form-control" value="<?php echo $value->salesType ?>" name="salesType" id="salesType">
                          
    </div>
                     
    <div class="col-md-3">
        <label class="control-label">Purchase Tex Type</label>
        <input type="text" class="form-control" value="<?php echo $value->purchaseType ?>" name="purchaseType" id="purchaseType">
              
    </div>
</div>
<div class="row form-group col-md-12">
    <div class="col-md-3">
        <label class="control-label">Tex Calculation Type</label>
        <select type="text" class="form-control" value="<?php echo $value->subUnit ?>" name="calculation" id="calculation">
                
                <option  value="Including">Including</option>
              <option  value="Excluding">Excluding</option>
                
     </select>
    </div>
    <div class="col-md-3">
      <label class="control-label">Allow Negative Stock</label>
      <input type="text" class="form-control" value="<?php echo $value->negativeStock ?>" name="negativeStock" id="negativeStock">
      
    </div>

    <div class="col-md-3">
        <label class="control-label">HSN Code</label>
        <input type="text" name="hsnCode" id="hsnCode" value="<?php echo $value->hsnCode ?>" class="form-control">
    </div>
    <div class="col-md-3">
       <label class="control-label">Min. Qty</label>
       <input type="text" name="minQty" id="minQty" value="<?php echo $value->minQty ?>" class="form-control">
    </div>
</div>

               
<div class="row form-group col-md-12 ">            
    <div class="col-md-3">
         <label class="control-label">Sub Unit</label>             
        <input type="text" class="form-control" value="<?php echo $value->subUnit ?>" name="subUnit" id="subUnit">
            
    </div>
    
</div>
    
               
              </form>
<?php } ?>
              

</div>

</div>


</div>


</div>
</div>

</div>


</body>
</html>
<?php $this->load->view('admin/layouts/footer'); ?>