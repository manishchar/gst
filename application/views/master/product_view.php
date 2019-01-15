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
<div class="col-md-12">
  <button class="btn btn-sm pull-right previous" ><a href="<?php echo base_url('master/product_services')?>" >back</a></button>
</div>
  
<div class="topTab" style="margin-top: 0px;">
    <div class="row form-group col-md-12">
               
            <?php foreach($product as $value){?>
          
          <div class="col-md-12 row" style="margin-bottom: 10px;padding: 0px">
                <img src="<?php echo base_url('assets/master/uploads')."/".$value->productImage ?>" style='width: 50%; height: 150px; padding: 0px;'> 
          </div>

        <div class="col-md-6 row " style="margin-bottom: 10px;" >
          <div class=" col-md-6">
             <div class="">Product Code</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->productCode ?></div>
          </div>
        </div>

        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class="">Product Group</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->productGroup ?></div>
          </div>
        </div>
        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class="">Product Name</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->productName ?></div>
          </div>
        </div>
        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class="">Product Type</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->productType ?></div>
          </div>
        </div>
        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class="">Product Description</div>
          </div>
          <div class="col-md-6" style="margin-bottom: 10px;">
                <div ><?php echo $value->productDescription ?></div>
          </div>
        </div>
        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class="">Selling Price</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->sellingPrice ?></div>
          </div>
        </div>
        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class="">Product Price</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->productPrice ?></div>
          </div>
        </div>
        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class=""> Mrp Price</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->mrpPrice ?></div>
          </div>
        </div> 
        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class=""> Opening Stock</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->openingStock ?></div>
          </div>
        </div> 
        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class="">Unit</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->unitType ?></div>
          </div>
        </div> 
        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class=""> Sales Type</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->salesType ?></div>
          </div>
        </div> 
        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class=""> Purchase Type</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->purchaseType ?></div>
          </div>
        </div>
        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class=""> Calculation</div>
          </div>
          <div class="col-md-6" style="margin-bottom: 10px;">
                <div ><?php echo $value->calculation ?></div>
          </div>
        </div>
        <div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class="">Negative Stock</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->negativeStock ?></div>
          </div>
        </div><div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class="">Hsn Code</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->hsnCode ?></div>
          </div>
        </div><div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class="">Min Qty</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->minQty ?></div>
          </div>
        </div><div class="col-md-6 row " style="margin-bottom: 10px;">
          <div class=" col-md-6">
             <div class=""> Sub Unit</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->subUnit ?></div>
          </div>
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