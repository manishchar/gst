<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="http://fuse-bootstrap4-material.withinpixels.com/assets/favicon.ico" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700italic,700,900,900italic" rel="stylesheet">

    <!-- STYLESHEETS -->
    <style type="text/css">
            [fuse-cloak],
            .fuse-cloak {
                display: none !important;
            }
        </style>
    <!-- Icons.css -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assets/icons/fuse-icon-font/style.css">
    <!-- Animate.css -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/animate.css/animate.min.css">
    <!-- PNotify -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/pnotify/pnotify.custom.min.css">
    <!-- Nvd3 - D3 Charts -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/nvd3/build/nv.d3.min.css" />
    <!-- Perfect Scrollbar -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css" />
    <!-- Fuse Html -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/fuse-html/fuse-html.min.css" />
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main.css">
    <!-- / STYLESHEETS -->

    <!-- JAVASCRIPT -->
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
    <!-- Mobile Detect -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/mobile-detect/mobile-detect.min.js"></script>
    <!-- Perfect Scrollbar -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <!-- Popper.js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/popper.js/index.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/bootstrap/bootstrap.min.js"></script>
    <!-- Nvd3 - D3 Charts -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/d3/d3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/nvd3/build/nv.d3.min.js"></script>
    <!-- Data tables -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/datatables-responsive/js/dataTables.responsive.js"></script>
    <!-- PNotify -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/pnotify/pnotify.custom.min.js"></script>
    <!-- Fuse Html -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/fuse-html/fuse-html.min.js"></script>
    <!-- Main JS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/main.js"></script>
    <!-- / JAVASCRIPT -->
</head>

<body class="layout layout-vertical layout-left-navigation layout-below-toolbar">
    <main>
        <div id="wrapper">
         
            <div class="content-wrapper">
               
                <div class="content custom-scrollbar">

                    <div id="login" class="p-8">

                        <div class="form-wrapper md-elevation-8 p-8">

                            <div class="logo bg-secondary">
                                <span>F</span>
                            </div>

                            <div class="title mt-4 mb-8">Log in to your account</div>
                <form name="loginForm" action="<?php echo base_url('login/user_login') ?>" method="post" >
                                 <div class="form-group mb-4">
                                 <input type="email" class="form-control" id="loginFormInputEmail" aria-describedby="emailHelp" name="email" placeholder=" "  required="required" />
                                    <label for="loginFormInputEmail">Email address</label>
                                </div>

                                <div class="form-group mb-4">
                                    <input type="password" class="form-control" id="loginFormInputPassword" placeholder="" required="required" name="password" />
                                    <label for="loginFormInputPassword">Password</label>
                                </div>
                                <button type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto" aria-label="LOG IN">
                                    LOG IN
                                </button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
           
        </div>
    </main>
</body>
</html>