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
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/stage.css'); ?>">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" type="text/css">
<style type="text/css"> 



</style>
<!-- CONTENT -->
<div class="page-content p-6">
<div class="topTab" style="margin-top: 0px;">
<ul class="topUL">


</a>
</li>
</ul>
</div>

</div>


</div>

<script>

</script>

<script type="text/javascript">

</script>
</div>
</div>

</div>

<!-- DEMO MODAL -->
<div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLiveLabel">Add Notes</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <textarea style="height: 100px; resize: none;" required="required" class="form-control"></textarea>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save</button>
</div>
</div>
</div>
</div>
</main>
</body>
</html>