<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Av-Code | Admin | Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= asset2_url('images/icons/favicon.ico') ?>">
    <link rel="apple-touch-icon" href="<?= asset2_url('images/icons/favicon.png') ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= asset2_url('images/icons/favicon-72x72.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= asset2_url('images/icons/favicon-114x114.png') ?>">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="<?= asset2_url('styles/jquery-ui-1.10.4.custom.min.css') ?>">
    <link type="text/css" rel="stylesheet" href="<?= asset2_url('styles/font-awesome.min.css') ?>">
    <link type="text/css" rel="stylesheet" href="<?= asset2_url('styles/bootstrap.min.css') ?>">
    <link type="text/css" rel="stylesheet" href="<?= asset2_url('styles/animate.css') ?>">
    <link type="text/css" rel="stylesheet" href="<?= asset2_url('styles/all.css') ?>">
    <link type="text/css" rel="stylesheet" href="<?= asset2_url('styles/main.css') ?>">
    <link type="text/css" rel="stylesheet" href="<?= asset2_url('styles/style-responsive.css') ?>">
    <link type="text/css" rel="stylesheet" href="<?= asset2_url('styles/zabuto_calendar.min.css') ?>">
    <link type="text/css" rel="stylesheet" href="<?= asset2_url('styles/pace.css') ?>">
    <link type="text/css" rel="stylesheet" href="<?= asset2_url('styles/jquery.news-ticker.css') ?>">
</head>
<body>
<div>

    <!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="<?= base_url()?>" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">Av-Code</span><span style="display: none" class="logo-text-icon">µ</span></a></div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>

                <form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
                    <div class="input-icon right text-white"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Search here..." class="form-control text-white"/></div>
                </form>

                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="<?= asset2_url('images/avatar/48.jpg') ?>" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs">Admin</span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">                            
                            <li><a href="<?= base_url('admin/changePassword')?>"><i class="fa fa-lock"></i>Change Password</a></li>
                            <li><a href="<?= base_url('admin/signOut')?>"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>

    </div>
    <!--END TOPBAR-->
    <div class="container-fluid" id="wrapper">
        <!--BEGIN SIDEBAR MENU-->
        <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
             data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">

                    <div class="clearfix"></div>
                    <li class="<?= (isset($header_active) && $header_active == 'dashboard') ? "active": ""?>"><a href="<?= base_url('admin/dashboard')?>"><i class="fa fa-tachometer fa-fw">
                                <div class="icon-bg bg-orange"></div>
                            </i><span class="menu-title">Dashboard</span></a></li>
                    <li class="<?= (isset($header_active) && $header_active == 'cvs') ? "active": ""?>"><a href="<?=base_url('admin/cv')?>"><i class="fa fa-list-alt fa-fw">
                                <div class="icon-bg bg-pink"></div>
                            </i><span class="menu-title">CVs</span></a>

                    </li>
                    <li class="<?= (isset($header_active) && $header_active == 'users') ? "active": ""?>"><a href="<?=base_url('admin/user')?>"><i class="fa fa-users fa-fw">
                                <div class="icon-bg bg-green"></div>
                            </i><span class="menu-title">Users</span></a>

                    </li>                    
                    <li class="<?= (isset($header_active) && $header_active == 'payments') ? "active": ""?>"><a href="<?=base_url('admin/payments')?>"><i class="fa fa-edit fa-fw">
                                <div class="icon-bg bg-violet"></div>
                            </i><span class="menu-title">Payments</span></a>

                    </li>

                </ul>
            </div>
        </nav>
        <!--END SIDEBAR MENU-->
