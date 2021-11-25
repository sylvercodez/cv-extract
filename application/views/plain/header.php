<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= asset_url('plain/img/favicon.png')?>">
    <!-- Author Meta -->
    <meta name="author" content="codethemes">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Advance Vitae</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,700,900" rel="stylesheet">
    <!-- ===========================================
		CSS
	============================================= -->
    <link rel="stylesheet" href="<?= asset_url('plain/css/linearicons.css')?>">
    <link rel="stylesheet" href="<?= asset_url('plain/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?= asset_url('plain/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?= asset_url('plain/css/magnific-popup.css')?>">
    <link rel="stylesheet" href="<?= asset_url('plain/css/nice-select.css')?>">  
    <link rel="stylesheet" href="<?= asset_url('plain/css/animate.min.css')?>">
    <link rel="stylesheet" href="<?= asset_url('plain/css/owl.carousel.css')?>">
    <link rel="stylesheet" href="<?= asset_url('plain/css/main.css')?>">


    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120267387-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-120267387-1');
    </script>
</head>
    <body class="version1">    
            <!-- start Header Area -->
            <header id="header">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-between">
                        <div id="logo">
                            <a href="<?= base_url()?>"><img src="<?= asset_url('images/logo.png')?>" alt="" title="" /></a>
                        </div>
                        <div class="nav-wrap d-flex flex-row align-items-center">
                            <nav id="nav-menu-container">
                                <ul class="nav-menu">
                                    <li style="padding: 8px 0px 8px 0px;"><a href="<?= base_url()?>">Home</a></li>  
                                    <li style="padding: 8px 0px 8px 0px;"><a href="<?= base_url()?>#feature">Feature</a></li>
                                    <li style="padding: 8px 0px 8px 0px;"><a href="<?= base_url()?>#price">Pricing</a></li>                             
                                    <li style="padding: 8px 0px 8px 0px;"><a href="<?= base_url()?>#contact">Contact</a></li>
                                    <li style="padding: 8px 0px 8px 0px;"><a href="<?= base_url('cvs')?>">Templates</a></li>
                                    <!-- <li><a href="register.html">Register</a></li> -->
                                <?php if($user_id>0): ?>
                                <!-- <div class="dropdown"> -->
                                <li class="dropdown">
                                    <!--<a href="javascript:void(0);" class="user"><img class="img img-circle" src="assets/images/user.jpg" /><?php echo $this->session->userdata('user_name'); ?> <span class="caret"></span></a>-->
                                    <a class="profile-btn nav-link dropdown-toggle user" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!-- <button class="btn btn-primary dropdown-toggle user" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navbarDropdown" style="margin-left: 30px; background-color: #5fbafc; border: none;"> -->
                                        <?php echo $this->session->userdata('user_name'); ?> <span class="caret"></span>
                                    <!-- </button> -->
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="<?php echo base_url('user/profile'); ?>">Profile</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url('user/logout'); ?>">Logout</a></li>
                                    </ul>
                                </li>
                                <?php else: ?>
                                <li style="padding: 8px 0px 8px 0px;"> 
                                    <a class="signup-btn" href="#" data-toggle="modal" data-target="#myModal">Sign in</a>
                                </li>
                                <?php endif; ?>
                                </ul>
                                
                            </nav>
                            
                        </div>
                        <!-- #nav-menu-container -->
                    </div>
                </div>
            </header>
            <!-- End Header Area -->