<?php
    if($this->session->flashdata('error')){
        ?>
        <div class="alert alert-danger fade in alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<p><strong><i class="fa fa-remove"></i></strong> <?php echo $this->session->flashdata('error'); ?></p>
		</div>
        <?php
    }
    else if($this->session->flashdata('success')){
        ?>
        <div class="alert alert-success fade in alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<p><strong><i class="fa fa-check"></i></strong> <?php echo $this->session->flashdata('success'); ?></p>
		</div>
        <?php
    }
    else if($this->session->flashdata('info')){
        ?>
        <div class="alert alert-info fade in alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<p><strong><i class="fa fa-info"></i></strong> <?php echo $this->session->flashdata('info'); ?></p>
		</div>
        <?php
    }
    else if($this->session->flashdata('warning')){
        ?>
        <div class="alert alert-warning fade in alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<p><strong><i class="fa fa-warning"></i></strong> <?php echo $this->session->flashdata('warning'); ?></p>
		</div>
        <?php
    }
?>