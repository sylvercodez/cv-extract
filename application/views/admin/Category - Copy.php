<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Full Width Column -->
<div class="content-wrapper">
	<div class="<?php echo CONTAINER; ?>">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1><i class="fa fa-list-alt"></i> Category</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-list-alt"></i> Category</a></li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
            <?php $this->load->view('admin/alerts'); ?>
            <?php
                if($action=='view'){
                    ?>
        			<!-- Default box -->
        			<div class="box box-default">
        				<div class="box-header with-border">
        					<h3 class="box-title">Category</h3>
        					<div class="box-tools pull-right">
        						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        					</div>
        				</div>
        				<div class="box-body">
        					<table class="table table-hover table-striped data-table">
                                <thead>
                                    <tr>
                                        <th>#No</th>
                                        <th>Name</th>
                                        <th>Parent Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
        				</div>
        			</div>
                    <?php
			     }
            ?>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.data-table').DataTable( {
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "oLanguage": {
                "sProcessing": '<i class="fa fa-spinner fa-spin"></i> Please wait...'
            },
            "processing" : true,
            "columnDefs": [
               { "orderable": false, "targets": -1 },
               { "searchable" : false, "targets" : [0,3,4] }
            ],
            "order": [[ 1, "asc" ]],
            "ajax": {
                url: '<?php echo site_url('CategoryJson'); ?>',
                type: 'POST'
            }
        });
    });
</script>