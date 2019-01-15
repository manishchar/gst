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


<table class="table">
  <thead>
    <tr>
      <th>SNO</th>
      <th>Company Name</th>
      <th>Contact</th>
      <th>Contact</th>
    </tr>
  </thead>
</table>
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