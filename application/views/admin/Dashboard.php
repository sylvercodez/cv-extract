<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Full Width Column -->
<div class="content-wrapper">
	<div class="<?php echo CONTAINER; ?>">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1><i class="fa fa-dashboard"></i> Dashboard</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
            <?php $this->load->view('admin/alerts'); ?>
			<!-- Default box
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Dashboard</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					
				</div>
			</div>
			-->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.container -->
</div>
<!-- /.content-wrapper -->