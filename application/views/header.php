<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Advance Vitae</title>
        <!-- Bootstrap core CSS -->
        <link type="text/css" href="<?php echo asset_url('css/bootstrap.css'); ?>" rel="stylesheet" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link type="text/css" href="<?php echo asset_url('css/style.css'); ?>" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo asset_url('js/jquery-3.3.1.min.js'); ?>"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120267387-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-120267387-1');
        </script>

    </head>
    <body>
        <div class="container">
            <!-- Static navbar -->
            <nav class="navbar" style="padding-top: 27px;">
                <div class="">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo asset_url('images/logo (2).png'); ?>" style="padding: 0"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            
                                <?php
                                    if($user_id>0){
                                        ?>
                                        <li class="dropdown">
                                        <!--<a href="javascript:void(0);" class="user"><img class="img img-circle" src="assets/images/user.jpg" /><?php echo $this->session->userdata('user_name'); ?> <span class="caret"></span></a>-->
                                        <a class="nav-link dropdown-toggle user" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <img class="img img-circle" src="<?php echo asset_url('users/'.$this->session->userdata('user_image')); ?>" /> <?php echo $this->session->userdata('user_name'); ?> <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                          <li><a class="dropdown-item" href="<?php echo base_url('user/profile'); ?>">Profile</a></li>
                                          <li><a class="dropdown-item" href="<?php echo base_url('user/logout'); ?>">Logout</a></li>
                                        </ul>
                                        </li>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <li><a href="#" data-toggle="modal" data-target="#myModal">Sign In <span class="caret"></span></a></li>
                                        <!--<li><a href="#" data-toggle="modal" data-target="#signUpModal">Sign Up <span class="caret"></span></a></li>-->
                                        <?php
                                    }
                                ?>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
                <!--/.container-fluid -->
            </nav>
        </div>
        <!-- /container -->
        <?php
            if($this->session->userdata('error')!=''){
                ?>
                <div class="container">
                    <div class="alert alert-danger">
                        <?php echo $this->session->userdata('error'); ?>
                    </div>
                </div>
                <?php
                $this->session->unset_userdata('error');
            }
        ?>