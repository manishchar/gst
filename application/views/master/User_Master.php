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
       <form id="userForm" method="POST"> 
          <div class=" row col-md-12 text text-danger">
                      <?php 
                      echo validation_errors('<div class="text text-danger">', '</div>'); 
                      echo validation_errors(); 
                      ?>
          </div>
          <div class="row form-group col-md-12">   
                <div class="col-md-3">
                     <label class="control-label">User Name</label>
                     <?php $this->form_validation->error_array('userName'); ?>
                     <input type="text" name="userName" id="userName" class="form-control">
                     <input type="text" name="id" id="id" class="form-control" hidden="hidden">
                </div>
                <div class="col-md-3">
                    <label class="control-label">Name</label>
                    <?php $this->form_validation->error_array('name'); ?>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="control-label">Email</label>
                    <?php $this->form_validation->error_array('email'); ?>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="col-md-3">
                  <label class="control-label">Mobile</label>
                  <input type="text" name="mobile" id="mobile" class="form-control">
               </div>
          </div>
          <div class="row form-group col-md-12">       
                <div class="col-md-4">
                    <label class="control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="col-md-4">
                      <label class="control-label">Confirm Password</label>
                      <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
                </div>
          </div>
                <div class="row form-group col-md-12" style="margin: 10px 0px ">
                      <div class="col-md-6" style="display: inline-flex;margin: 10px 0px; ">
                        <!-- <label class="control-label"></label>
                         <select class="form-control" name=""   >
                            <option></option>
                            <option>admin</option>
                            <option>admin</option>
                            <option>admin</option>
                          </select> -->  
                      </div>
                      <div class="col-md-6 " style="display: inline-flex;padding: 0;margin: 0;">
                        <button name="add" value="submit" id="userSubmit" class="btn  " style="width: 120px;margin: 10px 10px; margin-left: 10px; background-color: blue; color: white;" >Add</button> 
                        <button type="button" name="modify" value="update" id="userUpdate" class="btn  btn-primary   " style="width: 120px;margin: 10px 10px; color: white;">Modify</button>
                        <button  type="button" name="delete" value="delete" id="userDelete" class="btn  btn-secondery " style="width: 120px;margin: 10px 10px; background-color: red; color: white;">Delete</button> 
                      </div>
          </div>
        </form>
    <div class="container">
          <table id="userTable" class="table table-responsive col-md-12">
            <thead>
               <th>userName</th>
               <th>name</th>
               <th>email</th>
               <th>mobile</th>
               <th>password</th>
               <th>action</th>
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