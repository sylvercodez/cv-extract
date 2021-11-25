<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Advance Vitae</title>
        <!-- Bootstrap core CSS -->
        <link type="text/css" href="<?php echo asset_url('css/bootstrap.css'); ?>" rel="stylesheet" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link type="text/css" href="<?php echo asset_url('css/style.css'); ?>" rel="stylesheet" />
        <link href="<?php echo asset_url('css/font-awesome.min.css'); ?>" rel="stylesheet" />
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

        
    </head>
    <body>
        <div class="container">
            <!-- Static navbar -->
            <nav class="navbar" >
                <div class="">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo asset_url('images/logo (2).png'); ?>" style=" padding: 0;"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            
                                <?php
                                    if($user_id>0){
                                        ?>
                                        <li class="dropdown">
                                            <!--<a href="javascript:void(0);" class="user"><img class="img img-circle" src="assets/images/user.jpg" /><?php echo $this->session->userdata('user_name'); ?> <span class="caret"></span></a>-->
                                            <a class="nav-link dropdown-toggle user" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <img class="img img-circle" src="<?php echo asset_url('users/'.$this->session->userdata('user_image')); ?>" /> <?php echo $this->session->userdata('user_name'); ?> <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                              <li><a class="dropdown-item" href="<?php echo base_url('user/profile'); ?>">Profile</a></li>
                                              <li><a class="dropdown-item" href="<?php echo base_url('user/logout'); ?>">Logout</a></li>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <li><a href="#" data-toggle="modal" data-target="#myModal">Sign In <span class="caret"></span></a></li>
                                        <!--<li><a href="#" data-toggle="modal" data-target="#signUpModal">Sign Up <span class="caret"></span></a></li>-->
                                        <?php
                                    }
                                ?>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
                <!--/.container-fluid -->
            </nav>
        </div>
        <?php
            if($this->session->userdata('error')!=''){
                ?>
                <div class="container">
                    <div class="alert alert-danger">
                        <?php echo $this->session->userdata('error'); ?>
                    </div>
                </div>
                <?php
                $this->session->unset_userdata('error');
            }
        ?>
        <!-- /container -->
        <div class="container">
            <div class="mypanel">
                <div class="row">
                    <div class="col-md-6" id="home_heading">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="heading">
                                    <h1 class="title">You've only Six seconds to impress or loose your next employer.</h1>
                                    <div class="tagline">AdvanceVitae helps you create a visually appealing Resume</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="quote">
                                    <img src="<?php echo asset_url('images/icon-quote.png'); ?>" />
                                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">

                                        <!-- Bottom Carousel Indicators -->
                                        <ol class="carousel-indicators">
                                            <?php
                                                foreach($quotes as $key=>$val){
                                                    ?>
                                                    <li data-target="#quote-carousel" data-slide-to="<?php echo $key; ?>" class="<?php echo $key==0?'active':''; ?>"></li>
                                                    <?php
                                                }
                                            ?>
                                        </ol>
                        
                                        <!-- Carousel Slides / Quotes -->
                                        <div class="carousel-inner">
                                            <?php
                                                foreach($quotes as $key=>$val){
                                                    ?>
                                                    <!-- Quote 1 -->
                                                    <div class="item <?php echo $key==0?'active':''; ?>">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <p><?php echo $val->description; ?></p>
                                                                <small><strong><?php echo $val->name; ?></strong></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                         
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" id="cvslider">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" style="">
                            <?php
                                foreach($cvs as $key=>$val){
                                    ?>
                                    <div class="item <?php echo $key==0?'active':''; ?>">
                                      <a><img src="<?php echo asset_url('cvs/'.$val->image); ?>" /></a>
                                    </div>
                                    <?php
                                }
                            ?>
                          </div>
                        
                          <!-- Left and right controls -->
                          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <img class="glyphicon-chevron-left" src="<?php echo asset_url('images/prev.png'); ?>" />
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <img class="glyphicon-chevron-right" src="<?php echo asset_url('images/next.png'); ?>" />
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!--Footer-->
        <footer class="page-footer font-small blue pt-4 mt-4">
        
          <!--Footer Links-->
          <div class="container text-center text-md-left" style="padding-top: 0;">
              <div class="row">
                  <!--First column-->
                  <div class="col-md-12">
                      <h2 class="">Make yourself an efficient & beautiful designed CV for just N1,500 only</h2>
                     
                      <a class="cv-link" href="<?= base_url('cvs') ?>">Create CV Now</a>
                     
                  </div>
                  <!--/.First column-->
              </div>
          </div>
          <!--/.Footer Links-->
        
        </footer>
        <!--/.Footer-->
    
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="<?php echo asset_url('js/jquery-3.3.1.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset_url('js/bootstrap.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset_url('js/script.js'); ?>"></script>
    </body>

</html>
<?php if(!isset($_SESSION['user_id']) || !$_SESSION['user_id']):
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