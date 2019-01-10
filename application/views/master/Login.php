
<!--  -->
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$pageName?></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?=base_url()?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?=base_url()?>assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  setTimeout(fade_out, 3000);

function fade_out() {
  $("#mydiv").fadeOut().empty();
}
</script>
</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="<?=base_url('assets')?>/images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="post" action="<?=base_url('Login/authanticationUser')?>">
                      <div class="alert-danger" id="mydiv"><?php echo $this->session->flashdata('error'); ?></div>
                    
                        <div class="form-group">
                            <label>Select Company</label>
                            <select class="form-control" id="userrole" name="CompanyName" required="" >
                                <option value="0" selected="" disabled="">-Select company--</option>
                                <?php

                                foreach ($companyName as $key => $value) { ?>

                                <option value="<?= $value['companyName'] ?>"><?php echo $value['companyName']; ?></option>
                                <?php
                                }
                                ?>    
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select User</label>
                            <select class="form-control" id="userrole" name="userRole" required="" > 
                                  <option value="0" selected="" disabled="">-Select User--</option>
                                  <option value="" selected="" disabled="">-Select User--</option>
                                  <option value="0">Admin</option>
                                  <option value="1">Vendor</option>
                                  <option value="3">Contractor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>User Id</label>
                            <input type="text" class="form-control" placeholder="User Id" name="userId" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" minlength="6"  maxlength="12" name="password" required="" autocomplete="off">
                        </div>
                      
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="form-group">
                         <a href="<?php echo site_url('Login/crteateCompany');  ?>" class="text-info">Create Company</a> - <a href="#" >Forgot Password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?=base_url()?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?=base_url()?>assets/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins.js"></script>
    <script src="<?=base_url()?>assets/js/main.js"></script>


</body>
</html>
