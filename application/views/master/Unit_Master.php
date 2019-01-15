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
       <form method="POST" id="unitForm">
      <div class=" row form-group col-md-12">
               <div class="col-md-4"  ">
                <label class="control-label" for="unit"  required="required">Unit Name</label>
                <input type="text" name="id" id="id" class="form-control" hidden="hidden" >
                <input type="text" name="unitName" id="unitName" class="form-control" required="required">
          </div>
      </div>
      <div class=" row form-group col-md-12">
          <div class="col-md-6">
                <label for="group">All Units </label>
                <select type="text" class="form-control" value="unit" name="unit" id="unitEdit" required="required">
                   <option value="0">Root</option>
                      <?php
                        if($all_units){
                        foreach ($all_units as $key => $value) { 
                                  ?>
                      <option  value="<?php echo $value->id ; ?>"><?php echo  $value->unit ;?>
                      </option>
                  <?php
                     }
                     }
                    ?>
               </select>
          </div>
           <div class="col-md-6 " style="margin:30px 0px;" >
                     <button type="submit" value="add" name="submit" id="unitSubmit" class="btn " style="width:120px; background-color: blue; color: white; ">ADD</button>
                    <button type="button" value="delete" name="delete" id="unitDelete" class="btn btn-danger" style="width:120px;">DELETE</button>
          </div> 
      
    </div>
  </form>
        </div>


        </div>


        </div>
        </div>
      </div>

    </div>
  </body>
</html>
<?php $this->load->view('admin/layouts/footer'); ?>
