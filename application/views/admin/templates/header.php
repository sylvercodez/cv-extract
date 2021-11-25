<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<title>Advance Vitae</title>
    	<!-- Tell the browser to be responsive to screen width -->
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport" />
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/ace/css/chosen.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/ace/css/ace.min.css" />
		
    	<!-- Bootstrap 3.3.5 -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" />
    	<!-- Font Awesome -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css" />
    	<!-- Ionicons -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ionicons.min.css" />
    	<!-- Theme style -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/AdminLTE.min.css" />
    	<!-- AdminLTE Skins. Choose a skin from the css/skins
    		   folder instead of downloading all of them to reduce the load. -->
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/skins/_all-skins.min.css" />
    
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datetimepicker/datetimepicker.css" />
    	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/custom.css" />
        
        <!-- jQuery 2.2.0 -->

        <script src="<?= base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    	<!-- Bootstrap 3.3.5 -->
    	<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
    
    </head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    
    <body class="hold-transition skin-blue-light layout-top-nav fixed">
    	<div class="wrapper">
    
    		<header class="main-header">
    			<nav class="navbar navbar-fixed-top">
    				<div class="<?php echo CONTAINER; ?>">
    					<div class="navbar-header">
    						<a href="#" class="navbar-brand"><b>Advance</b>Vitae</a>
    						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
    							<i class="fa fa-bars"></i>
    						</button>
    					</div>
    
    					<!-- Navbar Right Menu -->
                        <div class="collapse navbar-collapse" id="navbar-collapse">
    						<ul class="nav navbar-nav navbar-right">
    							<li class=""><a href="<?php echo site_url('admin/Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    							<li class=""><a href="<?php echo site_url('admin/Cv'); ?>"><i class="fa fa-list-alt"></i> CV</a></li>
    							<li class=""><a href="<?php echo site_url('admin/User'); ?>"><i class="fa fa-list-alt"></i> User</a></li>
                                <li class=""><a href="<?php echo site_url('admin/Degree'); ?>"><i class="fa fa-list-alt"></i> Degree</a></li>
    							<li class="dropdown user user-menu">
    								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                       Admin <span class="caret"></span>
                                    </a>
    								<ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo site_url('admin/ChangePassword'); ?>"><i class="fa fa-cog"></i> Change Password</a></li>
    									<li><a href="<?php echo site_url('admin/SignOut'); ?>"><i class="fa fa-sign-out"></i> Sign Out</a></li>
    								</ul>
    							</li>
    						</ul>
    					</div>
    					<!-- /.navbar-custom-menu -->
    				</div>
    				<!-- /.container-fluid -->
    			</nav>
    		</header>