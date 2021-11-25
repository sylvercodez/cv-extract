<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="mypanel">
		<div class="row user">
			<div class="col-sm-6">
				<div class="user-block">
					<img class="img-circle" src="<?php echo asset_url('users/'.$this->session->userdata('user_image')); ?>" alt="User Image" />
					<span class="username"><a href="#"><?php echo $this->session->userdata('user_name'); ?></a></span>
					<span class="description"><?php echo $this->session->userdata('gender').": ".$this->session->userdata('age')." - ".$this->session->userdata('city').", ".$this->session->userdata('country'); ?></span>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right">
					<a href="<?php echo base_url('user/editprofile'); ?>" class="btn edit-profile">Edit Profile</a>
				</div>
			</div>
		</div>
		<hr style="border-color: #1aa3f3;" />
		<div class="row my-cv">
			<div class="col-sm-6">
				<h1 style="margin-top: 0px;color: #FFF;">My CVs</h1>
			</div>
			<div class="col-sm-6">
				<div class="pull-right">
					<a href="<?php echo base_url('cvs'); ?>" class="btn create-new-cv">Create New CV</a>
				</div>
			</div>
		</div>
	
        <div class="row">
			<?php
				foreach($cvs as $key=>$val){
					?>
					<div class="col-md-4 col-sm-6">
						<div class="cv-box">
							<a href="<?php echo base_url('cvs/fillinfo/'.$val->cv_id); ?>">
								<img src="<?php echo asset_url('cvs/'.$val->image); ?>" class="image" />
								<div class="middle">
									<div class="text edit-cv-btn">Edit CV</div>
								</div>
							</a>
						</div>
					</div>
					<?php
				}
			?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center form-group">
                <a id="top" href="#top"><img src="<?php echo asset_url('images/top.png'); ?>" /></a>
            </div>
        </div>
    </div>
</div>