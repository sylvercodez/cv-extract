<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                Profile</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Dashboard</li>
        </ol>
        <div class="clearfix">
        </div>
    </div>

<!-- Full Width Column -->
<div class="page-content">
    <div id="tab-general">

    <div class="panel"> 
            <!-- Content Header (Page header) -->
          

            <!-- Main content -->
            <section class="content" style="padding: 10px;">
                <?php $this->load->view('admin/alerts'); ?>
                <!-- Default box -->
                <form action="<?php echo site_url('admin/ChangePassword/update'); ?>" method="post">
                    <div class="box box-default">
                        <div class="box-header with-border">
                        <h1><i class="fa fa-cog box-title"></i> Change Password</h1>
                            
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="password" name="current_password" id="current_password" class="form-control" />
                                        <?php echo form_error('current_password'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_password" id="new_password" class="form-control" />
                                        <?php echo form_error('new_password'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" />
                                        <?php echo form_error('confirm_password'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <button type="submit" class="btn btn-priamry"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    </div>
    <!-- /.content-wrapper -->
</div>