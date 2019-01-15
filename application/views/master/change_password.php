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


<div class="row">
  <div class="about col-12 col-md-7 col-xl-6" style="margin-left: 25%;">

      <div class="profile-box info-box contact card mb-4" >

          <!-- <header class="h6 bg-secondary text-auto p-4" >
              <div class="title">Chsnge Password</div>
           </header> -->
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
          
<form method="post" action="<?php echo base_url('Company/change_password');?>">
 <div class="col-md-12 text text-danger">
                      <?php 
                      echo validation_errors('<div class="text text-danger">', '</div>'); 
                      echo validation_errors(); 
                      ?>
                      </div>
          <div class="content p-4" >
              <div class="row form-group ">
                    <div class="col-md-12">
                       <label><b>Old Password</b></label>
                       <input type="password" name="password" placeholder="Enter Old Password" id="" class="form-control" >
                     </div>
              </div>
              <div class="row form-group ">
                    <div class="col-md-12">
                   <label><b>New Password</b></label>
                       <input type="password" name="newpass" placeholder="Enter New Password" id="" class="form-control" >
                     </div>
              </div>
              <div class="row form-group ">
                     <div class="col-md-12">
                      <label><b>New Password</b></label>
                       <input type="password" name="confpassword" placeholder="Enter New password" id="" class="form-control" >
                    </div>   
              </div>


              
              <div class="info-line mb-6">
                  <div class="info">
                       <input type="submit"  name="update" value="Update" class="btn btn-primary">
                       <input type="reset" name="reset" value="Reset" class="btn btn-warning">
            </div>
              </div>

          </div>
 </form>     
   </div>

  </div>


</div>

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

