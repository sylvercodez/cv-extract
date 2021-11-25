<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Full Width Column -->
<div class="content-wrapper">
	<div class="<?php echo CONTAINER; ?>">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1><i class="fa fa-cog"></i> Change Password</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-cog"></i> Change Password</a></li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
            <?php $this->load->view('admin/alerts'); ?>
			<!-- Default box -->
            <form action="<?php echo site_url('admin/ChangePassword/update'); ?>" method="post">
    			<div class="box box-default">
    				<div class="box-header with-border">
    					<h3 class="box-title">Change Password</h3>
    					<div class="box-tools pull-right">
    						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    					</div>
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
<!-- /.content-wrapper -->