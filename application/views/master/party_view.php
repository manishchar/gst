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
  <button class="btn btn-sm pull-right previous" ><a href="<?php echo base_url('master/party_master')?>" class="btn btn-warning" >back</a></button>
</div>
<div class="topTab" style="margin-top: 0px;">
    <div class="row form-group col-md-12">
               
            <?php foreach($party as $value){?>
			<div class="col-md-12 row" style="margin-bottom: 10px;padding: 0px;  ">
                <img src="<?php echo base_url('assets/master/uploads/party_image')."/".$value->partyImage ?>" style='width: 30%; height: 10%; padding: 0px; border: 5px solid black; padding: 5px;'> 
          </div>
		  
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">Customer Type</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->customerType ?></div>
          </div>
        </div>

        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">Customer/Company Name</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->customer ?></div>
          </div>
        </div>
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">Primary Contact Person</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->primaryContactPerson ?></div>
          </div>
        </div>
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">Email</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->email ?></div>
          </div>
        </div>
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">Mobile</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->mobile ?></div>
          </div>
        </div>
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">Billing Address</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->billingAddress ?></div>
          </div>
        </div>
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">Address line2</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->addressLine2 ?></div>
          </div>
        </div>
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">City</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->city ?></div>
          </div>
        </div> 
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">State</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->state ?></div>
          </div>
        </div> 
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">Pin</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->pin ?></div>
          </div>
        </div> 
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">GSTIN No</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->gstinNo ?></div>
          </div>
        </div> 
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">Pan No</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->panNo ?></div>
          </div>
        </div>
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">Collection Route</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->collectionRoute ?></div>
          </div>
        </div>
        <div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">Opening Balance</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->openingBalance ?></div>
          </div>
        </div><div class="col-md-6 row form-group">
          <div class=" col-md-6">
             <div class="">Required SMS</div>
          </div>
          <div class="col-md-6">
                <div ><?php echo $value->requiredSms ?></div>
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