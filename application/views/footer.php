        <!--Footer-->
        <footer class="page-footer font-small blue pt-4 mt-4">
        
          <!--Footer Links-->
          <div class="container text-md-left">
              <div class="row">
                  <!--First column-->
                  <div class="col-sm-6">
                    <div>
                      <h3 class="contact-support">Contact and Support</h3>
                      </div>
                      <ul class="footer-menu">
                        <li><a href="javascript:void(0);" >FAQs</a></li>
                        <li><a href="javascript:void(0);" >Terms & Conditions</a></li>
                        <li><a href="javascript:void(0);" >Contact</a></li>
                      </ul>
                  </div>
                  <!--/.First column-->
                  <div class="col-sm-6 text-right copyright">
                      &copy; 2016 Advance Vitae --- Made with <img class="love" src="<?php echo asset_url('images/love.png'); ?>" />
                  </div>
              </div>
          </div>
          <!--/.Footer Links-->
        
        </footer>
        <!--/.Footer-->
    
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="<?php echo asset_url('js/bootstrap.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset_url('js/script.js'); ?>"></script>
		<?php if(isset($err) && isset($err['login'])):?>

		<script type="text/javascript">
			$(window).on('load',function(){
				$('#myModal').modal('show');
			});
		</script>
		<?php elseif(isset($err) && isset($err['signup'])):?>
		<script type="text/javascript">
			$(window).on('load',function(){
				$('#signUpModal').modal('show');
			});
		</script>
		<?php endif ?>
    </body>

</html>
<?php if(!isset($_SESSION['user_id']) || !$_SESSION['user_id']):
	$this->session->set_flashdata('preaction', $this->uri->uri_string());
	?>

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
        <script src="https://apis.google.com/js/api:client.js"></script>
        
  <script>
  var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '1064984912001-e6oqm4tchuh8kdetmrjejujq8c7up9d7.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
        // Request scopes in addition to 'profile' and 'email'
        //scope: 'additional_scope'
      });
    //   attachSignin(document.getElementById('customBtn'));
      attachSignin(document.getElementsByClassName('customBtn'));
    });
  };

  function attachSignin(elements) {
      
      for (key in elements){
          var element = elements[key];
          
    auth2.attachClickHandler(element, {},
        function(googleUser) {
        //   document.getElementById('name').innerText = "Signed in: " +
            var id_token = googleUser.getAuthResponse().id_token;
            //   googleUser.getBasicProfile().getName();
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?= base_url("user/tokensignin")?>');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
            // console.log('Signed in as: ' + xhr.responseText);
            location.reload(true)
            };
            xhr.send('idtoken=' + id_token);
        }, function(error) {
          alert(JSON.stringify(error, undefined, 2));
        });

      }    
    
      }
  </script>
  <style type="text/css">
    .customBtn {
      display: inline-block;
      background: white;
      color: #444;
      width: 100%;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
    }
    .customBtn:hover {
      cursor: pointer;
    }
    span.label {
      font-family: serif;
      font-weight: normal;
    }
    span.icon {
      /* background: url('/av-code/identity/sign-in/g-normal.png') transparent 5px 50% no-repeat; */
      background: url(<?= base_url('/identity/sign-in/g-normal.png')?>) transparent 5px 50% no-repeat;
      display: inline-block;
      vertical-align: middle;
      width: 42px;
      height: 42px;
    }
    span.buttonText {
      display: inline-block;
      vertical-align: middle;
      padding-left: 35px;
      padding-right: 35px;
      font-size: 14px;
      font-weight: bold;
      /* Use the Roboto font that is loaded in the <head> */
      font-family: 'Roboto', sans-serif;
    }
  </style>

<?php

    require_once APPPATH . 'third_party/Facebook/src/Facebook/autoload.php';
    
    if(isset($_GET['state'])) {
        $_SESSION['FBRLH_state'] = $_GET['state'];
    }
    /*Step 1: Enter Credentials*/
    $fb = new \Facebook\Facebook([
        'app_id' => '254923435271632',
        'app_secret' => 'bdc29e886fb8f5a925081eb2021bed38',
        'default_graph_version' => 'v2.10',
        //'default_access_token' => '{access-token}', // optional
    ]);
    
    ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
    		<div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <h4 class="modal-title" id="myModalLabel">Sign In</h4>
                </div>
    			<div class="modal-body sign-in-modal">
    				<h2>Login to AV account</h2>
    				<h5>This allows you modify your CVs anytime you Log in</h5>
    				<div class="sign-in-form cv-form">
                        <form action="<?php echo base_url('user/login'); ?>" method="post" id="loginForm">
        					<div class="row">
        						<div class="col-md-8 col-md-offset-2">
                                    <div class="row">
        								<div class="col-md-12">
        									<div class="form-group">
                                            <?php $facebookbtn = "<a style='text-decoration: none;' href='{$fb->getRedirectLoginHelper()->getLoginUrl(base_url("user/facebookAuth"))}'><button type='button' class='btn btn-primary btn-block'><i class='fa fa-facebook pull-left' style='font-size: 20px;'></i>Login with Facebook</button> </a>";
                                            echo $facebookbtn;
                                            ?>
                                                <!-- <a href="#" style="text-decoration: none;"><button type="button" class="btn btn-primary btn-block"><i class="fa fa-facebook pull-left" style="font-size: 20px;"></i>Login with Facebook</button></a> -->
        									</div>
        								</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">                                                                                                
                                                <div id="gSignInWrapper">
                                                    <div class="customGPlusSignIn customBtn" id="google1">
                                                    <span  class="icon"></span>
                                                    <span class="buttonText">Continue with Google</span>
                                                    </div>
                                                </div>
                                                <div id="name"></div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php if (isset($err['error']) && isset($err['login'])): ?>
                                            <div class="text-danger" style="padding: 5px">
                                            <?= $err['error'] ?>
                                            </div>

                                        <?php endif?>
                                    </div>
        							<div class="row">
        								<div class="col-md-12">
        									<div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Enter email" required="required" value="<?=( isset($err['login']) && isset($err['email'])) ? $err['email'] : ''?>" />
                                                </div>
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-md-12">
        									<div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        										<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Enter password" required="required" />
        									</div>
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-md-12">
        									<div class="form-group">
        										<button type="submit" class="make-payment">Sign In & Continue</button>
        									</div>
											<a href="#" onclick="$('.modal').modal('hide');" data-toggle="modal" data-target="#signUpModal">Create CV Account</a>
        								</div>
        							</div>
        						</div>
        					</div>
                        </form>
    				</div>
    			</div>
    		</div>
    		<!-- /.modal-content -->
        </div>
    </div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
    		<div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
                </div>
    			<div class="modal-body sign-in-modal">
    				<h2>Create an AV account</h2>
    				<h5>This allows you modify your CVs anytime you Log in</h5>
    				<div class="sign-in-form cv-form">
                        <form action="<?php echo base_url('user/register'); ?>" method="post" id="signupForm">
        					<div class="row">
        						<div class="col-md-8 col-md-offset-2">
                                    <div class="row">
        								<div class="col-md-12">
        									<div class="form-group " id="facebook1">
                                                    <!-- <a href="#" style="text-decoration: none;"><button type="button" class="btn btn-primary btn-block"><i class="fa fa-facebook pull-left" style="font-size: 20px;"></i>Login with Facebook</button></a> -->
                                                    <?= $facebookbtn;?>
        									</div>
        									
        								</div>
                                    </div>
                                    <div class="row">
        								<div class="col-md-12">
        									<div class="form-group">                                                                                                
                                                <div id="gSignInWrapper">
                                                    <div class="customGPlusSignIn customBtn" id="google1">
                                                    <span  class="icon"></span>
                                                    <span class="buttonText">Continue with Google</span>
                                                    </div>
                                                </div>
                                                <div id="name"></div>
                                                
                                            </div>
        								</div>
        							</div>
                                    <div class="row">
                                        <?php if (isset($err['error']) && isset($err['signup'])): ?>
                                            <div class="text-danger" style="padding: 5px">
                                            <?= $err['error'] ?>
                                            </div>

                                        <?php endif?>
                                    </div>
                                    <div class="row">
        								<div class="col-md-12">
        									<div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                    <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Enter name" required="required" value="<?=( isset($err['signup']) && isset($err['formdata']['name'])) ? $err['formdata']['name'] : ''?>" />
                                                </div>
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-md-12">
        									<div class="form-group">
                                                <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Enter email" required="required" value="<?=( isset($err['signup']) && isset($err['formdata']['email'])) ? $err['formdata']['email'] : ''?>" />
                                                </div>
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-md-12">
        									<div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Enter password" required="required" />
                                                </div>
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-md-12">
        									<div class="form-group">
        										<button type="submit" class="make-payment">Sign Up & Continue</button>
        									</div>
											<a href="#" onclick="$('.modal').modal('hide');" data-toggle="modal" data-target="#myModal">Already have an account, Sign in here</a>
        								</div>
        							</div>
    

        						</div>
        					</div>
                        </form>
    				</div>
    			</div>
    		</div>
    		<!-- /.modal-content -->
        </div>
    </div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endif;?>
<script>startApp();</script>