<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Welcome to Site</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport" />
		<!-- Bootstrap 3.3.5 -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" />
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css" />
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/AdminLTE.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/custom.css" />
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			
			<!-- /.login-logo -->
			<div class="login-box-body">
                <center>
                    <img src="<?php echo base_url(); ?>assets/admin/images/default.jpg" class="img img-circle" />
                </center>
				<div class="login-logo">
					<a href="#"><b>Welcome to Site</b></a>
				</div>
				<p class="login-box-msg">Sign in to start your session</p>
                <?php $this->load->view('admin/alerts'); ?>
                <?php echo form_open('admin/SignIn/doSignIn', 'class="form-validate" id="loginForm"'); ?>
					<div class="form-group has-feedback">
                        <?php echo form_input(array('id'=>'userName','name'=>'userName', 'value'=>set_value('userName'),'class'=>'form-control', 'placeholder'=>"User Name", 'autofocus'=>"true", 'required'=>"true")); ?>
						<span class="fa fa-user-circle form-control-feedback"></span>
                        <?php echo form_error('userName'); ?>
					</div>
					<div class="form-group has-feedback">
                        <?php echo form_password(array('id'=>'password','name'=>'password', 'class'=>'form-control', 'placeholder'=>"Password", 'required'=>"true")); ?>
						<span class="fa fa-handshake-o form-control-feedback"></span>
                        <?php echo form_error('password'); ?>
					</div>
					<div class="row">
						<div class="col-xs-12">
                            <?php echo form_button(array('type'=>'submit','name'=>'submit', 'value'=>"SignIn", 'class'=>'btn btn-primary btn-block', 'content'=>'<i class="fa fa-sign-in"></i> Sign In')); ?>
						</div>
						<!-- /.col -->
					</div>
				<?php echo form_close(); ?>
			</div>
			<!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->
		<!-- jQuery 2.2.0 -->
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/validator.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".form-validate").validate({
					// validation rules for registration form
					errorClass: "text-red",
					validClass: "text-green",
					errorElement: 'div',
					errorPlacement: function(error, element) {
						if(element.parent('.input-group').length) {
							error.insertAfter(element.parent());
						}
						else if (element.hasClass('select2')) {     
							error.insertAfter(element.next('span'));  // select2
						}
						else if (element.hasClass('chosen-select')) {     
							//error.insertAfter(element.next('span'));  // chosen-select
							//error.insertAfter("#shop_chosen");
							//element.next("div.chzn-container").append(error);
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						} else {
							error.insertAfter(element);
						}
					},
					onError : function(){
						$('.input-group.error-class').find('.help-block.form-error').each(function() {
							$(this).closest('.form-group').addClass('error-class').append($(this));
						});
					}
				});
			});
		</script>
	</body>
</html>