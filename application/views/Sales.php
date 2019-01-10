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
      <div class="box-body" >
                <div>
                   <input type="" name="" placeholder="Invoice Type" > 
                   <select type="" class="form control" value="" name="tax Invoice" style="width: 150px; height: 10px">
                    <option>include bill</option>
                   <option>include bill</option>
                     
                   </select>
                   
                </div>
               <div>
                 <input type="" name="" placeholder="Invoice No">
                 <input type="" name=""> 
               </div>
               <div>
                 <input type="" name="" placeholder="Date"> 
                 <input type="" name="">
               </div>
               <div>
                  <input type="" name="" placeholder="Voucher Type">
                  <input type="" name="">
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