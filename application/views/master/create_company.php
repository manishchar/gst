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
<form class="" method="post" enctype="multipart/form-data">
  <div class="card  container" style="margin-top: 1em;padding:10px 20px;background-color: #FFFFFF;" >
        <div class="row" id="mydiv">
           <div class="col-sm-12">
            <?php
            if($this->session->flashdata('message')){ ?>
          <div class="alert alert-success">
           <?php echo $this->session->flashdata('message'); ?>
             
           </div>
            <?php } ?>
            
            <?php
            if($this->session->flashdata('error')){ ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('error'); ?>
                
              </div>
            <?php }
            ?>
                            
           </div>
        </div>
    <div class="row">
      <div class="col-md-6 col-lg-6">
          <div class="form-group">
            <label class="control-label"><b>Select Company</b></label>
            <select class="form-control"  name="companyName" id="companyName"  onchange="getgroup(this.value)"> 
                  <option value="0" selected="" >-Select company--</option>
                  <?php

                  foreach ($companyName as $key => $value) { ?>

                  <option value="<?= $value['cmId'] ?>"><?php echo $value['companyName']; ?></option>
                  <?php
                  }
                  ?>  
                  
            </select>
          </div>
      </div>
      <div class="col-md-6 col-lg-6">
      <div class="col-md-4 col-lg-4 float-right">
        <div class="form-group">
          <label class="control-label"></label>
          <button type="submit" onclick="return confirm('Are You sure to Delete?')" name="delete" value="delete" id="delete" class="form-control btn btn-danger" disabled="">Delete</button>
        </div>
      </div>
      </div> 
    </div>
    <div class="">
            <h5 class="card-title">
              <i class="glyphicon glyphicon-search text-gold"></i>
              <b>General Information</b>
            </h5>
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
          <div class="form-group">
            <label class="control-label">Company Name</label>
            
            <input type="text"  class="form-control" placeholder="Company Name" id="companyName1" name="companyName" value="<?php echo set_value('companyName'); ?>" required data-validation="required"/>
            <span class="text text-danger"></span>
           <?php echo form_error('companyName', '<span class="text text-danger">', '</span>'); ?>
           <span id="error_name" class="text-danger"></span>
          </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Address</label>
          <input type="text" id="address" value="<?php echo set_value('address'); ?>" class="form-control" placeholder="Enter Address" name="address" />
          <span id="error_address" class="text-danger"></span>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Contact no</label>
          <input class="form-control"  value="<?php echo set_value('contactNo'); ?>" id="contactNo" type="text" placeholder="Enter Contact Number" name="contactNo" />
        </div>
      </div>

      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Email ID</label>
          <input class="form-control" value="<?php echo set_value('emailId'); ?>" id="emailId" type="emailId" placeholder="Enter Email Id" name="emailId" required="" />
        </div>
      </div> 
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
          <div class="form-group">
            <label class="control-label">GSTIN no</label>
            <input type="text" id="gistinNo" class="form-control" placeholder="Enter GST Number"
            name="gistinNo" value="<?php echo set_value('gistinNo'); ?>"  />
          </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Pan no</label>
          <input type="text" class="form-control" placeholder="Enter Pan Number" name="panNo" id="panNo" value="<?php echo set_value('panNo'); ?>" />
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Cin no</label>
          <input class="form-control" type="text" placeholder="cinNo" name="cinNo" id="cinNo" value="<?php echo set_value('cinNo'); ?>"  />
        </div>
      </div>

      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Aadhaar no</label>
          <input class="form-control" type="text" placeholder="Enter Aadhaar Number" name="aadhaarNo" id="aadhaarNo"  value="<?php echo set_value('aadhaarNo'); ?>"/>
        </div>
      </div> 
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
          <div class="form-group">
            <label class="control-label">Bank Account no</label>
            <input type="text" class="form-control" name="bankAccountNo" placeholder="Enter Bank Account No" id="bankAccountNo" value="<?php echo set_value('bankAccountNo'); ?>" />
          </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Bank Account Name</label>
          <input type="text" class="form-control" placeholder="EnterBank Account Name" name="bankAccountName" id="bankAccountName" value="<?php echo set_value('bankAccountName'); ?>" />
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Bank IFSC Code</label>
          <input class="form-control" type="text" placeholder="Enter Bank IFSC Code" name=" bankIfscCode" id="bankIfscCode" value="<?php echo set_value('bankIfscCode'); ?>" />
        </div>
      </div>

      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Bank Name</label>
          <input class="form-control" type="text" placeholder="Enter Bank Name" name="bankName" id="bankName" value="<?php echo set_value('bankName'); ?>" />
        </div>
      </div> 
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
          <div class="form-group">
            <label class="control-label">Bank Branch</label>
            <input type="text" class="form-control" placeholder="Enter Bank Branch" name="branchName" id="branchName" value="<?php echo set_value('branchName'); ?>" />
          </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Estimate Series</label>
          <input type="text" class="form-control" placeholder="Enter Estimate Series" name="estimateSeries" id="estimateSeries" value="<?php echo set_value('estimateSeries'); ?>" />
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Required Barcode</label>
          <select class="form-control" id="requiredBarcode" name="requiredBarcode" > 
                <option value="0" selected="" >-Select Option--</option>
                <option value="yes" <?php if(set_value('requiredBarcode')=='yes'){ echo 'selected'; } ?>>Yes</option> 
                <option value="no" <?php if(set_value('requiredBarcode')=='no'){ echo 'selected'; } ?>>No</option>
          </select>
        </div>
      </div>

      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Seperate tex for Product</label>
          <!-- Yes -->
          <div class="radio">
            <label>
              <input type="radio" name="TaxForProduct" id="TaxForProduct1" value="Yes"  checked <?php if(set_value('TaxForProduct')=='Yes'){ echo 'checked'; } ?>>
              Yes
            </label>
          </div>
          <!-- no -->
          <div class="radio">
            <label>
              <input type="radio" name="TaxForProduct" id="TaxForProduct2" value="No" <?php if(set_value('TaxForProduct')=='No'){ echo 'checked'; } ?>>
              No
            </label>
          </div>
        </div>
      </div> 
    </div>
    <div class="">
            <h5 class="card-title">
              <i class="glyphicon glyphicon-search text-gold"></i>
              <b>Barcode</b>
            </h5>
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
          <div class="form-group">
            <label class="control-label">Barcode Title</label>
            <input type="text" class="form-control" placeholder="Enetr Barcode Title" id="barCodeTitle" name="barCodeTitle" name="barCodeTitle" value="<?php echo set_value('barCodeTitle'); ?>" />
          </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Barcode MRP Prefix</label>
          <input type="text" class="form-control" placeholder="Enter Barcode MRP Prefix" name="barCodeMrpPrefix"  id="barCodeMrpPrefix" value="<?php echo set_value('barCodeMrpPrefix'); ?>" />
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Barcode Sending Price Prefix</label>
          <input class="form-control" type="text" placeholder="Enter Barcode Sending Price Prefix" id="barCodeSendingPricePrefix" name="barCodeSendingPricePrefix" value="<?php echo set_value('barCodeSendingPricePrefix'); ?>" />
        </div>
      </div>

      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Barcode Field</label>
          <select class="form-control" id="barCodeField" name="barCodeField"  > 
                <option value="0" selected="" >-Select Option--</option>
                <option value="Yes" <?php if(set_value('barCodeField')=='1'){ echo 'selected'; } ?>>Yes</option> 
                <option value="No" <?php if(set_value('barCodeField')=='2'){ echo 'selected'; } ?>>No</option>
          </select>
        </div>
      </div> 
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
          <div class="form-group">
            <label class="control-label">Barcode Price Code</label>
         <select class="form-control" id="barCodePriceCode" name="barCodePriceCode" > 
                <option value="0" selected="" >-Select Option--</option>
                <option value="1" <?php if(set_value('barCodePriceCode')=='1'){ echo 'selected'; } ?>>Yes</option> 
                <option value="2" <?php if(set_value('barCodePriceCode')=='2'){ echo 'selected'; } ?>>No</option>
          </select>
          </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Barcode Code Field 1</label>
          <select class="form-control" id="barCodeField1" name="barCodeField1" > 
               <option value="0" selected="" >-Select Option--</option>
               <option value="1" <?php if(set_value('barCodeField1')=='1'){ echo 'selected'; } ?>>Yes</option> 
                <option value="2" <?php if(set_value('barCodeField1')=='2'){ echo 'selected'; } ?>>No</option>
          </select>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Barcode Code Field 2</label>
          <select class="form-control" id="barCodeField2" name=" barCodeField2"  >
                <option value="0" selected="" >-Select Option--</option> 
                <option value="1" <?php if(set_value('barCodeField2')=='1'){ echo 'selected'; } ?>>Yes</option> 
                <option value="2" <?php if(set_value('barCodeField2')=='2'){ echo 'selected'; } ?>>No</option>
          </select>
        </div>
      </div>

      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Barcode Code Field 3</label>
          <select class="form-control" id="usebarCodeField3rrole" name=" barCodeField3"  > 
                <option value="0" selected="" >-Select Option--</option>
                <option value="1" <?php if(set_value('barCodeField3')=='1'){ echo 'selected'; } ?>>Yes</option> 
                <option value="2" <?php if(set_value('barCodeField3')=='2'){ echo 'selected'; } ?>>No</option>
          </select>
        </div>
      </div> 
    </div>
    <div class="">
            <h5 class="card-title">
              <i class="glyphicon glyphicon-search text-gold"></i>
              <b>Logo</b>
            </h5>
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
          <div class="form-group">
            <label class="control-label">Logo</label>
            <input type="text" class="form-control" placeholder="Enter Logo" name="logo" id="logo"  value="<?php echo set_value('logo') ?>" />
          </div>
      </div>
      
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Choose Image</label>
          <img width="50px" id="blah" src="<?php echo  base_url().'assets/images/logos/fallout.png' ?>">
          <input type="file" onchange="readURL(this);" name="logoImage" />
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Invoice Format</label>
            <select class="form-control" id="invoiceFormat"  name="invoiceFormat" > 
                <option value="0" selected="" >-Select Option--</option>
                <option value="1" <?php if(set_value('invoiceFormat')=='1'){ echo 'selected'; } ?>>Yes</option> 
                <option value="2" <?php if(set_value('invoiceFormat')=='2'){ echo 'selected'; } ?>>No</option>
          </select>
        </div>
      </div>

      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Barcode Format</label>
            <select class="form-control" id="barcodeFormat" name="barcodeFormat"  > 
                <option value="0" selected="" >-Select Option--</option>
                <option value="1" <?php if(set_value('barcodeFormat')=='1'){ echo 'selected'; } ?>>Yes</option> 
                <option value="2" <?php if(set_value('barcodeFormat')=='2'){ echo 'selected'; } ?>>No</option>
          </select>
        </div>
      </div> 
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
          <div class="form-group">
            <label class="control-label">Nature of Business</label>
           
            <select  class="form-control" id="natureOfBusiness" name="natureOfBusiness" required="" data-validation="required">
                <option value="0" selected="" >--Select Option--</option>  
                <option value="1" <?php if(set_value('natureOfBusiness')=='1'){ echo 'selected'; } ?>>Yes</option> 
                <option value="2" <?php if(set_value('natureOfBusiness')=='2'){ echo 'selected'; } ?>>No</option>
          </select>
           <span class="text text-danger"></span>
           <?php echo form_error('natureOfBusiness', '<span class="text text-danger">', '</span>'); ?>
           <span id="error_nature1" class="text-danger"></span>
          </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Cash Sales Conditions</label>
          <input type="text" class="form-control" placeholder="Enter Cash Sales Conditions" name="cashSalesConditions" id="cashSalesConditions" value="set_value('cashSalesConditions');" />
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Credit Sales Conditions</label>
          <input class="form-control" type="text" placeholder="Enter redit Sales Conditions" name="creditSalesConditions" id="creditSalesConditions" value="set_value('creditSalesConditions');" />
        </div>
      </div>

      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Account Mode</label>
          
            <select class="form-control" required id="accountMode" name="accountMode"  data-validation="required"> 
                <option value="0" selected="" disabled="">-Select Option--</option>
                <option value="1" <?php if(set_value('accountMode')=='1'){ echo 'selected'; } ?>>Starting Mode</option> 
                <option value="2" <?php if(set_value('accountMode')=='2'){ echo 'selected'; } ?>>Advance Mode</option>
          </select>
          <span class="text text-danger"></span>
           <?php echo form_error('accountMode', '<span class="text text-danger">', '</span>'); ?>
           <span id="error_accountMode1" class="text-danger"></span>
          
        </div>
      </div> 
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
          <div class="form-group">
            <label class="control-label">Sub Title</label>
            <input class="form-control" name="subTitle" id="subTitle" type="text" placeholder="Enter Sub Title"  value="<?php echo set_value('subTitle') ?>" />
          </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Required Rate Calculator</label>
          <select class="form-control" id="requiredRateCalculator" name="requiredRateCalculator" >
                <option value="0" selected="" >-Select Option--</option> 
                <option id="1" value="1"  <?php if(set_value('requiredRateCalculator')=='1'){ echo 'selected'; } ?>>Yes</option> 
                <option id="2" value="2"  <?php if(set_value('requiredRateCalculator')=='2'){ echo 'selected'; } ?>>No</option>
                 
          </select>
        </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Required Product Image</label>
           <select class="form-control" id="requiredProductImage" name="requiredProductImage" >
                <option value="0" selected="" >-Select Option--</option> 
                <option value="1"  <?php if(set_value('requiredProductImage')=='1'){ echo 'selected'; } ?>>Yes</option> 
                <option value="2"  <?php if(set_value('requiredProductImage')=='2'){ echo 'selected'; } ?>>No</option>
               
          </select>
        </div>
      </div>

      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <label class="control-label">Size/Packing Calculator</label>
            <select class="form-control" id="packingCalculator" name="packingCalculator"  > 
                <option value="0" selected="" >-Select Option--</option>
                <option value="1"  <?php if(set_value('packingCalculator')=='1'){ echo 'selected'; } ?>>Yes</option> 
                <option value="2"  <?php if(set_value('packingCalculator')=='2'){ echo 'selected'; } ?>>No</option>
                
          </select>
        </div>
      </div> 
    </div>
    <div class="row">
      <div class="col-md-3 col-lg-3">
          <div class="form-group">
           <button type="submit" name="submit" value="submit" id="submitform" class="btn btn-success " style="width:100%;">Submit</button>
           
          </div>
      </div>
      <div class="col-md-3 col-lg-3">
        <div class="form-group">
          <button type="submit" name="update" id="update" value="update"  style="width:100%;" disabled="" class="btn btn-info btn-md">Modify</button>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="cmId" id="cmId">
</form>
</div>

</div>


</div>


</div>
</div>

</div>


</body>
</html>

<script type='text/javascript'>
    $("#companyName").on('change',function(){
   if($(this).find('option:selected'))
       $("#submitform").attr('disabled',true)
   else
       $("#submitform").attr('enable',true)
});
</script>


<script type="text/javascript">


   function getgroup(val){  
        jQuery.ajax({
             type: 'post',
             url: '<?php echo base_url()."Login/getgroup";?>', 
             data: {val: val},  
             success: 
                  function(data){
                    var obj=JSON.parse(data);
                    console.log(); 
                    $("#cmId").val(obj['allprojects'].cmId);
                     $("#companyName1").val(obj['allprojects'].companyName); 
                     $("#address").val(obj['allprojects'].address);
                     $("#contactNo").val(obj['allprojects'].contactNo); 
                     $("#emailId").val(obj['allprojects'].emailId); 
                     $("#gistinNo").val(obj['allprojects'].gistinNo); 
                     $("#panNo").val(obj['allprojects'].panNo);
                     $("#cinNo").val(obj['allprojects'].cinNo); 
                     $("#aadhaarNo").val(obj['allprojects'].aadhaarNo); 
                     $("#bankAccountNo").val(obj['allprojects'].bankAccountNo);
                     $("#bankAccountName").val(obj['allprojects'].bankAccountName); 
                     $("#bankIfscCode").val(obj['allprojects'].bankIfscCode);
                      $("#bankName").val(obj['allprojects'].bankName);
                     $("#branchName").val(obj['allprojects'].branchName); 
                     $("#estimateSeries").val(obj['allprojects'].estimateSeries);
                     $("#requiredBarcode1").val(obj['allprojects'].requiredBarcode);
                     $("#requiredBarcode2").val(obj['allprojects'].requiredBarcode);
                     //alert(obj['allprojects'].TaxForProduct);
                     if(obj['allprojects'].TaxForProduct=='Yes')
                     {
                      $("#TaxForProduct1").attr('checked','checked');
                      $("#TaxForProduct2").removeAttr('checked','checked');
                     }
                     else{
                       $("#TaxForProduct2").attr('checked', 'checked');
                       $("#TaxForProduct1").removeAttr('checked', 'checked');
                     }
                     $("#TaxForProduct").val(obj['allprojects'].TaxForProduct); 
                     $("#barCodeTitle").val(obj['allprojects'].barCodeTitle);
                     $("#barCodeMrpPrefix").val(obj['allprojects'].barCodeMrpPrefix);
                     $("#barCodeSendingPricePrefix").val(obj['allprojects'].gistinNo);
                     $("#barCodeField").val(obj['allprojects'].barCodeField);
                     $("#barCodePriceCode").val(obj['allprojects'].barCodePriceCode);
                     $("#barCodeField1").val(obj['allprojects'].barCodeField1);
                     $("#barCodeField2").val(obj['allprojects'].barCodeField2);
                     $("#barCodeField3").val(obj['allprojects'].barCodeField3);
                     $("#invoiceFormat").val(obj['allprojects'].invoiceFormat);        
                     $("#barcodeFormat").val(obj['allprojects'].barcodeFormat);
                     $("#natureOfBusiness").val(obj['allprojects'].natureOfBusiness); 
                     $("#cashSalesConditions").val(obj['allprojects'].cashSalesConditions); 
                     $("#accountMode").val(obj['allprojects'].accountMode); 
                     $("#subTitle").val(obj['allprojects'].subTitle);
                     $("#requiredRateCalculator").val(obj['allprojects'].requiredRateCalculator);
                     $("#requiredProductImage").val(obj['allprojects'].requiredProductImage);
                     $("#packingCalculator").val(obj['allprojects'].packingCalculator);
                     $("#subTitle").val(obj['allprojects'].subTitle);
                     $("#logo").val(obj['allprojects'].logo);
                     //alert('<?php echo base_url('assets/images/company/') ?>'+obj['allprojects'].logoImage);
                     $("#blah").attr('src','<?php echo base_url('assets/images/company/') ?>'+obj['allprojects'].logoImage);
                     $("#logoImage").val(obj['allprojects'].logoImage);
                    $("#update").attr('disabled',false);
                    $("#delete").attr('disabled',false);
                  }
              });// you have missed this bracket
       
   }
</script>

<!-- form validation -->
<script type="text/javascript">
$(document).ready(function(){
    $flag=1;
      $("#companyName1").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
              $('#submit').attr('disabled',true);
               $("#error_name").text("* You have to enter your Company name!");
          }
          else
          {
            $(this).css("border-color", "#2eb82e");
            $('#submitform').attr('disabled',false);
            $("#error_name").text("");

          }
       });
        $("#natureOfBusiness").focusout(function(){
        if($(this).val()=='0'){
            $(this).css("border-color", "#FF0000");
              $('#submitform').attr('disabled',true);
              $("#error_nature1").text("* You have to select nature Of Business!!");
          }
          else
          {
            $(this).css("border-color", "#2eb82e");
            $('#submitform').attr('disabled',false);
            $("#error_nature1").text("");
          }
       });
        
        $("#accountMode").focusout(function(){
        if($(this).val()=='0'){
            $(this).css("border-color", "#FF0000");
              $('#submitform').attr('disabled',true);
              $("#error_accountMode1").text("* You have to select Account Mode!");
          }
          else
          {
            $(this).css("border-color", "#2eb82e");
            $('#submitform').attr('disabled',false);
            $("#error_accountMode1").text("");
          }
       });
        
      $( "#submitform" ).click(function() {
        if($("#companyName1" ).val()=='')
        {
            $("#companyName1").css("border-color", "#FF0000");
              $('#submitform').attr('disabled',true);
               $("#error_name").text("* You have to enter your company name!");
          }
         
         
      
        if($("#natureOfBusiness" ).val()=='0')
        {
            $("#natureOfBusiness").css("border-color", "#FF0000");
              $('#submitfrom').attr('disabled',true);
               $("#error_nature1").text("* You have to select nature Of Business!!");
          }
          if($("#accountMode" ).val()=='0')
        {
            $("#accountMode").css("border-color", "#FF0000");
              $('#submitfrom').attr('disabled',true);
               $("#error_accountMode1").text("* You have to select Account Mode!!");
          }
       
      });
});


function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(100)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>