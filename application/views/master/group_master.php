<!DOCTYPE html>
<html lang="en-us">
  <head>
  <?php $this->load->view('admin/layouts/meta'); ?>
  </head>

  <body class="layout layout-vertical layout-left-navigation layout-below-toolbar">
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

          <div class="col-md-12 ">
                    <div class="form-group">
                      <?php echo form_open('Company/group_master'); ?>
                      <?php echo validation_errors(); ?>
                              
                          <div class="col-md-12">
                            
        <div class="col-md-4 form-group">
        <input type="text" class="form-control" id="first_name" aria-describedby="emailHelp" name="first_name" autocomplete="off" value="<?= isset($employee->first_name)?$employee->first_name:set_value('first_name'); ?>">
        <label for="first_name">First name</label>
        <small id="emailHelp" class="form-text text-muted"><?php echo form_error('first_name', '<span class="text text-danger">', '</span>'); ?></small>
        </div>
                               
                              </div>
                          </div>
                          <div class="col-md-12">
                            <div class="col-md-6">
                                <select class="form-control" name="groupName" required="required"  >
                                    <option value="0">Select Group</option>
                                    <option value="1">Group1</option>
                                    <option value="2">Group2</option>
                                    <option value="3">Group3</option>
                         
                                  </select>  
                                </div>
                              <div class="col-md--6" style="display: inline-flex;padding: 0;margin-left: 50%;">
                                <button name="add" value="submit" class="btn  " style="width: 120px;margin: 10px 10px; margin-left: 10px; background-color: blue; color: white;">Add</button> 
                                <button name="delete" value="delete" class="btn  btn-secondery " style="width: 120px;margin: 10px 10px; background-color: red; color: white;">Delete</button> 
                              </div>
                              
                          </div>
                            
                   <?php echo form_close();?>
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

